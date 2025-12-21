{{--
    Country-City Cascade Select Component

    Usage:
    @include('components.country-city-select', [
        'countries' => $countries,
        'venues' => $venues,
        'countryId' => 'personal_country',
        'cityId' => 'personal_city',
        'countryName' => 'country_id',
        'cityName' => 'venue_id',
        'countryLabel' => 'Country',
        'cityLabel' => 'City',
        'countryRequired' => true,
        'cityRequired' => true,
        'selectedCountry' => old('country_id'),
        'selectedCity' => old('venue_id'),
        'wrapperClass' => 'row mb-3',
        'colClass' => 'col-md-6 mb-3',
        'useNiceSelect' => true,
    ])

    Props:
    - countries: Collection of countries (required)
    - venues: Collection of venues/cities (required for initial load)
    - countryId: HTML id for country select (default: 'country_select')
    - cityId: HTML id for city select (default: 'city_select')
    - countryName: Name attribute for country select (default: 'country_id')
    - cityName: Name attribute for city select (default: 'venue_id')
    - countryLabel: Label text for country (default: 'Country')
    - cityLabel: Label text for city (default: 'City')
    - countryRequired: Is country required (default: false)
    - cityRequired: Is city required (default: false)
    - selectedCountry: Pre-selected country ID
    - selectedCity: Pre-selected city ID
    - wrapperClass: Wrapper div class (default: 'row mb-3')
    - colClass: Column div class (default: 'col-md-6 mb-3')
    - useNiceSelect: Whether niceSelect styling is used (default: true)
    - instanceName: Unique instance name for JS (default: 'countryCityCascade')
--}}

@php
    $countryId = $countryId ?? 'country_select';
    $cityId = $cityId ?? 'city_select';
    $countryName = $countryName ?? 'country_id';
    $cityName = $cityName ?? 'venue_id';
    $countryLabel = $countryLabel ?? 'Country';
    $cityLabel = $cityLabel ?? 'City';
    $countryRequired = $countryRequired ?? false;
    $cityRequired = $cityRequired ?? false;
    $selectedCountry = $selectedCountry ?? old($countryName);
    $selectedCity = $selectedCity ?? old($cityName);
    $wrapperClass = $wrapperClass ?? 'row mb-3';
    $colClass = $colClass ?? 'col-md-6 mb-3';
    $useNiceSelect = $useNiceSelect ?? true;
    $instanceName = $instanceName ?? 'countryCityCascade_' . Str::random(6);
    $selectClass = $selectClass ?? 'form-select';
    $selectStyle = $selectStyle ?? '';
    $showAsterisk = $showAsterisk ?? false; // Set to true to add asterisk after label
    $labelClass = $labelClass ?? 'form-label';
@endphp

<div class="{{ $wrapperClass }}" data-country-city-wrapper>
    {{-- Country Select --}}
    <div class="{{ $colClass }}">
        <label for="{{ $countryId }}" class="{{ $labelClass }}{{ $countryRequired ? ' required' : '' }}">
            {{ $countryLabel }}@if($showAsterisk && $countryRequired) *@endif
        </label>
        <select
            name="{{ $countryName }}"
            id="{{ $countryId }}"
            class="{{ $selectClass }}{{ !$useNiceSelect ? ' no-nice-select' : '' }}"
            data-cascade-country
            @if($selectStyle) style="{{ $selectStyle }}" @endif
            {{ $countryRequired ? 'required' : '' }}
        >
            <option value=""></option>
            @foreach ($countries as $country)
                <option
                    value="{{ $country->id }}"
                    @if ($selectedCountry == $country->id) selected @endif
                >
                    {{ $country->country_en_name }}
                </option>
            @endforeach
        </select>
        @error($countryName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    {{-- City Select --}}
    <div class="{{ $colClass }}">
        <label for="{{ $cityId }}" class="{{ $labelClass }}{{ $cityRequired ? ' required' : '' }}">
            {{ $cityLabel }}@if($showAsterisk && $cityRequired) *@endif
        </label>
        <select
            name="{{ $cityName }}"
            id="{{ $cityId }}"
            class="{{ $selectClass }}{{ !$useNiceSelect ? ' no-nice-select' : '' }}"
            data-cascade-city
            @if($selectStyle) style="{{ $selectStyle }}" @endif
            {{ $cityRequired ? 'required' : '' }}
        >
            <option value=""></option>
            @isset($venues)
                @foreach ($venues as $venue)
                    <option
                        value="{{ $venue->id }}"
                        data-country-id="{{ $venue->country_id }}"
                        @if ($selectedCity == $venue->id) selected @endif
                    >
                        {{ $venue->venue_en_name }}
                    </option>
                @endforeach
            @endisset
        </select>
        @error($cityName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>

{{-- Instance-specific initialization script --}}
@push('country-city-scripts')
<script>
    (function() {
        // Wait for CountryCityCascade to be available
        function initCascade() {
            if (typeof CountryCityCascade !== 'undefined' && typeof jQuery !== 'undefined') {
                window.{{ $instanceName }} = new CountryCityCascade({
                    countrySelector: '#{{ $countryId }}',
                    citySelector: '#{{ $cityId }}',
                    apiEndpoint: '/get-venues-by-country/',
                    useNiceSelect: {{ $useNiceSelect ? 'true' : 'false' }},
                    initialCountryId: {{ $selectedCountry ? $selectedCountry : 'null' }},
                    initialCityId: {{ $selectedCity ? $selectedCity : 'null' }}
                });
            } else {
                // Retry after a short delay if not ready
                setTimeout(initCascade, 100);
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCascade);
        } else {
            initCascade();
        }
    })();
</script>
@endpush
