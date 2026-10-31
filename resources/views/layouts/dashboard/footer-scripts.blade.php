<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/iconify-icon/iconify-icon.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/js/pages/simple-datatables.init.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('form.form-submit').on('submit', function() {

            const $form = $(this);

            if ($form.data('submitting')) {
                return false;
            }

            $form.data('submitting', true);

            $form.find('button[type="submit"]').each(function() {
                $(this).prop('disabled', true)
                    .html('جاري الحفظ...');
            });

        });

    });
</script>

<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css">

<script type="importmap">
        {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
    </script>

<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Heading,
        Bold,
        Italic,
        Underline,
        FontColor,
        FontBackgroundColor,
        Alignment,
        List,
        Link,
        Table,
        TableToolbar
    } from 'ckeditor5';

    // Global array to keep track of editor instances paired with their textareas
    const activeEditors = [];

    // Run when the jQuery DOM is fully ready
    $(document).ready(function() {

        // Loop through all textareas with the class .ckeditor using jQuery
        $('.ckeditor').each(function() {
            const $textarea = $(this);

            // Create a temporary div container and place it right before the textarea
            const $editorContainer = $('<div></div>');
            $textarea.before($editorContainer);

            // Hide the original textarea seamlessly
            $textarea.hide();

            // Pass the raw DOM node out of the jQuery object to CKEditor
            ClassicEditor
                .create($editorContainer[0], {
                    plugins: [
                        Essentials, Paragraph, Heading, Bold, Italic,
                        Underline, FontColor, FontBackgroundColor, Alignment, List, Link,
                        Table, TableToolbar
                    ],
                    toolbar: [
                        'undo', 'redo', '|',
                        'heading', '|',
                        'bold', 'italic', 'underline', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'alignment', '|',
                        'bulletedList', 'numberedList', 'link', '|',
                        'insertTable'
                    ],
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Normal',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },
                    table: {
                        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                    },
                    // language: 'ar'
                })
                .then(editor => {
                    // Sync initial fallback value from textarea to the new editor space
                    editor.setData($textarea.val());

                    // Save instance references to our tracking array
                    activeEditors.push({
                        instance: editor,
                        $targetTextarea: $textarea
                    });

                    // DYNAMIC SUBMIT HANDLING: Find the closest parent form element using jQuery's .closest()
                    const $parentForm = $textarea.closest('form');

                    if ($parentForm.length && !$parentForm.data('hasRtlSubmitHandler')) {
                        // Mark this form using jQuery .data() to avoid setting duplicate submit rules
                        $parentForm.data('hasRtlSubmitHandler', true);

                        // Attach the submission sync event to the parent form
                        $parentForm.on('submit', function() {
                            activeEditors.forEach(item => {
                                // Verify if this editor's parent form matches the one currently submitting
                                if (item.$targetTextarea.closest('form').is(
                                        $parentForm)) {
                                    item.$targetTextarea.val(item.instance
                                        .getData());
                                }
                            });
                            console.log(
                                "jQuery dynamically discovered form and synced content successfully."
                            );
                        });
                    }
                })
                .catch(error => {
                    console.error("Editor failed to start:", error);
                });
        });
    });
</script>

@yield('js')

<!-- App js-->
<script src="{{ asset('assets/js/app.js') }}"></script>
