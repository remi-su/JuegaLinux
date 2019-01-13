<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
    <title>Document</title>
</head>
<body id="body" class="body">


    <!--
    efecto de nieve
        http://codeconvey.com/make-css-snow-animation-effect-using-css3/


     -->

    <!-- Inicio de navBar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark mynav">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">Level <?php echo intval($_POST['level']); ?> </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">Puntos: </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link" id="points"> 0</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">te quedan: </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" id='seconds-counter'> </a>
            </li>
            
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                          </li>
            <li class="nav-item">
            </li>
        </ul>
    </nav><!-- Fin de navBar -->




    <DIV class="snow-container">



<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❄
  </div>
</div>






    </DIV>

        <div id="initial-message" class="initial-message">
                <h2 class="help-pingu-title">  Ayuda  a  pingu </h2>
                <span align="center">Ayuda  a  pingui  a  contar <br>
                      sus  pescados</span>

                <div class="" style="display: flex; height: 200px; align-items: center;">
                    <div class="col-4">
                        <div class=''>
                           <div class='fish element'>
                                <div class='fish-body' style='background:red;' >
                                    <div class='eye'>
                                        <div class='pupil'>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class='fin' style='background:red;'>
                                </div>
                                <div class='fin fin-bottom' style='background:red;'>
                                </div>
                            </div>
                        </div>
                        valor x 1
                    </div>
                
                <div class="col-4">
                    <div class=''>
                        <img class="medium_bag" height="100px" width="150px" src='images/mediana.png'>
                    </div>
                        valor x 10
                </div>
                <div class="col-4">
                    <div class=''>
                        <img class="big_bag" height="100px" width="150px" src='images/grande.png'>
                        </div>
                        valor x 100
                </div>
                    
                </div>
                <button id="start" class='start-button'>Entendido</button>
                
            </div>


        <div id="help-panel" class="help">
            <div class='help-title'>
                <h2 class="title">  Recuerda que ...</h2>
                <img src="images/caratriste.jpg" height="100px" width="100px" style="margin-left: auto" />
            </div>
                <span align="center">Debes decir cuantos peces hay antes de que se acabe el tiempo
                </span>
                    <div class="row row2" style="display: flex; height: 200px; align-items: center;">
                    <div class="col-3">
                        la suma de tres
                        <div class='fish-center'>
                           <div class='fish element'>
                                <div class='fish-body' style='background:red;' >
                                    <div class='eye'>
                                        <div class='pupil'>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class='fin' style='background:red;'>
                                </div>
                                <div class='fin fin-bottom' style='background:red;'>
                                </div>
                            </div>
                            <div style="margin-left: 20%">=</div>
                        </div> 3 unidades
                    </div>
                
                <div class="col-3">

                    la suma de diez 
                    <div class='fish-center'>
                           <div class='fish element'>
                                <div class='fish-body' style='background:red;' >
                                    <div class='eye'>
                                        <div class='pupil'>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class='fin' style='background:red;'>
                                </div>
                                <div class='fin fin-bottom' style='background:red;'>
                                </div>
                            </div>
                            <div style="margin-left: 20%">=</div>
                        </div> Una decena
                        valor x 10
                </div>
                <div class="col-3">
                    La suma de 30 
                    <div class='fish-center'>
                           <div class='fish element'>
                                <div class='fish-body' style='background:red;' >
                                    <div class='eye'>
                                        <div class='pupil'>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class='fin' style='background:red;'>
                                </div>
                                <div class='fin fin-bottom' style='background:red;'>
                                </div>
                            </div>
                            <div style="margin-left: 20%">=</div>
                        </div> 300 unidades = 3 centenas
                        valor x 100
                </div>

                </div>
                <span class="center">Cargando siguiente nivel</span>
        </div>

    <div class="main-container"> 


        <div class="first-row row" >

                    <div id="winner" class='winner'>
               
           <span style='color: #4285f4'>felicidades</span> 
           <span style='color: #ea4335'>has</span> 
           <span style='color: #fbbc05'>ganado</span> 
           <span style='color: #4285f4'>el</span> 
           <span style='color: #4285f4'>nivel</span> 

           <img src='images/cara.jpg'/ height="100px" width="100px">

       </div>  
            <div id="background-wrap">
                <div class="textContainer">


                </div>
                    <div class="x1">
                        <div class="cloud"></div>
                    </div>
                
                    <div class="x2">
                        <div class="cloud"></div>
                    </div>
                
                    <div class="x3">
                        <div class="cloud"></div>
                    </div>
            </div>
    </div>
        <div class="row" >
            <div class="hills-container ">
                <div class='nearest-hills'>

                        <div class="hill hill-1">
                            <div class="snow"></div>
                        </div>
                        <div class="hill hill-2">
                            <div class="snow"></div>
                        </div>
                        <div class="hill hill-3">
                            <div class="snow"></div>
                        </div>
                </div>
                <div class='farest-hills'>
                        <div class="hill hill-4">
                            <div class="snow"></div>
                        </div>
                        <div class="hill hill-5">
                            <div class="snow"></div>
                        </div>
                        </div>
                </div>
            </div>
        <div class="third-row row" >
            <div class="background">
                <div class="ground"></div>
                <div class="group-penguin-container">
                        <div class="npc-penguin-container">
                                <div class="penguin-body"></div>
                                <div class="penguin-body-inside"></div>
                                <div class="penguin-right-wing"></div>
                                <div class="penguin-left-wing"></div>
                                <div class="penguin-right-eye"></div>
                                <div class="penguin-left-eye"></div>
                                <div class="penguin-nose"></div>
                                <div class="penguin-left-foot"></div>
                                <div class="penguin-right-foot"></div>
                                <div class="shadow"></div>
                        </div>
                        <div class="npc-penguin-container">
                            <div class="penguin-body"></div>
                            <div class="penguin-body-inside"></div>
                            <div class="penguin-right-wing"></div>
                            <div class="penguin-left-wing"></div>
                            <div class="penguin-right-eye"></div>
                            <div class="penguin-left-eye"></div>
                            <div class="penguin-nose"></div>
                            <div class="penguin-left-foot"></div>
                            <div class="penguin-right-foot"></div>
                            <div class="shadow"></div>
                        </div>
                </div>
            </div>
                <div class="ground">

                </div >
            <div class="animation">
                <div class="walking-penguin">
                    <div class="penguin-container">
                        <div class="penguin-body"></div>
                        <div class="penguin-body-inside"></div>
                        <div class="penguin-right-wing"></div>
                        <div class="penguin-left-wing"></div>
                        <div class="penguin-right-eye"></div>
                        <div class="penguin-left-eye"></div>
                        <div class="penguin-nose"></div>
                        <div class="penguin-left-foot"></div>
                        <div class="penguin-right-foot"></div>
                        <div class="shadow"></div>
                      </div>
                </div>
                <div id="fishing-penguin-container" style="left: 410px;" class="fishing-penguin-container">
                    <img id="penguin-img" class="penguin-img" src="images/p1.png">
                </div>

                    <div class="jumping-penguin"></div>
                    <div class="water"></div>
            </div>

            <div id="hole" class="hole">   
            </div>

            <div id="panel-container">
                

        </div> 
        </div>
        <script>
