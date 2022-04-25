$('header .mobile .open-menu').click(function (e) { 
    e.preventDefault();
    $('nav .mobile-menu').addClass('active');
    $('nav .overlay').addClass('active');
});

$('nav .mobile-menu .colse-menu').click(function (e) { 
    e.preventDefault();
    $('nav .mobile-menu').removeClass('active');
    $('nav .overlay').removeClass('active');
});