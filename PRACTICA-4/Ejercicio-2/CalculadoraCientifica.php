<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio2</title>
    <link rel="stylesheet" href="CalculadoraCientifica.css" />
</head>
<body>
    <header>
        <h1>Calculadora cientifica</h1>
    </header>
    <main>
        <?php
        session_name("prueba11");
          session_start();

            class CalculadoraBasica {

                public $pantalla;
				public $numero;
				public	$conc;
				public	$operacion;
				public $igual;
				public	$resultado;
				public	$pot;
				public	$numero1;
				public	$numero2;
				

                function __construct() {

                   $this->numero="";
                   $this->conc="";
                    $this->operacion=0;
                    $this->igual=0;
                    $this->resultado=0;
                    $this->pantalla="";
                    $this->pot=0;
                    $this->numero1=0.0;
                    $this->numero2=0.0;
                }

                

                
				

                 function mostrarDigito($digito) {
                     if($this->pot==0){
                            $this->pantalla .= $digito;
                            $this->numero .= $digito;
                            
                            
                     }
                     else{
                         if($this->pantalla==$this->numero){
                             $this->numero1=$this->numero;
                             $this->numero2=$digito;
                             $this->numero = pow(floatval($this->numero1),floatval($this->numero2));
                             $this->pantalla = $this->numero;
                             $this->conc=$this->pantalla;
                             $this->pot=0;
                         }
                         else{
                            $this->numero1=floatval($this->numero);
                            $this->numero2=$digito;
                            echo  $this->numero1;

                            $this->numero = pow($this->numero1,$this->numero2);
                            $this->pantalla = $this->conc . $this->numero;
                            $this->conc = $this->pantalla;
                            $this->numero = "";
                            $this->pot=0;
                         }
                     }
                    
					 
                }

                public function sumar() {
                    
                    if($this->operacion==0){
                        $this->conc .= $this->numero .'+';
                        $this->numero = "";
                        $this->pantalla .= "+";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                    else{
                        $this->conc .= $this->numero;
                        $this->numero = "";
                        $this->pantalla = eval("return $this->conc;") . "+";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                    
                }

                function restar() {
                    if($this->operacion==0){
                        $this->conc .= $this->numero .'-';
                        $this->numero = "";
                        $this->pantalla .="-";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                    else{
                        $this->conc .= $this->numero;
                        $this->numero = "";
                        $this->pantalla = eval("return $this->conc;") . "-";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                }

                function multiplicar() {
                    if($this->operacion==0){
                        $this->conc = $this->conc . $this->numero .'*';
                        $this->numero = "";
                        $this->pantalla = $this->pantalla . "*";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                    else{
                        $this->conc .= $this->numero;
                        $this->numero = "";
                        $this->pantalla = eval("return $this->conc;") . "*";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                }

                function dividir() {
                    if($this->operacion==0){
                        $this->conc = $this->conc . $this->numero .'/';
                        $this->numero = "";
                        $this->pantalla = $this->pantalla . "/";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                    else{
                        $this->conc .= $this->numero;
                        $this->numero = "";
                        $this->pantalla = eval("return $this->conc;") . "/";
                        $this->conc = $this->pantalla;
                        $this->operacion=1;
                        $this->igual=0;
                        
                        
                    }
                }
                


            }
            class CalculadoraCientifica extends CalculadoraBasica{
                public function potencia2(){
                   

                    
					if( $this->igual ==0){
                        $this->numero = pow(floatval($this->numero), 2);
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						
						 if($this->numero==$this->pantalla){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=pow(floatval($this->numero), 2);
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }

                public function potencia10(){
                    if( $this->igual ==0){
                        $this->numero = pow(10,floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						
						 if($this->numero==$this->pantalla){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=pow(10,floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }
                public function raiz(){
                    if( $this->igual ==0){
                        $this->numero = sqrt(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=sqrt(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }
                public function logaritmo(){
                    if( $this->igual ==0){
                        $this->numero = log10(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=log10(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }

                public function ln(){
                    if( $this->igual ==0){
                        $this->numero = log(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=log(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }

                public function seno(){
                    if( $this->igual ==0){
                        $this->conc .= sin(floatval($this->numero));
                        $this->numero = (sin(floatval($this->numero)));
                        
                        $this->pantalla = ($this->conc);
                        $val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=sin(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }
                public function coseno(){
                    if( $this->igual ==0){
                        $this->numero = cos(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=cos(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }
                public function tangente(){
                    if( $this->igual ==0){
                        $this->numero = tan(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=tan(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }

                public function aseno(){
                    if( $this->igual ==0){
                        $this->numero = asin(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=asin(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }
                public function acoseno(){
                    if( $this->igual ==0){
                        $this->numero = acos(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=acos(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }
                public function atangente(){
                    if( $this->igual ==0){
                        $this->numero = atan(floatval($this->numero));
                        $this->conc.=$this->numero;
                        $this->pantalla = $this->conc;
						
						$val1 = floatval($this->pantalla);
                        $val2 = floatval($this->numero);
                        
						 if(round($val1,2)==round($val2,2)){
							 $this->igual=1;
							 $this->numero=$this->pantalla;
						 }
						 else{
							 $this->numero="";
						 }
					}
					else{
						$this->numero=$this->conc;
						$this->conc=atan(floatval($this->numero));
                        $this->pantalla = $this->conc;
						 $this->numero="";
                    }
                }

                public function potencia(){
                    $this->pot=1;
                }
				
				 function borrar() {
                    $this->numero="";
                    $this->conc="";
                     $this->operacion=0;
                     $this->igual=0;
                     $this->resultado=0;
                     $this->pantalla="";
                     $this->pot=0;
                     $this->numero1=0.0;
                     $this->numero2=0.0;
                }

                public function igual() {
                    error_reporting(E_ERROR | E_PARSE);
                   try {
                        $this->pantalla = eval("return $this->pantalla;");
                        $this->conc = $this->pantalla;
                        $this->numero = "";
                        $this->igual = 1;
                    } 
					
					catch (ParseError $e) {
                       $this->pantalla = "Operacion no correcta";
                    }
					
                    
                }

                public function cleanDisplayPartial(){
                    $this->pantalla = substr($this->pantalla,0,-1);
                    $this->conc = $this->pantalla;
                    $this->operacion=0;
                    $this->numero="";
                }
             
             

                

                

               

            }

            $calculadora = new CalculadoraCientifica();
            if (isset($_SESSION['calculadora'])) {
                $calculadora=$_SESSION['calculadora'];
            }
            else{
                $_SESSION['calculadora']=$calculadora;
            }


            if (count($_POST) > 0) {
                if(isset($_POST['potencia2'])) $calculadora->potencia2();
                if(isset($_POST['potencia10'])) $calculadora->potencia10();
                if(isset($_POST['potencia'])) $calculadora->potencia();
				if(isset($_POST['e'])) $calculadora->mostrarDigito('2.71828182846');
                if(isset($_POST['log'])) $calculadora->logaritmo();
                
				if(isset($_POST['sin'])) $calculadora->seno();
                if(isset($_POST['cos'])) $calculadora->coseno();
                if(isset($_POST['tan'])) $calculadora->tangente();
				if(isset($_POST['raiz'])) $calculadora->raiz();
                if(isset($_POST['Exp'])) $calculadora->mostrarDigito('E');
               
				if(isset($_POST['arcsin'])) $calculadora->aseno();
                if(isset($_POST['arccos'])) $calculadora->acoseno();
                if(isset($_POST['arctan'])) $calculadora->atangente();
				if(isset($_POST['limpiarPantalla'])) $calculadora->limpiarPantalla();
				
				if(isset($_POST['ln'])) $calculadora->ln();
                if(isset($_POST['C'])) $calculadora->borrar();
                if(isset($_POST['clean'])) $calculadora->cleanDisplayPartial();
				if(isset($_POST['div'])) $calculadora->dividir();

                if(isset($_POST['7'])) $calculadora->mostrarDigito(7);
                if(isset($_POST['8'])) $calculadora->mostrarDigito(8);
                if(isset($_POST['9'])) $calculadora->mostrarDigito(9);
                if(isset($_POST['mul'])) $calculadora->multiplicar();

                if(isset($_POST['4'])) $calculadora->mostrarDigito(4);
                if(isset($_POST['5'])) $calculadora->mostrarDigito(5);
                if(isset($_POST['6'])) $calculadora->mostrarDigito(6);
                if(isset($_POST['res'])) $calculadora->restar();

                if(isset($_POST['1'])) $calculadora->mostrarDigito(1);
                if(isset($_POST['2'])) $calculadora->mostrarDigito(2);
                if(isset($_POST['3'])) $calculadora->mostrarDigito(3);
                if(isset($_POST['sum'])) $calculadora->sumar();

				if(isset($_POST['pi'])) $calculadora->mostrarDigito('3.1415926535897');
                if(isset($_POST['0'])) $calculadora->mostrarDigito(0);
                if(isset($_POST['punto'])) $calculadora->mostrarDigito('.');
                if(isset($_POST['igual'])) $calculadora->igual();
            }


         

            echo "
                <form action='#' method='post' name='calculadora'>
                    <input type='text' id='pantalla' title='Pantalla' value='$calculadora->pantalla' disabled />
					<p>
                    <input type='submit' class='operation'name='potencia2' value='x&#178;' />
                    <input type='submit' class='operation' name='potencia10' value='10^x' />
                    <input type='submit' class='operation' name='potencia' value='x^y' />
                    <input type='submit' class='operation' name='e' value='e' />
					<input type='submit' class='operation' name='log' value='log' />
					
					</p>
					<p>
					<input type='submit' class='operation' name='sin' value='sin' />
					<input type='submit' class='operation' name='cos' value='cos' />
					<input type='submit' class='operation' name='tan' value='tan' />
					<input type='submit' class='operation' name='raiz' value='&#8730;' />
					<input type='submit' class='operation' name='Exp' value='Exp' />
					</p>
					
					<p>
					<input type='submit' class='operation' name='arcsin' value='arcsin' />
					<input type='submit' class='operation' name='arccos' value='arccos' />
					<input type='submit' class='operation' name='arctan' value='arctan' />
					<input type='submit' class='operation' name='limpiarPantalla' value='&uarr;' />

					</p>
					<p>
					<input type='submit' class='operation' name='ln' value='ln' />
					<input type='submit' class='operation' name='C' value='C' />
					<input type='submit' class='operation' name='clean' value='&larr;' />
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
					<input type='submit' class='operation' name='pi' value='&#928;' />
                    <input type='submit' class='number' name='0' value='0' />
                    <input type='submit' class='number' name='punto' value='.' />
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