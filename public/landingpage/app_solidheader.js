$(window).scroll(function() {
  if($(this).scrollTop() > 150)  /*height in pixels when the navbar becomes non opaque*/
  {
      $('.opaque-navbar').addClass('opaque');
       $('#nav ul li a').addClass('text-dark');
       $( '#logo' ).attr({
          src: "landingpage/public/assets/sailsLogo.png",
          title: "Sails Logo",
          alt: "Sails Logo"
        });
  } else {
        $('.opaque-navbar').removeClass('opaque');
        $('#nav ul li a').addClass('text-dark');
        $('#nav-icon2 span').addClass('text-dark');
        $( '#logo' ).attr({
           src: "landingpage/public/assets/sailsLogo.png",
           title: "Sails Logo",
           alt: "Sails Logo"
         });
      // $('#link').removeClass('text-dark');
      // $('#link').addClass('text-light');

  }
});
