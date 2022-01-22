// Back to Top floatting action button
var backToTopButton = document.getElementById('floattingActionButton');

// backToTopButton.style.display = "none"; // by default should hidden

$(window).scroll( function(){
    if($(this).scrollTop() > 150){
        $(backToTopButton).fadeIn();
    } else {
        $(backToTopButton).fadeOut();
        $(backToTopButton).addClass('fixed');
        
        // $(backToTopButton).removeClass('fixed');        
    }
});

$('#backToTop').on("click", function() {
 $('html, body').animate({
    scrollTop: 0
 }, 1000);
});