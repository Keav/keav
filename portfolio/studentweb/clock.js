function funClock() {
if (!document.layers && !document.all)
return;
var runTime = new Date();
var hours = runTime.getHours();
var minutes = runTime.getMinutes();
var seconds = runTime.getSeconds();
var dn = "AM";
if (hours > 11) {
dn = "PM";
hours = hours - 12;}

if (hours == 0) {
hours = 12;}

if (minutes <= 9) {
minutes = "0" + minutes;}

if (seconds <= 9) {
seconds = "0" + seconds;}

movingtime = hours + ":" + minutes + ":" + seconds + " " + dn;
if (document.layers) {
document.layers.clock.document.write(movingtime);
document.layers.clock.document.close();}

else if (document.all) {
clock.innerHTML = movingtime;}

setTimeout("funClock()", 1000)}

window.onload = funClock;