<?php
    $level = intval($_POST['level']);
    $data = array();
    switch ($level) {
        case 1: 
            $data = generate_level(1);
            break;
        case 2:
            $data = generate_level(2);
            break;
        case 3:
            $data = generate_level(3);
            break;
        case 4:
            $data = generate_level(4);
            break;
        default: 
    }
   
function generate_level($level){
    $data = array();
    switch ($level) {
        case 1: 
            $data['phase_1'] = generate_phase(1,0,1,1,9);
            $data['phase_2'] = generate_phase(2,0,2,2,9);
            $data['phase_3'] = generate_phase(3,0,3,3,9);
            $data['phase_4'] = generate_phase(4,0,4,4,9);
            break;
        case 2:
            $data['phase_1'] = generate_phase(1,0,1,1,9);
            $data['phase_2'] = generate_phase(2,0,2,2,9);
            $data['phase_3'] = generate_phase(3,0,3,3,9);
            $data['phase_4'] = generate_phase(4,0,4,4,9);
            break;
        case 3:
            $data['phase_1'] = generate_phase(1,0,1,1,9);
            $data['phase_2'] = generate_phase(2,0,2,2,9);
            $data['phase_3'] = generate_phase(3,0,3,3,9);
            $data['phase_4'] = generate_phase(4,0,4,4,9);
            break;
        case 4:
            $data['phase_1'] = generate_phase(1,0,1,1,9);
            $data['phase_2'] = generate_phase(2,0,2,2,9);
            $data['phase_3'] = generate_phase(3,0,3,3,9);
            $data['phase_4'] = generate_phase(4,0,4,4,9);
            break;
        default: 
    }
    return $data;
}


