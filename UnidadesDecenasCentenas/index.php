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



    <!-- Inicio de navBar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark mynav">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">Level <?php echo intval($_POST['level']); ?> </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./controlGrupos">Grupos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./controlAlumnos">Alumnos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./controlActividades">Actividades</a>
            </li>
            
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link nombreUsuario" id="nombreUsuario">Nombre Usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><button class="btn btn-sm btn-light" id="desconectar">Cerrar Sesión</button></a>
            </li>
        </ul>
    </nav><!-- Fin de navBar -->


    
        <div id="initial-message" class="initial-message">
                <h2 class="help-pingu-title">  Ayuda  a  pingu </h2>
                <span align="center">Ayuda  a  pingui  a  contar <br>
                      sus  pescados</span>
                <button id="start" class='start-button'>Entendido</button>
                
            </div>

    <div class="main-container">   
        <div class="first-row row" >
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

/*
function ConectarBaseDatos($sql){

    $mysqli = new mysqli('127.0.0.1', 'root', '', 'proyectolinux');
    if(!$mysqli){
        return false; 
    }
    else{
        $resultado = $mysqli->query($sql);
        $mysqli->close();
        return $resultado;               
    }

}

function loadLevelData($id){
    $sql = "SELECT * FROM unidadesdescenascentenas WHERE idActividad = 6";
    $resultado = ConectarBaseDatos($sql);
    if ($resultado->num_rows > 0){
        
        $fila =  $resultado->fetch_array(MYSQLI_ASSOC);
        return $fila;

    } else {
        return "No hay datos";
    }
}
*/
//$level_data= loadLevelData($_POST['level']);
<?php



    /*
    switch($id){
        case 1: echo 'const num_fish=1; const answer_a = 1; const answer_b = 5; const answer_c = 9;';
                break;
        case 2:  echo 'const num_fish=2; const answer_a = 2;const answer_b = 5;const answer_c = 9;';
                break;
        case 3:  echo 'const num_fish=3;const answer_a = 3;const answer_b = 5;const answer_c = 9;';
                break;
        case 4:  echo 'const num_fish=4;const answer_a = 4;const answer_b = 5;const answer_c = 9;';
    }
    */
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
    $data['num_bags'] = $num_bags;
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
    
    var fish_still_there= true;

    function change_fase(phase){
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
</body>
</html>