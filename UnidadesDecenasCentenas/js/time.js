var seconds = time_before_escape/1000;
var timer = document.getElementById('seconds-counter');

function incrementSeconds() {


    if (seconds > 0) {
    	seconds -= 1;
    	timer.innerText = "Te quedan " + seconds;
    }else{
    	move_fish();
    	myStopFunction();
    }

}



