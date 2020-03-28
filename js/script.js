$(".numbox").mask("+7 (999) 999-99-99");

$(function(){
    $('a[href^="#"]').on('click', function(event) {
      // отменяем стандартное действие
      event.preventDefault();
      
      var sc = $(this).attr("href"),
          dn = $(sc).offset().top;
      /*
      * sc - в переменную заносим информацию о том, к какому блоку надо перейти
      * dn - определяем положение блока на странице
      */
      
      $('html, body').animate({scrollTop: dn}, 1000);
      
      /*
      * 1000 скорость перехода в миллисекундах
      */
    });
  });


  function falidator(item) {
    check = true;
    $(item).find('input').each(function() {
        if($(this).hasClass('required') && $(this).val() == '') {
            check = false;
            $(this).css('border', '1px red solid');
        } else {
            $(this).css('border', '1px transparent solid');
        }
    });
    if(check) {
        return true;
    } else {
        return false;
    }
}

/**************************/
$("#call-form").submit(function(){
    if(!falidator(this)) return false;
    $.ajax({ 
        type: "POST", 
        url: "php/form.php",
        data: $("#call-form").serialize(),
        success: function(html) { 
        
        }
    });
    
   
    $('#spasibo').arcticmodal();
    /*$('.action_block .inputbox').removeClass("not-empty");*/
    $('#call-form').trigger("reset");
    return false;
});
/**************************/