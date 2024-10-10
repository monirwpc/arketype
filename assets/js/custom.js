
// sticky menu start 

window.onscroll = function() { myFunction(); };
var navbar = document.querySelector(".header-container");
var sticky = navbar.offsetTop+70;

function myFunction() {
if (window.pageYOffset >= sticky) {
    navbar.classList.add("is-sticky")
    } else {
    navbar.classList.remove("is-sticky");
    }
}

// sticky menu end


jQuery(document).ready(function() {
    jQuery(document).on('click', '.btn-menu', function(event) {
        if (jQuery('body').hasClass('menu-open')) {
            jQuery('body').removeClass('menu-open');
            jQuery('body header').find('.overlay').fadeOut(300);
        }else {
            jQuery('body header').find('.overlay').fadeIn(300);
            jQuery('body').addClass('menu-open');
        }
    });
    jQuery(document).on('click', '.overlay', function(event) {
        jQuery('body').removeClass('menu-open');
        jQuery('body header').find('.overlay').fadeOut(300);
    });

});


// MasterSlider

var slider = new MasterSlider();
slider.setup('masterslider' , {
    width: 1336,
    height: 1032, 
    minHeight: 697, 
    fullwidth:true,
    layout:'fullwidth',
});

slider.control('bullets' ,{
    autohide: true, 
});

var slider2 = new MasterSlider();
slider2.setup('masterslider2' , {
    width: 1336,
    height: 1032, 
    minHeight: 697, 
    fullwidth:true,
    layout:'fullwidth',
});
