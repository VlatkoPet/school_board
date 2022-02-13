// ф-ција за да се пушти алармот
function play_sound(){
    var audio = $(".audio")[0];
    audio.play();
    document.getElementById("myAudio").loop = true; 
    
}
// ф-ција да се исклучи алармот и да се смени записот во 'closed' vo 
// so povikuvanje na update.php se izvrshuva f-cijata vo interkonekcii update() i se menuva interkoencijata od open vo closed
$(function(){
    $("#stop").click(function(){

        jQuery.ajax({
        url: 'http://api-interkonekcii.neotel.local/api/interkonekcii/update.php',
        type: "POST",
        success: function (result) {
                var audio = $(".audio")[0];
                audio.pause();
                $('#stop').hide();
                $('.class_alarm').hide();
                $('#msgAlarm').show().css('color', 'green').text('Алармот е исклучен!');
            }
        });

    });
});

$(function(){
    
   $('#br_strana').click(function(){
       $('#trigger').submit();
    }); 
});
