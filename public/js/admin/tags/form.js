var bootstrapTooltip = $.fn.tooltip.noConflict();
$.fn.bstooltip = bootstrapTooltip;
$('[data-toggle="tooltip"]').bstooltip();

/**
 * jQuery-Plugin-stringToSlug
 * https://leocaseiro.com.br/jquery-plugin-string-to-slug/
 */

$(document).ready( function() {
    $("#name").stringToSlug({
      setEvents: 'keyup keydown blur',
      getPut: '#slug',
      space: '-'
    });
});



// AUTOMATIC SLUG

// // title listener
// document.getElementById("name").addEventListener('keyup', slugChange);

// // event change
// function slugChange(){
//     title = document.getElementById("name").value;
//     document.getElementById("slug").value = slug(title);
// }

// // formating slug
// function slug(str){
//     var $slug = '';
//     var trimmed = str.trim(str);
//     $slug = trimmed.normalize("NFD").replace(/[\u0300-\u036f]/g, '');

//     return $slug.replace(/\s+/g, '-').replace(/-+/g, '-').toLowerCase();
// }
