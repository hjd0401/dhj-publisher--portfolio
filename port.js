$('.btn-dark').on('click', function(){
$('body').toggleClass('dark');
$(this).text($('body').hasClass('dark') ? '🌙' : '🌞');
});
  