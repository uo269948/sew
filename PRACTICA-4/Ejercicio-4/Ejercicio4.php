<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambio monedas</title>
    <link rel="stylesheet" href="Ejercicio4.css" />
</head>
<body>
    <header>
        <h1>Conversion monedas</h1>
    </header>
    <main>
        <?php
        session_name("prueba104");
          session_start();

            class Money {

                protected $moneda;
                
                protected $json;
                public $cantidad;
                public $res;


                function __construct() {
                    $url= "http://data.fixer.io/api/latest?access_key=fa286b574a77b0e1425959f3b002c865";
                  $this->cargar($url);
                  $this->cantidad="";
                  $this->res="";
                }

                function cargar($url){
                    $datos = file_get_contents($url);
                    $this->json = json_decode($datos);
                   
                    
                    
                }
                

               
                public function loadDataCAD(){
                    $valor = $this->cantidad;
                    if($this->cantidad==''){
                        
                        $this->res = "Introduce cantidad válida";  
                    }

                    else{
                        
                        $valor = floatval($this->cantidad);
                        
                        $result = floatval($this->json->rates->CAD)*$valor;
                        $this->res = $result;
                    }
                
                                                  
                }
                public function loadDataUSD(){
                    $valor = $this->cantidad;
                    if($this->cantidad==''){
                        
                        $this->res = "Introduce cantidad válida";  
                    }

                    else{
                        
                        $valor = floatval($this->cantidad);
                        
                        $result = floatval($this->json->rates->USD)*$valor;
                        $this->res = $result;
                    }
                
                                                  
                }
                public function loadDataPHP(){
                    $valor = $this->cantidad;
                    if($this->cantidad==''){
                        
                        $this->res = "Introduce cantidad válida";  
                    }

                    else{
                        
                        $valor = floatval($this->cantidad);
                        
                        $result = floatval($this->json->rates->PHP)*$valor;
                        $this->res = $result;
                    }
                
                                                  
                }
                public function loadDataSGD(){
                    $valor = $this->cantidad;
                    if($this->cantidad==''){
                        
                        $this->res = "Introduce cantidad válida";  
                    }

                    else{
                        
                        $valor = floatval($this->cantidad);
                        
                        $result = floatval($this->json->rates->SGD)*$valor;
                        $this->res = $result;
                    }
                
                                                  
                }
                public function loadDataZAR(){
                    $valor = $this->cantidad;
                    if($this->cantidad==''){
                        
                        $this->res = "Introduce cantidad válida";  
                    }

                    else{
                        
                        $valor = floatval($this->cantidad);
                        
                        $result = floatval($this->json->rates->ZAR)*$valor;
                        $this->res = $result;
                    }
                
                                                  
                }
                function mostrarDigito($digito) {
                    if($this->cantidad==''){
                        $this->cantidad = $digito;
                    }
                   
                    else{
                        $this->cantidad .= $digito;
                    }
                   

               }

              
               
                function clean() {
                    $this->cantidad="";
                    $this->res="";
               }
                

               
               

            }

            $money = new Money();

            
            if (isset($_SESSION['money'])) {
                $money=$_SESSION['money'];
            }
            else{
                $_SESSION['money']=$money;
            }

            if (count($_POST) > 0) {
                if(isset($_POST['7'])) $money->mostrarDigito('7');
                if(isset($_POST['8'])) $money->mostrarDigito('8');
                if(isset($_POST['9'])) $money->mostrarDigito('9');
               

                if(isset($_POST['4'])) $money->mostrarDigito('4');
                if(isset($_POST['5'])) $money->mostrarDigito('5');
                if(isset($_POST['6'])) $money->mostrarDigito('6');
              

                if(isset($_POST['1'])) $money->mostrarDigito('1');
                if(isset($_POST['2'])) $money->mostrarDigito('2');
                if(isset($_POST['3'])) $money->mostrarDigito('3');
                if(isset($_POST['0'])) $money->mostrarDigito('0');
                if(isset($_POST['C'])) $money->clean();
                if(isset($_POST['CAD'])) $money->loadDataCAD();
                if(isset($_POST['USD'])) $money->loadDataUSD();
                if(isset($_POST['PHP'])) $money->loadDataPHP();
                if(isset($_POST['SGD'])) $money->loadDataSGD();
                if(isset($_POST['ZAR'])) $money->loadDataZAR();
                
            }

            

            echo "
            <form action='#' method='post' name='money'>
                <label>Cantidad</label>
                <input type='text' id='cantidad' title='Pantalla' value='$money->cantidad' disabled/>
                <img id='img1' src='img1.png' alt='imagen euro'/>
               
                
                <p>
                <input type='submit' class='number' name='7' value='7' />
                <input type='submit' class='number' name='8' value='8' />
                <input type='submit' class='number' name='9' value='9' />
                </p>
                <p>
                <input type='submit' class='number' name='4' value='4' />
                <input type='submit' class='number' name='5' value='5' />
                <input type='submit' class='number' name='6' value='6' />
                </p>
                <p>
                <input type='submit' class='number' name='1' value='1' />
                <input type='submit' class='number' name='2' value='2' />
                <input type='submit' class='number' name='3' value='3' />
                </p>
                <p>
                <input type='submit' class='number' name='0' value='0' />
                <input type='submit' class='number' name='C' value='C' />
                </p>
               
                <label for='resultado'>Convertir a:</label>
                    <input type='submit' class='operation'name='CAD' value='CAD' />
                    <input type='submit' class='operation' name='USD' value='USD' />
                    <input type='submit' class='operation' name='PHP' value='PHP' />
                    <input type='submit' class='operation' name='SGD' value='SGD' />
                    <input type='submit' class='operation' name='ZAR' value='ZAR' />
                </p>
                <p>
                <input type='text' id='resultado' value='$money->res' disabled/>
                </p>
                <p></p>
                
					</form>
                
            ";
        ?>
    </main>
<footer>
    <p>Candela Bobes Junquera, UO269948  </p>    
 </footer>  
</body>
</html>