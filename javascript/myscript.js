$(document).ready(function(){
    $('.menubar').click(function(){
        $('.openmenu').toggle();
    });
    var points = $('#points').text();
    if(points < 200){
        $('#request').click(function(){
            $('#request').attr("href","")
            alert("You can not transfer less than 200 points");
            
        });
    }
});