window.onload = function() {
    hideLostPanel();
}

var thread;
var timer;

function initCounter(){
    thread = setInterval(incrementSeconds, 1000);
    timer = document.getElementById('seconds-counter');
    timer.innerText = "10";
}

function incrementSeconds() {

    if (seconds > 0) {
        seconds -= 1;
        timer.innerText = seconds;
        
    }else{
        fish_still_there = false;
        move_fish();
        stopLevel();
        //setInterval()
    }

}

function stopLevel() {
    seconds= 15;
    clearInterval(thread);
}

function myMove(movement, fish) {
    var posX = 0;
    var posY = 0;
    var fish_container = document.getElementById(fish.id);
    var id = setInterval(frame, 60);
    var iteration=0;
    var boost=17;
    var height = Math.floor(Math.random() * 10)+70
    function frame() {
        var position = fish_container.getBoundingClientRect();
        if(fish.positionX<15){
            switch(movement){
                case 1: fish_container.style.top = position.top - fish.aleatoriMovement(fish.positionX, position.top, direction(),height)+'px';
                fish_container.style.left = position.left+ boost + 'px'; 
                break;
                case 2: fish_container.style.top = position.top - fish.aleatoriMovement(fish.positionX, position.top, direction() ,height)+'px'; 
                fish_container.style.left = position.left+movement + 10 +'px'; 
                break;
                case 3: fish_container.style.top = position.top - fish.aleatoriMovement(fish.positionX, position.top, direction(),height)+'px'; 
                fish_container.style.left = position.left+movement +20 +'px'; 
                break;
                case 4: fish_container.style.top = position.top - fish.aleatoriMovement(fish.positionX, position.top, direction(),height)+'px'; 
                fish_container.style.left = position.left+movement + 30+'px'; 
                break; 
            }
            
            fish.positionX++
        }
    }
  }
  
var startButton = document.getElementById("start").addEventListener("click", start_level);

function start_level(){
    hideLostPanel();
    initCounter();
    delete_elements("fish_container");
    elements = [];
    change_fase(actual_phase);

    var window = document.getElementById('initial-message');
    window.style.visibility='hidden'; 
    generateOptionPanel();

    setTimeout(function afterTwoSeconds() {
        penguin_state(0);
    }, 1000);

    setTimeout(function afterTwoSeconds() {
        penguin_state(1);
      }, 1000);
    
    setTimeout(function afterTwoSeconds() {
        penguin_state(2);
      }, 2000);
    
    setTimeout(function afterTwoSeconds() {
        penguin_state(3);
        move_pingu(-20);
      }, 3000);
    
    //penguin_state(0);
    setTimeout(function afterTwoSeconds() {
        move_pingu(20);
        generate_level();


      }, 3000);
}

function generate_level(){
    for (var i; i < num_fish; i++) {
        delete_elements('fish_container');
    }

    var cont=0;
    for(var i =0; i< num_fish ; i++){
        generateFish(i);
    }
}

function disable(){
    document.getElementById("Button").disabled = true;
}

function generateOptionPanel(){
    var window = document.getElementById('panel-container');
    window.innerHTML = "<div id='control-panel' class='control-panel'>"+
                        "<h3> ¡Rapido!,  dile  a  pingu  cuantos  pescados <br> tiene,  antes  de  que  se  escapen </h3> "+
                        "<div id='option-panel' class='option_panel'>" +
                        "<button id='option_a' class='button-option button-type'></button>" +
                        "<button id='option_b' class='button-option button-type'></button>" +
                        "<button id='option_c' class='button-option button-type'></button>" +
                        "</div>" +
                        "</div>";
    window.style.visibility='visible';
    var boton = document.getElementById('option_a');
    boton.addEventListener('click', check_answer);
    boton.innerHTML= answer_a;
    var boton = document.getElementById('option_b');
    boton.addEventListener('click', check_answer);
    boton.innerHTML= answer_b;
    var boton = document.getElementById('option_c');
    boton.addEventListener('click', check_answer);
    boton.innerHTML= answer_c; 
}

