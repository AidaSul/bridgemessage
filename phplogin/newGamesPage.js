

function checkIfGood() {
	
	var day = document.getElementById("day").options[document.getElementById("day").selectedIndex].value;
	var month = document.getElementById("month").options[document.getElementById("month").selectedIndex].value;
	var d = document.getElementById("year").options[document.getElementById("year").selectedIndex].value;
	var year = properYear();
    var hour = document.getElementById("hour").options[document.getElementById("hour").selectedIndex].value;
	var minute = document.getElementById("minute").options[document.getElementById("minute").selectedIndex].value;
	var noon = document.getElementById("noon").options[document.getElementById("noon").selectedIndex].value;
    var loc = document.getElementById("location").options[document.getElementById("location").selectedIndex].value;
    var cardStatus = document.getElementById("cardStatus").checked;

	if (properDate()) {
		if(month == "December" && day == "25"){
			alert("Merry Christmas!\n" + 
				"Bridge Game Information\n" +
				"Time of game: " + hour + ":" + minute + " " + noon + "\n" +
				"Date: " + month + " " + day + dateEnd() + " " + year + "\n" + 
				"Location: " + loc + "\n" +
				"You are " + responsibility() + "bringing the cards" + "\n");
	
		}
		
		else {
			alert("Bridge Game Information\n" +
				"Time of game: " + hour + ":" + minute + " " + noon + "\n" +
				"Date: " + month + " " + day + dateEnd() + " " + year + "\n" + 
				"Location: " + loc + "\n" +
				"You are " + responsibility() + "bringing the cards" + "\n");
		}
	}
	else {
		alert("Invalid Date");
	}

function responsibility() {
        if (cardStatus) {
            return "";
        } else {
            return "NOT ";
        }


    }

function dateEnd(){
	if(day == "1" || day == "21" || day == "31")
		return "st";
	else if(day == "2" || day == "22")
		return "nd";
	else if(day == "3" || day == "23")
		return "rd";
	else
		return "th";
}

function properYear(){
	var b = new Date().getFullYear();
	
	if (d == "1")
		return b;
	
	else if (d == "2")
		return ++b;

	else
		b = b + 2;
		return b;
}

function properDate(){
	if(((month == "April" || month == "June" || month == "September" || month == "November") && day == "31") 
		|| (month == "February" && (day == "30" || day == "31" || (day == "29" && !(isLeapYear())))))
		return false;
	else
		return true;
}


function isLeapYear(){
	var y = parseInt(year);

	if (y%4 != 0)
		return false;
	else if (y%100 != 0)
		return true;
	else if (y%400 != 0)
		return false;
	else
		return true;

}
}