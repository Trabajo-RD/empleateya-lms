// AUTOMATIC SLUG 

// title listener
document.getElementById("title").addEventListener('keyup', slugChange);

// event change
function slugChange(){
    title = document.getElementById("title").value;
    document.getElementById("slug").value = slug(title);
}

// formating slug
// function slug(str){
//     var $slug = '';
//     var trimmed = str.trim(str);
//     $slug = trimmed.normalize("NFD").replace(/[\u0300-\u036f]/g, )
//     // .replace(' ', '-')
//     .replace(/-+/g, '-')
//     .replace(/^-|-$/g, '');
//     return $slug.toLowerCase();
// }


function slug(str){
    var $slug = '';
    var trimmed = str.trim(str);
    $slug = trimmed.normalize("NFD").replace(/[\u0300-\u036f]/g, '');

    return $slug.replace(/\s+/g, '-').replace(/-+/g, '-').toLowerCase();
}


/* CKEDITOR ALL OPTIONS */

// ClassicEditor
//     .create( document.querySelector( '#summary' ) )
//     .catch( error => {
//         console.error( error );
//     } );

/* CKEDITOR CUSTOM OPTIONS */
// ClassicEditor
//     .create( document.querySelector( '#summary' ), {
//         toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
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