function generateLostPanel(){
    var window = document.getElementById("help-panel");
    window.style.visibility='visible';

}

function hideLostPanel(){
    var window = document.getElementById('help-panel');
    window.style.visibility='hidden';

}

function check_answer(){
    var boton = this;
    var answer = boton.innerHTML;
    stopLevel();
    if(num_fish == answer && fish_still_there && actual_phase <5){
        addPoints();

        var div = document.getElementById('winner');
        div.style.visibility='visible';

        setTimeout( next_level, 3000);

    }else if(actual_phase<5){
        
        generateLostPanel();
        setTimeout( next_level, 3000);
        
    }else{
        window.location = "level-selection.html";
    }
}

function win(){

}

function lose(){

}

function next_level(){
    var div = document.getElementById('winner');
    div.style.visibility='hidden';
    start_level();
}

function generateFish(cont){
    var movement = 0;
    var fish= new Fish('animated-fish'+cont);
    fish.paint_fish();
    var fish_container = document.createElement("div");
    fish_container.className = "fish_container";
    fish_container.innerHTML=
                "<div id='animated-fish"+cont +"' class='fish-container' "+
                "style='z-index:10; left: 524px;'>"+
                "<div class='fish element'><div class='fish-body' style='background:"+ fish.color +";' ><div class='eye'><div class='pupil'></div></div></div><div class='fin' style='background:"+ fish.color +";'></div><div class='fin fin-bottom' style='background:"+ fish.color +";'>"+
                "</div></div></div>";
                document.body.appendChild(fish_container);
    var movement= Math.floor(Math.random() * 4) + 1;
    myMove(movement, fish);

}

function delete_elements(class_name){
        var elements = document.getElementsByClassName(class_name);
        if(elements != null){
            while(elements.length > 0){
                elements[0].innerHTML= '';
                elements[0].parentNode.removeChild(elements[0]);
            }
        }
}

function delete_elements_by_id(class_name){
        //var elements = document.getElementById(class_name);
        //elements.parentNode.innerHTML = "";
    var parent = document.getElementById("body");
    var child = document.getElementsByClassName("fish_container");
    parent.removeChild(child);
}

function direction(){
    return Math.random() < 0.5 ? -1 : 1;
}

function penguin_state(state){
    var penguin = document.getElementById("penguin-img");
    switch(state){
        case 0: penguin.src="images/p1.png"; break;
        case 1: penguin.src="images/p2.png"; break;
        case 2: penguin.src="images/p3.png"; break;
        case 3: penguin.src="images/p4.png"; break;
    }
}

function move_pingu(positionX){
    var penguin = document.getElementById("fishing-penguin-container");
    var position = penguin.getBoundingClientRect();
    penguin.style.left = position.left + positionX +'px';
}

function move_fish(){
    var fish = document.getElementsByClassName('fish-container');
    var num = fish.length;

    for(var i=0; i<num; i++){
        var element_id = 'animated-fish' + i;       
        move_one_fish(element_id);   
    }
    fishEscaped();
    
}

function fishEscaped(){
    generateLostPanel();
    setTimeout( next_level, 3000);
}

function move_one_fish(html_object_id){
          
    var id = setInterval(frame, 50);
    var fish;
    var fish_container;
    function frame(){
        if(fish_container != null){
        var position = fish_container.getBoundingClientRect();
        fish_container.style.top = position.top + direction()*fish.escape(position.left+30)+'px';
        fish_container.style.left = position.left +50+ 'px';     
        }else{
            fish= new Fish(html_object_id);
            fish_container = document.getElementById(html_object_id);
        }
    }
}

function addPoints(){
    var points = document.getElementById("points");
    var actualPoints = parseInt(points.innerHTML);
    var totalPoints
    if(actualPoints == 0){
        totalPoints = seconds * 1000;
    }else{
        totalPoints = actualPoints * seconds;
    }
    points.innerHTML = totalPoints;
}