function generate_phase($num_fish,$num_bags, $answer_a, $answer_b, $answer_c){
    $data = array();
    $data['num_fish'] = $num_fish;
    $data['num_medium_bags'] = $num_bags;
    $data['num_big_bags'] = $num_bags;
    $data['answer_a'] = $answer_a;
    $data['answer_b'] = $answer_b;
    $data['answer_c'] = $answer_c;
    return $data;
}?>
    var elements;
    var num_fish;
    var num_bags;
    var answer_a;
    var answer_b;
    var answer_c;
    var actual_phase = 0;
    const time_before_escape = 10000;// en ms
    var seconds = time_before_escape/1000;
    
    var fish_still_there= true;

    function change_fase(phase){
        fish_still_there = true;
        
        seconds = time_before_escape/1000;
        actual_phase++;
        switch(actual_phase){
            case 1:
                num_fish =  <?php echo $data['phase_1']['num_fish']; ?>;
                num_bags =  <?php echo $data['phase_1']['num_bags']; ?>;
                answer_a = <?php echo $data['phase_1']['answer_a']; ?>;
                answer_b = <?php echo $data['phase_1']['answer_b']; ?>;
                answer_c = <?php echo $data['phase_1']['answer_c']; ?>;
                break;
            case 2:
                num_fish =  <?php echo $data['phase_2']['num_fish']; ?>;
                num_bags =  <?php echo $data['phase_2']['num_bags']; ?>;
                answer_a = <?php echo $data['phase_2']['answer_a']; ?>;
                answer_b = <?php echo $data['phase_2']['answer_b']; ?>;
                answer_c = <?php echo $data['phase_2']['answer_c']; ?>;
                break;
            case 3:
                num_fish =  <?php echo $data['phase_3']['num_fish']; ?>;
                num_bags =  <?php echo $data['phase_3']['num_bags']; ?>;
                answer_a = <?php echo $data['phase_3']['answer_a']; ?>;
                answer_b = <?php echo $data['phase_3']['answer_b']; ?>;
                answer_c = <?php echo $data['phase_3']['answer_c']; ?>;
                break;
            case 4:
                num_fish =  <?php echo $data['phase_4']['num_fish']; ?>;
                num_bags =  <?php echo $data['phase_4']['num_bags']; ?>;
                answer_a = <?php echo $data['phase_4']['answer_a']; ?>;
                answer_b = <?php echo $data['phase_4']['answer_b']; ?>;
                answer_c = <?php echo $data['phase_4']['answer_c']; ?>;
                break;
        }
    }
    </script>
    <script src="js/movement.js"></script>   
    <script src="js/fish.js"></script>
    <script src="js/time.js"></script>    
</body>
</html>