jQuery(function(){
    jQuery('.owl-carousel').owlCarousel({
        loop:false,
        autoplay:false,
        autoplayTimeout:2000,
        margin:30,
        nav:true,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        items:1,
        dots: true,
        animateOut:'fadeOut',

    });
});
jQuery(document).ready(function () {
    jQuery("#dealer_region").change(function () {
        this.form.submit();
    })
    jQuery("#dealer_type").change(function () {
        this.form.submit();
    })
    jQuery(document).on('click','.btn-location',getLocation);
    jQuery('.owl-carousel').each(function() { // the containers for all your galleries
        jQuery(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true
            }
        });
    });
})




function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}
function showPosition(position) {
    jQuery('.btn-location').attr('data-coord',position.coords.latitude +','+position.coords.longitude);
    jQuery.cookie("getlat", position.coords.latitude);
    jQuery.cookie("getlon", position.coords.longitude);
    location.reload(true);
}

