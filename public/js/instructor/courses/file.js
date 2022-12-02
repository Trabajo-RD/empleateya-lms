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

// Copy to clipboard the input value by the ID
function copyToClipboard(id) {
    document.getElementById(id).select();
    document.execCommand('copy');
}
