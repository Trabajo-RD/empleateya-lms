/* CKEDITOR ALL OPTIONS */

ClassicEditor
    .create( document.querySelector( '#summary' ) )
    .catch( error => {
        console.error( error );
    } );

