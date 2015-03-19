var days = new Array("","Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
var months = new Array("","January","February","March","April","May","June","July","August","September","October","November","December"); 

var dateObj = new Date();
var day = days[dateObj.getDay() + 1];
var month = months[dateObj.getMonth() + 1];
var year = dateObj.getYear();
var date = dateObj.getDate();
document.write(day + ", " + month + " " + date + ", " + year);