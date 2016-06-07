function enhance(small) {
	/*
	var idx = "d" + small;
	var filename = "images/pic0" + small + "_thx.jpg";
	document.getElementById(idx).src=filename;
	*/
}

function dehance(big) {
	/*
	var idy = "d" + big;
	var filename = "images/pic0" + big + "_th.jpg";
	document.getElementById(idy).src=filename0;
	*/
}

function hitme(img, pic) {
	var filename = "images/" + pic +".jpg";
	document.getElementById(img).src = filename;
}

function replace(title, description, titleDestination, destination) {
	document.getElementById(titleDestination).innerHTML = document.getElementById(title).innerHTML;
	document.getElementById(destination).innerHTML = document.getElementById(description).innerHTML;
	
	if (titleDestination == 'tinTitle') {
		document.getElementById('tinbuy').style.display = "flex";
		document.getElementById('tinAmount').style.display = "flex";
		document.getElementById('gotoTin').style.display = "flex";
		document.getElementById('gotoTin').style.justifyContent = "center";
	} else if (titleDestination == 'reedTitle') {
		document.getElementById('reedbuy').style.display = "flex";
		document.getElementById('reedAmount').style.display = "flex";
		document.getElementById('gotoReed').style.display = "flex";
		document.getElementById('gotoReed').style.justifyContent = "center";
	} else {
		document.getElementById('glassbuy').style.display = "flex";
		document.getElementById('glassAmount').style.display = "flex";
		document.getElementById('gotoGlass').style.display = "flex";
		document.getElementById('gotoGlass').style.justifyContent = "center";
	}
}