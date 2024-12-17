{{-- <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var numb = 1;
        do {
            ClassicEditor.create(document.querySelector('.editor' + numb), {
                    fontFamily: {
                        options: [
                            'default',
                            'Ubuntu, Arial, sans-serif',
                            'Ubuntu Mono, Courier New, Courier, monospace'
                        ],
                        supportAllValues: true
                    },
                    toolbar: {
                        items: [
                            'heading', '|',
                            'fontfamily', 'fontsize', '|',
                            'alignment', '|',
                            'fontColor', 'fontBackgroundColor', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                            'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'code', 'codeBlock', '|',
                            'insertTable', '|',
                            'uploadImage', 'blockQuote', '|',
                            'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: true
                    }
                })
                .then(function(editor) {
                    // console.log(Array.from(editor.ui.componentFactory.names()));
                })
                .catch(error => {
                    console.log(error);
                });
            numb++;
        }
        while (numb < 3);

    });
</script> --}}