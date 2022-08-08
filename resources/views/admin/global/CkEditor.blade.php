<script src="{{ URL::asset('js\library\ckeditor5\ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            language: 'fa',
            additionalLanguages: 'all',
            ui: 'en',
            content: 'fa'
         } )
        .then( editor => {
            console.log( Array.from( editor.ui.componentFactory.names() ) );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>