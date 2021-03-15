// AUTOMATIC SLUG 

// title listener
document.getElementById("title").addEventListener('keyup', slugChange);

// event change
function slugChange(){
    title = document.getElementById("title").value;
    document.getElementById("slug").value = slug(title);
}

// formating slug
function slug(str){
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
    return $slug.toLowerCase();
}

/* CKEDITOR ALL OPTIONS */

ClassicEditor
    .create( document.querySelector( '#summary' ) )
    .catch( error => {
        console.error( error );
    } );

/* CKEDITOR CUSTOM OPTIONS */
// ClassicEditor
//     .create( document.querySelector( '#summary' ), {
//         toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
//         heading: {
//             options: [
//                 { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
//                 { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
//                 { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
//             ]
//         }
//     } )
//     .catch( error => {
//         console.log( error );
//     } );


/* CHANGE IMAGE */

document.getElementById("file").addEventListener('change', imageChange);

function imageChange( event ){
    var file = event.target.files[0];

    var reader = new FileReader();
    reader.onload = ( event ) => {
        document.getElementById("picture").setAttribute('src', event.target.result);
    };

    reader.readAsDataURL( file );
}

