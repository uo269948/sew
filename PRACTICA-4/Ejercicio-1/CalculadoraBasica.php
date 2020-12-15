<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora básica</title>
    <link rel="stylesheet" href="CalculadoraBasica.css" />
</head>
<body>
    <header>
        <h1>Calculadora básica</h1>
    </header>
    <main>
        <?php
        session_name("prueba16");
          session_start();

            class CalculadoraBasica {

                public $pantalla;
                public $memoria;
                public $r;

                function __construct() {
                   $this->r=0;
                   $this->memoria="";
                   $this->pantalla='0';
                }


                 function mostrarDigito($digito) {
                     if($this->pantalla=='0'){
                         $this->pantalla = $digito;
                     }
                     else if($this->r==1){
                         $this->pantalla .= $digito;
                         $this->r=0;
                     }
                     else{
                         $this->pantalla .= $digito;
                     }
                    

                }

               
				
				 function borrar() {
                     $this->pantalla="0";
                     
                }

                function resultado() {
                    error_reporting(E_ERROR | E_PARSE);
                   try {
                        $this->pantalla = eval("return $this->pantalla ;");
                    } 
					
					catch (ParseError $e) {
                       $this->pantalla = "Fallo: " .$e->getMessage();
                    }
					
                   
                }
                

                function mostrarMemoria() {
                    if($this->pantalla=="0"){
                        $this->pantalla = $this->memoria;
                        $this->memoria="";
                        $this->r=1;
                    }
                    else{
                        $this->pantalla .= $this->memoria;
                        $this->memoria="";
                        $this->r=1;
                    }
                }

                function restarAMemoria() {
                    try{
                    $this->memoria -= eval("return $this->pantalla;");
                    $this->borrar();
                    }
                    catch (Throwable $e) {
                        $this->pantalla = "Fallo: " .$e->getMessage();
                     }
                    
                }

                function sumarAMemoria() {
                    try{
                    $this->memoria .= eval("return $this->pantalla;");
                    $this->borrar();
                    }
                    catch (Throwable $e) {
                        $this->pantalla = "Fallo: " .$e->getMessage();
                     }
                }

               

            }

            $calculadora = new CalculadoraBasica();

            
            if (isset($_SESSION['calculadora'])) {
                $calculadora=$_SESSION['calculadora'];
            }
            else{
                $_SESSION['calculadora']=$calculadora;
            }

            if (count($_POST) > 0) {
                if(isset($_POST['mrc'])) $calculadora->mostrarMemoria();
                if(isset($_POST['m-'])) $calculadora->restarAMemoria();
                if(isset($_POST['m+'])) $calculadora->sumarAMemoria();
                if(isset($_POST['div'])) $calculadora->mostrarDigito('/');

                if(isset($_POST['7'])) $calculadora->mostrarDigito(7);
                if(isset($_POST['8'])) $calculadora->mostrarDigito(8);
                if(isset($_POST['9'])) $calculadora->mostrarDigito(9);
                if(isset($_POST['mul'])) $calculadora->mostrarDigito('*');

                if(isset($_POST['4'])) $calculadora->mostrarDigito(4);
                if(isset($_POST['5'])) $calculadora->mostrarDigito(5);
                if(isset($_POST['6'])) $calculadora->mostrarDigito(6);
                if(isset($_POST['res'])) $calculadora->mostrarDigito('-');

                if(isset($_POST['1'])) $calculadora->mostrarDigito(1);
                if(isset($_POST['2'])) $calculadora->mostrarDigito(2);
                if(isset($_POST['3'])) $calculadora->mostrarDigito(3);
                if(isset($_POST['sum'])) $calculadora->mostrarDigito('+');

                if(isset($_POST['0'])) $calculadora->mostrarDigito(0);
                if(isset($_POST['punto'])) $calculadora->mostrarDigito('.');
                if(isset($_POST['borrar'])) $calculadora->borrar();
                if(isset($_POST['igual'])) $calculadora->resultado();
            }

            

            echo "
                <form action='#' method='post' name='calculadora'>
                <input type='text' id='pantalla' title='Pantalla' value='$calculadora->pantalla' disabled />
					<p>
                    <input type='submit' class='memory'name='mrc' value='mrc' />
                    <input type='submit' class='memory' name='m-' value='m-' />
                    <input type='submit' class='memory' name='m+' value='m+' />
                    <input type='submit' class='operation' name='div' value='/' />
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
                    <input type='submit' class='operation' name='borrar' value='C' />
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