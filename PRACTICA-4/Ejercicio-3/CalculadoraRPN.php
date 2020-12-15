<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio3</title>
    <link rel="stylesheet" href="CalculadoraRPN.css" />
</head>
<body>
    <header>
        <h1>Calculadora RPN</h1>
    </header>
    <main>
        <?php
        session_name("prueba36");
          session_start();

            class CalculadoraRPN {

                public $pantalla;

				public $stack;
				public	$operationDone;
				public	$r;
				public $punto;
				public	$conc;
                public	$e;
                public	$d;
				public	$numeroEnPila;
				

                function __construct() {

                   $this->pantalla="";
                   $this->conc="";
                    $this->stack=array();
                    $this->operationDone=false;
                    $this->r=0;
                    $this->punto=0;
                    $this->e=0;
                    $this->d=0;
                    $this->numeroEnPila=0;
                }

                

                
				

                public function mostrarDigito($digito) {
                     if($this->d==0){
                           $this->conc="";
                           $this->e=0;
                            $this->pantalla .= $digito;
                            $this->conc .= $digito;
                            $this->numeroEnPila=0;
                            $this->d=1;
                     }
                     else{
                         $this->conc .= $digito;
                         $this->pantalla .= $digito;
                         $this->e=0;
                         $this->numeroEnPila=0;
                         $this->d=1;
                     }
                    
					 
                }

                public function operacionAddNumber($number){
                    if(is_nan($number)){
                        $this->pantalla="Error";
                    }
                    else{
                        array_push($this->stack,$number);
                        $this->pantalla="";
                        $stringDisplay="";
                        $n="\n";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                        }
                        $this->pantalla = $stringDisplay;
                    }
                }

                public function enter(){
                    $this->d=0;
                    $this->e=1;
                    $this->operacionAddNumber($this->conc);
                    $this->numeroEnPila=1;
                }

                public function sumar() {
                    
                    if(count($this->stack)<1){
                        $this->pantalla="Error";
                    }
                    else if(count($this->stack)==1 && $this->conc==""){
                        $this->pantalla="Error";
                    }
                    else if($this->numeroEnPila==0){
                        $arriba = array_pop($this->stack);
                        $abajo = $this->conc;
                        $result = floatval($abajo) + floatval($arriba);
                        $this->conc = $result;
                        array_push($this->stack,$result);
                        $this->pantalla="";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=1;
                        $this->numeroEnPila=1;
                        $this->d=0;
                    }
                    else if($this->numeroEnPila==1){
                        $abajo = array_pop($this->stack);
                        $arriba = array_pop($this->stack);
                        $result = floatval($arriba) + floatval($abajo);
                        $this->conc=$result;
                        array_push($this->stack,$result);
                        $this->pantalla = "";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=0;
                        
                        $this->d=0;
                    }
                    else{
                        $this->pantalla = "Error";
                    }
                    
                }

                function restar() {
                    if(count($this->stack)<1){
                        $this->pantalla="Error";
                    }
                    else if(count($this->stack)==1 && $this->conc==""){
                        $this->pantalla="Error";
                    }
                    else if($this->numeroEnPila==0){
                        $arriba = array_pop($this->stack);
                        $abajo = $this->conc;
                        $result = floatval($abajo) - floatval($arriba);
                        $this->conc = $result;
                        array_push($this->stack,$result);
                        $this->pantalla="";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=1;
                        $this->numeroEnPila=1;
                        $this->d=0;
                    }
                    else if($this->numeroEnPila==1){
                        $abajo = array_pop($this->stack);
                        $arriba = array_pop($this->stack);
                        $result = floatval($arriba) - floatval($abajo);
                        $this->conc=$result;
                        array_push($this->stack,$result);
                        $this->pantalla = "";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=0;
                        
                        $this->d=0;
                    }
                    else{
                        $this->pantalla = "Error";
                    }
                    
                    
                }

                function multiplicar() {
                    if(count($this->stack)<1){
                        $this->pantalla="Error";
                    }
                    else if(count($this->stack)==1 && $this->conc==""){
                        $this->pantalla="Error";
                    }
                    else if($this->numeroEnPila==0){
                        $arriba = array_pop($this->stack);
                        $abajo = $this->conc;
                        $result = floatval($abajo) * floatval($arriba);
                        $this->conc = $result;
                        array_push($this->stack,$result);
                        $this->pantalla="";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=1;
                        $this->numeroEnPila=1;
                        $this->d=0;
                    }
                    else if($this->numeroEnPila==1){
                        $abajo = array_pop($this->stack);
                        $arriba = array_pop($this->stack);
                        $result = floatval($arriba) * floatval($abajo);
                        $this->conc=$result;
                        array_push($this->stack,$result);
                        $this->pantalla = "";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=0;
                        
                        $this->d=0;
                    }
                    else{
                        $this->pantalla = "Error";
                    }
                    
                }

                function dividir() {
                    if(count($this->stack)<1){
                        $this->pantalla="Error";
                    }
                    else if(count($this->stack)==1 && $this->conc==""){
                        $this->pantalla="Error";
                    }
                    else if($this->numeroEnPila==0){
                        $arriba = array_pop($this->stack);
                        $abajo = $this->conc;
                        $result = floatval($abajo) / floatval($arriba);
                        $this->conc = $result;
                        array_push($this->stack,$result);
                        $this->pantalla="";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=1;
                        $this->numeroEnPila=1;
                        $this->d=0;
                    }
                    else if($this->numeroEnPila==1){
                        $abajo = array_pop($this->stack);
                        $arriba = array_pop($this->stack);
                        $result = floatval($arriba) / floatval($abajo);
                        $this->conc=$result;
                        array_push($this->stack,$result);
                        $this->pantalla = "";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=0;
                        
                        $this->d=0;
                    }
                    else{
                        $this->pantalla = "Error";
                    }
                    
                }

                function seno(){
                   
                    if($this->numeroEnPila==0){
                        $ultima = array_pop($this->stack);
                        
                        $result = sin($ultima);
                        $this->conc = $result;
                        array_push($this->stack,$result);
                        $this->pantalla="";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=1;
                        $this->numeroEnPila=1;
                       
                    }
                    else{ 
                        $ultima = $this->conc;
                        
                        $result = sin($ultima);
                        $this->conc=$result;
                        array_push($this->stack,$result);
                        $this->pantalla = "";
                        $stringDisplay="";
                        for($i=0;$i<count($this->stack);$i++){
                            $stringDisplay.= $this->stack[$i] . "\n";
                            
                        }
                        $this->pantalla = $stringDisplay;
                        $this->e=1;
                        
                        $this->numeroEnPila=1;
                    }
                    
                    
                }

                public function clean(){
                    $this->stack=array();
                    $this->pantalla="";
                }
             
            }
            

            $calculadora = new CalculadoraRPN();

            if (isset($_SESSION['calculadora'])) {
                $calculadora=$_SESSION['calculadora'];
            }
            else{
                $_SESSION['calculadora']=$calculadora;
            }


            if (count($_POST) > 0) {
               
                
				if(isset($_POST['sin'])) $calculadora->seno();
                if(isset($_POST['cos'])) $calculadora->coseno();
                if(isset($_POST['tan'])) $calculadora->tangente();
				if(isset($_POST['div'])) $calculadora->dividir();

                if(isset($_POST['7'])) $calculadora->mostrarDigito('7');
                if(isset($_POST['8'])) $calculadora->mostrarDigito('8');
                if(isset($_POST['9'])) $calculadora->mostrarDigito('9');
                if(isset($_POST['mul'])) $calculadora->multiplicar();

                if(isset($_POST['4'])) $calculadora->mostrarDigito('4');
                if(isset($_POST['5'])) $calculadora->mostrarDigito('5');
                if(isset($_POST['6'])) $calculadora->mostrarDigito('6');
                if(isset($_POST['res'])) $calculadora->restar();

                if(isset($_POST['1'])) $calculadora->mostrarDigito('1');
                if(isset($_POST['2'])) $calculadora->mostrarDigito('2');
                if(isset($_POST['3'])) $calculadora->mostrarDigito('3');
                if(isset($_POST['sum'])) $calculadora->sumar();

                if(isset($_POST['clean'])) $calculadora->clean();
                if(isset($_POST['0'])) $calculadora->mostrarDigito('0');
                if(isset($_POST['punto'])) $calculadora->mostrarDigito('.');
                if(isset($_POST['igual'])) $calculadora->enter();
            }


         

            echo "
                <form action='#' method='post' name='calculadora'>
                    <label for='pantalla'>No visible</label>
                    <textarea id='pantalla' readonly> $calculadora->pantalla </textarea>
					
					<p>
					<input type='submit' class='operation' name='sin' value='sin' />
					<input type='submit' class='operation' name='cos' value='cos' />
					<input type='submit' class='operation' name='tan' value='tan' />
					
					<input type='submit' class='operation' name='div' value='&uarr;' />

					</p>
					<p>
                    <input type='submit' class='number' name='7' value='7' />
                    <input type='submit' class='number' name='8' value='8' />
                    <input type='submit' class='number' name='9' value='9' />
                    <input type='submit' class='operation' name='mul' value='*' />
					</p>
					<p>
                    <input type='submit' class='number' name='4' value='4' />
                    <input type='submit' class='number' name='5' value='5' />
                    <input type='submit' class='number' name='6' value='6' />
                    <input type='submit' class='operation' name='res' value='-' />
					</p>
					<p>
                    <input type='submit' class='number' name='1' value='1' />
                    <input type='submit' class='number' name='2' value='2' />
                    <input type='submit' class='number' name='3' value='3' />
                    <input type='submit' class='operation' name='sum' value='+' />
					</p>
					<p>
					
                    <input type='submit' class='number' name='0' value='0' />
                    <input type='submit' class='number' name='punto' value='.' />
                    <input type='submit' class='operation' name='clean' value='C' />
                    <input type='submit' class='operation' name='igual' value='=' />
					</p>
                </form>
            ";
        ?>
    </main>
<footer>
    <p>Candela Bobes Junquera, UO269948  </p>    
 </footer>  
</body>
</html>