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

ClassicEditor
    .create( document.querySelector( '#details' ) )
    .catch( error => {
        console.error( error );
    } );


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
