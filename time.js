$(function () {
   window.setInterval(function () {
       $.get('time.php?a='+Math.random(), function (response) {
           var obj = JSON.parse(response);
           $('.year').text(obj.year);
           $('.month').text(obj.month);
           $('.day').text(obj.day);
           $('.hour').text(obj.hour);
           $('.minute').text(obj.minute);
           $('.second').text(obj.second);
       });
       $('img').attr('src', 'clock.php?a='+Math.random());
   },1000)
});
