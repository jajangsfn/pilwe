$(function() {
    setInterval(realtime_clock, 1000);
    
});
var i = 1;
function realtime_clock() {
    
        $("#clock").html("Pukul : "+moment().format('LTS'))
}
  
  