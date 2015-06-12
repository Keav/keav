var browser=false;
if(document.images) browser=true;

if (browser) {
home = new Image();
home.src = "images/home.jpg";
home2 = new Image();
home2.src = "images/home2.jpg";

whats_on = new Image();
whats_on.src = "images/whats_on.jpg";
whats_on2 = new Image();
whats_on2.src = "images/whats_on2.jpg";

accomodation = new Image();
accomodation.src = "images/accomodation.jpg";
accomodation2 = new Image();
accomodation2.src = "images/accomodation2.jpg";

finance = new Image();
finance.src = "images/finance.jpg";
finance2 = new Image();
finance2.src = "images/finance2.jpg";

classified = new Image();
classified.src = "images/classified.jpg";
classified2 = new Image();
classified2.src = "images/classified2.jpg";

sports = new Image();
sports.src = "images/sports.jpg";
sports2 = new Image();
sports2.src = "images/sports2.jpg";

jobs = new Image();
jobs.src = "images/jobs.jpg";
jobs2 = new Image();
jobs2.src = "images/jobs2.jpg";

universities = new Image();
universities.src = "images/universities.jpg";
universities2 = new Image();
universities2.src = "images/universities2.jpg";

student_clubs = new Image();
student_clubs.src = "images/student_clubs.jpg";
student_clubs2 = new Image();
student_clubs2.src = "images/student_clubs2.jpg";

website_business = new Image();
website_business.src = "images/website_business.jpg";
website_business2 = new Image();
website_business2.src = "images/website_business2.jpg";
}

function button(name,image) {
if (browser) {
	document.images[name].src = eval(image + ".src");
	}
}