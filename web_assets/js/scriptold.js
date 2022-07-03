
$(document).ready(function(){

    // jQuery methods go here...
  
    /////////  Offcanvas Navbar ///////////
    $("[data-trigger]").on("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        var offcanvas_id =  $(this).attr('data-trigger');
        $(offcanvas_id).toggleClass("show");
        $('body').toggleClass("offcanvas-active");
        $(".screen-overlay").toggleClass("show");
    }); 
    
    $(".btn-close, .screen-overlay").click(function(e){
        $(".screen-overlay").removeClass("show");
        $(".mobile-offcanvas").removeClass("show");
        $("body").removeClass("offcanvas-active");
    }); 
    ///////////////////



    ///////////////    Homepage Clients Slider  //////////////

    if($('.clients_slider').length)
    {
    var clientsSlider = $('.clients_slider');
    
    clientsSlider.owlCarousel(
    {
    loop:true,
    autoplay:true,
    autoplayTimeout:5000,
    nav:false,
    dots:false,
    autoWidth:true,
    items:4,
    margin:42
    });
    
    if($('.clients_prev').length)
    {
    var prev = $('.clients_prev');
    prev.on('click', function()
    {
    clientsSlider.trigger('prev.owl.carousel');
    });
    }
    
    if($('.clients_next').length)
    {
    var next = $('.clients_next');
    next.on('click', function()
    {
    clientsSlider.trigger('next.owl.carousel');
    });
    }
    }
    
///////////////    Homepage Clients Slider  End    //////////////
















});  