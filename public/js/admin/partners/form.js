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
    $slug = trimmed.normalize("NFD").replace(/[\u0300-\u036f]/g, '');

    return $slug.replace(/\s+/g, '-').replace(/-+/g, '-').toLowerCase();
}


// ClassicEditor
//     .create( document.querySelector( '#content' ) )
//     .catch( error => {
//         console.error( error );
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

