/**
 * Country-City Cascade Dropdown Module
 *
 * A reusable module for managing cascading country and city (venue) dropdowns.
 * Handles dynamic city loading based on country selection, edit mode pre-population,
 * and works with niceSelect jQuery plugin.
 *
 * @author BTS Consultant
 * @version 1.0.0
 */

(function($) {
    'use strict';

    /**
     * CountryCityCascade - Main constructor
     *
     * @param {Object} options - Configuration options
     * @param {string} options.countrySelector - Selector for country dropdown (default: '[name="country_id"]')
     * @param {string} options.citySelector - Selector for city dropdown (default: '[name="venue_id"]')
     * @param {string} options.apiEndpoint - API endpoint for fetching cities (default: '/get-venues-by-country/')
     * @param {string} options.emptyOptionText - Text for empty option (default: '')
     * @param {string} options.loadingText - Text shown while loading (default: 'Loading...')
     * @param {boolean} options.useNiceSelect - Whether niceSelect is used (default: true)
     * @param {number|null} options.initialCountryId - Pre-selected country ID for edit mode
     * @param {number|null} options.initialCityId - Pre-selected city ID for edit mode
     * @param {Function} options.onCountryChange - Callback after country changes
     * @param {Function} options.onCitiesLoaded - Callback after cities are loaded
     * @param {Function} options.onError - Callback on error
     */
    function CountryCityCascade(options) {
        // Default configuration
        this.config = $.extend({
            countrySelector: '[name="country_id"]',
            citySelector: '[name="venue_id"]',
            apiEndpoint: '/get-venues-by-country/',
            emptyOptionText: '',
            loadingText: 'Loading...',
            useNiceSelect: true,
            initialCountryId: null,
            initialCityId: null,
            onCountryChange: null,
            onCitiesLoaded: null,
            onError: null
        }, options);

        // Cache DOM elements
        this.$country = $(this.config.countrySelector);
        this.$city = $(this.config.citySelector);

        // State
        this.isLoading = false;
        this.citiesCache = {};

        // Initialize
        this.init();
    }

    /**
     * Initialize the cascade functionality
     */
    CountryCityCascade.prototype.init = function() {
        var self = this;

        // Validate elements exist
        if (!this.$country.length || !this.$city.length) {
            console.warn('CountryCityCascade: Country or City dropdown not found');
            return;
        }

        // Bind country change event
        this.bindEvents();

        // Handle initial load (edit mode)
        if (this.config.initialCountryId) {
            this.loadCitiesForCountry(this.config.initialCountryId, this.config.initialCityId);
        } else {
            // Check if country has a value already (from old() or pre-selected)
            var currentCountryId = this.$country.val();
            if (currentCountryId) {
                var currentCityId = this.$city.val();
                this.loadCitiesForCountry(currentCountryId, currentCityId);
            } else {
                // No country selected, disable/reset city dropdown
                this.resetCityDropdown();
            }
        }
    };

    /**
     * Bind event handlers
     */
    CountryCityCascade.prototype.bindEvents = function() {
        var self = this;

        // Handle country change - support both native and niceSelect
        this.$country.on('change', function() {
            var countryId = $(this).val();
            self.handleCountryChange(countryId);
        });

        // For niceSelect, also listen to the wrapper
        if (this.config.useNiceSelect) {
            // niceSelect creates a wrapper, we need to observe changes
            this.$country.closest('.nice-select').length &&
            this.observeNiceSelect();
        }
    };

    /**
     * Observe niceSelect changes (for when niceSelect updates the hidden select)
     */
    CountryCityCascade.prototype.observeNiceSelect = function() {
        var self = this;
        var $niceSelect = this.$country.siblings('.nice-select');

        if ($niceSelect.length) {
            // Listen for click on nice-select options
            $niceSelect.on('click', '.option', function() {
                // Small delay to allow niceSelect to update the value
                setTimeout(function() {
                    var countryId = self.$country.val();
                    self.handleCountryChange(countryId);
                }, 50);
            });
        }
    };

    /**
     * Handle country change
     *
     * @param {string|number} countryId - The selected country ID
     */
    CountryCityCascade.prototype.handleCountryChange = function(countryId) {
        // Trigger callback
        if (typeof this.config.onCountryChange === 'function') {
            this.config.onCountryChange(countryId);
        }

        if (!countryId || countryId === '') {
            this.resetCityDropdown();
            return;
        }

        this.loadCitiesForCountry(countryId, null);
    };

    /**
     * Load cities for a given country
     *
     * @param {string|number} countryId - The country ID
     * @param {string|number|null} selectedCityId - City ID to pre-select after loading
     */
    CountryCityCascade.prototype.loadCitiesForCountry = function(countryId, selectedCityId) {
        var self = this;

        // Check cache first
        if (this.citiesCache[countryId]) {
            this.populateCities(this.citiesCache[countryId], selectedCityId);
            return;
        }

        // Show loading state
        this.setLoadingState(true);

        // Fetch cities from API
        $.ajax({
            url: this.config.apiEndpoint + countryId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Cache the response
                self.citiesCache[countryId] = response;

                // Populate cities
                self.populateCities(response, selectedCityId);

                // Trigger callback
                if (typeof self.config.onCitiesLoaded === 'function') {
                    self.config.onCitiesLoaded(response, countryId);
                }
            },
            error: function(xhr, status, error) {
                console.error('CountryCityCascade: Error loading cities', error);
                self.resetCityDropdown();

                // Trigger error callback
                if (typeof self.config.onError === 'function') {
                    self.config.onError(error, xhr);
                }
            },
            complete: function() {
                self.setLoadingState(false);
            }
        });
    };

    /**
     * Populate city dropdown with data
     *
     * @param {Array} cities - Array of city objects with id and venue_en_name
     * @param {string|number|null} selectedCityId - City ID to pre-select
     */
    CountryCityCascade.prototype.populateCities = function(cities, selectedCityId) {
        var self = this;

        // Clear current options
        this.$city.empty();

        // Add empty option
        this.$city.append($('<option>', {
            value: '',
            text: this.config.emptyOptionText
        }));

        // Add city options
        $.each(cities, function(index, city) {
            var $option = $('<option>', {
                value: city.id,
                text: city.venue_en_name
            });

            // Pre-select if matches
            if (selectedCityId && city.id == selectedCityId) {
                $option.prop('selected', true);
            }

            self.$city.append($option);
        });

        // Enable dropdown
        this.$city.prop('disabled', false);

        // Update niceSelect if used
        if (this.config.useNiceSelect) {
            this.updateNiceSelect(this.$city);
        }
    };

    /**
     * Reset city dropdown to empty state
     */
    CountryCityCascade.prototype.resetCityDropdown = function() {
        this.$city.empty();
        this.$city.append($('<option>', {
            value: '',
            text: this.config.emptyOptionText
        }));
        this.$city.prop('disabled', true);

        // Update niceSelect if used
        if (this.config.useNiceSelect) {
            this.updateNiceSelect(this.$city);
        }
    };

    /**
     * Set loading state
     *
     * @param {boolean} isLoading - Whether currently loading
     */
    CountryCityCascade.prototype.setLoadingState = function(isLoading) {
        this.isLoading = isLoading;

        if (isLoading) {
            this.$city.empty();
            this.$city.append($('<option>', {
                value: '',
                text: this.config.loadingText
            }));
            this.$city.prop('disabled', true);

            if (this.config.useNiceSelect) {
                this.updateNiceSelect(this.$city);
            }
        }
    };

    /**
     * Update niceSelect after changing options
     *
     * @param {jQuery} $select - The select element to update
     */
    CountryCityCascade.prototype.updateNiceSelect = function($select) {
        // niceSelect update method
        if (typeof $.fn.niceSelect === 'function') {
            $select.niceSelect('update');
        }
    };

    /**
     * Clear cache
     */
    CountryCityCascade.prototype.clearCache = function() {
        this.citiesCache = {};
    };

    /**
     * Set country value programmatically
     *
     * @param {string|number} countryId - Country ID to set
     * @param {string|number|null} cityId - City ID to pre-select
     */
    CountryCityCascade.prototype.setCountry = function(countryId, cityId) {
        this.$country.val(countryId);

        if (this.config.useNiceSelect) {
            this.updateNiceSelect(this.$country);
        }

        this.loadCitiesForCountry(countryId, cityId);
    };

    /**
     * Destroy the instance and remove event handlers
     */
    CountryCityCascade.prototype.destroy = function() {
        this.$country.off('change');

        if (this.config.useNiceSelect) {
            this.$country.siblings('.nice-select').off('click', '.option');
        }

        this.citiesCache = {};
    };

    // Expose to global scope
    window.CountryCityCascade = CountryCityCascade;

    /**
     * jQuery plugin wrapper
     * Usage: $('.country-select').countryCityCascade({citySelector: '.city-select'});
     */
    $.fn.countryCityCascade = function(options) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('countryCityCascade');

            if (!data) {
                var opts = $.extend({}, options, {
                    countrySelector: this
                });
                $this.data('countryCityCascade', new CountryCityCascade(opts));
            }
        });
    };

})(jQuery);
