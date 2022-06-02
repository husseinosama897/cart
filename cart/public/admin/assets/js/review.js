$('.change-status').change(function (e) { 
    e.preventDefault();
    var statusCode = $('.change-status').val();
    if(statusCode == 2){
        $('#receive-date').removeClass('receive-date');
    }else{
        $('#receive-date').addClass('receive-date');
    }
    if(statusCode == 1){
        $('#delivery-date').removeClass('delivery-date');
    }else{
        $('#delivery-date').addClass('delivery-date');
    }
});