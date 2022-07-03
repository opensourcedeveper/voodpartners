$(function () { 
    var base_url = $("input[name=base_url]").val(); 
    $(window).scroll(function () {
        if ($(this).scrollTop() > 10) { 
            $('.navbar-brand img').attr('src',base_url+'/web_assets/img/home-page/Logo-02.png');
        }
        if ($(this).scrollTop() < 10) { 
            $('.navbar-brand img').attr('src',base_url+'/web_assets/img/home-page/logo.png');
        }
    })
});
  
  
  $('#search-button').on('click', function(e) {
        if($('#search-input-container').hasClass('hdn')) {
          e.preventDefault();
          $('#search-input-container').removeClass('hdn')
          return false;
        }
      });
      
      $('#hide-search-input-container').on('click', function(e) {
        e.preventDefault();
        $('#search-input-container').addClass('hdn')
        return false;
      });


$(document).ready(function(){
    $('.navNavList .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });
}); 
    $(document).ready(function() {
	$(".megamenu").on("click", function(e) {
		e.stopPropagation();
    });
    
    // $(function () {
        $(window).on('scroll', function () {
            if ( $(window).scrollTop() > 10 ) {
                $('.custNav').addClass('active');
            } else {
                $('.custNav').removeClass('active');
            }
        });
    // });
        /////////////////////////////

       













});  