$(function(){
 
  function formSwitch(e) {
    var self = $(this),
        form = $('form');
    
    if(form.hasClass('back-visible')) 
    {
       self.siblings($('h2')).text('Немає акаунта?');
       self.text('Реєстрація!');
       form.removeClass('back-visible');
    } else {
      self.siblings($('h2')).text('Вже зареєстровані?');
      self.text('Ввійти!');
      form.addClass('back-visible');
    }
    
    e.preventDefault();
  }
  
  $('#form-switch').on('click', formSwitch);
  
  $('form').submit(function(e){
  });
});