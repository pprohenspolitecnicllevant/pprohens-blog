import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
    .create( document.querySelector( '.wysiwyg' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
