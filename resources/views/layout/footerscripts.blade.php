	<!--begin::Javascript-->
    <script>var hostUrl ='{{asset('assets/')}}';</script>
    {{-- <script>var hostUrl = "../assets/";</script> --}}
     <!--begin::Global Javascript Bundle(used by all pages)-->


     <script src="{{asset('dist/assets/plugins/global/plugins.bundle.js')}}"></script>
     <script src="{{asset('dist/assets/js/scripts.bundle.js')}}"></script>
     <!--end::Global Javascript Bundle-->
     <!--begin::Page Vendors Javascript(used by this page)-->
     <script src="{{asset('dist/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
     <!--end::Page Vendors Javascript-->
     <!--begin::Page Custom Javascript(used by this page)-->
     <script src="{{asset('dist/assets/js/custom/apps/ecommerce/catalog/categories.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/apps/projects/users/users.js')}}"></script>

     <script src="{{asset('dist/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
     <!--end::Page Vendors Javascript-->


		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{asset('dist/assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>

     <!--begin::Page Custom Javascript(used by this page)-->
     <script src="{{asset('dist/assets/js/custom/apps/ecommerce/catalog/save-category.js')}}"></script>
<!--begin::Page Custom Javascript(used by this page)-->

     <script src="{{asset('dist/assets/js/widgets.bundle.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/widgets.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/apps/chat/chat.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/type.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/budget.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/settings.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/team.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/targets.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/files.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/complete.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/create-project/main.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/users-search.js')}}"></script>
     <script src="{{asset('dist/assets/js/custom/utilities/modals/new-target.js')}}"></script>
     <!-- TinyMCE 5 (No API key required) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.9/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            // Target all textareas with the tinymce-editor class
            selector: 'textarea.tinymce-editor',

            // Editor height
            height: 350,

            // Essential plugins for rich text editing
            plugins: [
                'advlist',        // Advanced list formatting
                'autolink',       // Auto-convert URLs to links
                'lists',          // Bullet and numbered lists
                'link',           // Insert/edit links
                'image',          // Insert images
                'charmap',        // Special characters
                'preview',        // Preview content
                'anchor',         // Insert anchors
                'searchreplace',  // Find and replace
                'visualblocks',   // Show block elements
                'code',           // Edit HTML source
                'fullscreen',     // Fullscreen editing
                'insertdatetime', // Insert date/time
                'media',          // Embed media
                'table',          // Tables
                'wordcount',      // Word count
                'emoticons',      // Emoji picker
            ],

            // Comprehensive toolbar with font controls
            toolbar: [
                'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | forecolor backcolor',
                'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image table | removeformat pastetext code fullscreen'
            ],

            // Menu bar configuration
            menubar: 'file edit view insert format tools table',

            // Font family options (matching your frontend fonts)
            font_family_formats:
                "Open Sans='Open Sans', sans-serif;" +
                "Rajdhani='Rajdhani', sans-serif;" +
                "Arial=arial, helvetica, sans-serif;" +
                "Georgia=georgia, palatino, serif;" +
                "Helvetica=helvetica, arial, sans-serif;" +
                "Times New Roman=times new roman, times, serif;" +
                "Verdana=verdana, geneva, sans-serif;" +
                "Courier New=courier new, courier, monospace;",

            // Font size options
            font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 28pt 32pt 36pt 48pt',

            // Block format options
            block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6; Blockquote=blockquote; Preformatted=pre',

            // Custom CSS for editor content (matches your frontend styling)
            content_css: '{{ asset("css/tinymce-content.css") }}',

            // Important: This ensures the editor uses your custom styles
            body_class: 'tinymce-content',

            // ==========================================
            // PASTE HANDLING - Clean formatting from Word/External sources
            // ==========================================

            // Paste as plain text by default (removes all formatting)
            paste_as_text: false,  // Set to true if you want ALWAYS plain text

            // Clean up pasted Word content
            paste_remove_styles_if_webkit: true,
            paste_remove_spans: true,
            paste_strip_class_attributes: 'all',

            // Remove these elements when pasting
            invalid_elements: 'script,iframe,object,embed',

            // Remove empty tags
            verify_html: true,

            // Convert fonts to spans with styles
            convert_fonts_to_spans: true,

            // Custom paste preprocessing - strips unwanted styles
            paste_preprocess: function(plugin, args) {
                // Remove MS Word specific tags and attributes
                var content = args.content;

                // Remove MS Office conditional comments
                content = content.replace(/<!--\[if[\s\S]*?endif\]-->/gi, '');
                content = content.replace(/<!--[\s\S]*?-->/gi, '');

                // Remove mso- styles
                content = content.replace(/mso-[^:;]+:[^;]+;?/gi, '');

                // Remove font-family inline styles (will use our CSS)
                content = content.replace(/font-family:[^;]+;?/gi, '');

                // Remove specific MS Word classes
                content = content.replace(/class="Mso[^"]*"/gi, '');

                args.content = content;
            },

            // Post-process pasted content
            paste_postprocess: function(plugin, args) {
                // Additional cleanup after paste
                var paragraphs = args.node.querySelectorAll('p, span, div');
                paragraphs.forEach(function(el) {
                    // Remove empty style attributes
                    if (el.getAttribute('style') === '') {
                        el.removeAttribute('style');
                    }
                    // Remove empty class attributes
                    if (el.getAttribute('class') === '') {
                        el.removeAttribute('class');
                    }
                });
            },

            // ==========================================
            // STYLE FORMATS - Custom formatting options
            // ==========================================
            style_formats: [
                { title: 'Headings', items: [
                    { title: 'Heading 1', format: 'h1' },
                    { title: 'Heading 2', format: 'h2' },
                    { title: 'Heading 3', format: 'h3' },
                    { title: 'Heading 4', format: 'h4' },
                    { title: 'Heading 5', format: 'h5' },
                    { title: 'Heading 6', format: 'h6' }
                ]},
                { title: 'Inline', items: [
                    { title: 'Bold', format: 'bold' },
                    { title: 'Italic', format: 'italic' },
                    { title: 'Underline', format: 'underline' },
                    { title: 'Strikethrough', format: 'strikethrough' },
                    { title: 'Code', format: 'code' }
                ]},
                { title: 'Blocks', items: [
                    { title: 'Paragraph', format: 'p' },
                    { title: 'Blockquote', format: 'blockquote' },
                    { title: 'Pre', format: 'pre' }
                ]},
                { title: 'Custom Styles', items: [
                    { title: 'Highlight', inline: 'span', classes: 'highlight' },
                    { title: 'Accent Color', inline: 'span', classes: 'ltn__secondary-color' },
                    { title: 'Primary Color', inline: 'span', classes: 'ltn__primary-color' }
                ]}
            ],

            // ==========================================
            // GENERAL SETTINGS
            // ==========================================

            // Allow all HTML elements (for flexibility)
            extended_valid_elements: 'span[class|style],div[class|style],p[class|style]',

            // Promotion/branding settings
            promotion: false,
            branding: false,

            // Image upload handling (optional - enable if needed)
            // images_upload_url: '/upload/image',
            // images_upload_handler: function (blobInfo, progress) { ... },

            // Auto-resize (optional)
            // autoresize_bottom_margin: 20,
            // autoresize_min_height: 300,
            // autoresize_max_height: 600,

            // Spell check
            browser_spellcheck: true,

            // Context menu
            contextmenu: 'link image table',

            // Setup callback for custom functionality
            setup: function(editor) {
                // Add a custom "Clear All Formatting" button
                editor.ui.registry.addButton('clearallformatting', {
                    text: 'Clear All',
                    tooltip: 'Clear all formatting and apply default styles',
                    onAction: function() {
                        // Get the content as plain text
                        var content = editor.getContent({ format: 'text' });
                        // Wrap in paragraphs
                        var lines = content.split('\n\n');
                        var formatted = lines.map(function(line) {
                            return line.trim() ? '<p>' + line.trim() + '</p>' : '';
                        }).join('');
                        editor.setContent(formatted || '<p></p>');
                    }
                });

                // Add the button to toolbar (append to existing)
                // You can also add: clearallformatting to the toolbar string above
            }
        });
    </script>

@yield('scripts')
     <!--end::Page Custom Javascript-->
     <!--end::Javascript-->
