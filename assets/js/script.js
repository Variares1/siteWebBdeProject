function day() {
	var myImg = document.querySelector("nav > img:last-of-type");
	var myNavBar = document.querySelector("nav");
	if(myImg.id=="jour"){
		myImg.setAttribute("id", "nuit");
		myNavBar.setAttribute("id", "night");
	}
	else if(myImg.id=="nuit"){
		myImg.setAttribute("id", "jour");
		myNavBar.setAttribute("id", "day");
	}
	return 0;
}