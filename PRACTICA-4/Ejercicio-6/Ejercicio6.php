<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio6</title>
    <link rel="stylesheet" href="Ejercicio6.css" />
</head>
<body>
    <header>
        <h1>Ejercicio6</h1>

    </header>
    <?php
     session_name("ioeqtp");
     session_start();
        class BaseDatos{
            public $bd;
            public $bdName;
            public $serverName;
            public $usuario;
            public $contraseña;
            public $creada;
            public $creada2;
            public $nombre;
            public $dni;
            public $apellidos;
            public $email;
            public $telefono;
            public $edad;
            public $sexo;
            public $nivel;
            public $tiempo;
            public $correcto;
            public $comentarios;
            public $propuestas;
            public $valoracion;
            
            public $buscarDni;

            public $dniM;
            public $nombreM;
            public $apellidosM;
            public $emailM;
            public $telefonoM;
            public $edadM;
            public $sexoM;
            public $nivelM;
            public $tiempoM;
            public $correctoM;
            public $comentariosM;
            public $propuestasM;
            public $valoracionM;

            public $dniEliminar;






            public function __construct(){
                $this->serverName="localhost";
                $this->usuario="DBUSER2020";
                $this->contraseña = "DBPSWD2020";
                $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña);
                $this->bdName="BD";
                $this->creada = '0';
                $this->creada2='0';
                $this->dni="";
                $this->apellidos="";
                $this->email="";
                $this->telefono="";
                $this->edad="";
                $this->sexo="";
                $this->nivel="";
                $this->tiempo="";
                $this->correcto="";
                $this->comentarios="";
                $this->propuestas="";
                $this->valoracion="";
                $this->buscarDni="";
                $this->nombre="";

                $this->dniM="";
                $this->apellidosM="";
                $this->emailM="";
                $this->telefonoM="";
                $this->edadM="";
                $this->sexoM="";
                $this->nivelM="";
                $this->tiempoM="";
                $this->correctoM="";
                $this->comentariosM="";
                $this->propuestasM="";
                $this->valoracionM="";
                $this->buscarDniM="";

                $this->dniEliminar="";
            }

            public function creacionBD(){
                $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña);
                
                if($this->bd->connect_error){
                    echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                }
                else{
                    echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                    
                }

                
                $cadenaSQL = "CREATE DATABASE IF NOT EXISTS BD COLLATE utf8_spanish_ci";
                if($this->bd->query($cadenaSQL) === TRUE){
                    echo "<p>Base de datos 'BD' creada con éxito</p>";
                    $this->creada = "1";
                } else { 
                    echo '<p>ERROR en la creación de la Base de Datos BD Error: ' . $this->bd->error . '</p>';
                    exit();
                }   
                $this->bd->close();
            }
            public function creacionTabla(){
                if($this->creada ==='1'){
                    $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                    $crearTabla = "CREATE TABLE IF NOT EXISTS PruebasUsabilidad (
                        dni VARCHAR(9) NOT NULL,
                        nombre VARCHAR(300) NOT NULL,
                        apellidos VARCHAR(300) NOT NULL,
                        email VARCHAR(300) NOT NULL,
                        telefono VARCHAR(13) NOT NULL,
                        edad INT NOT NULL,
                        sexo VARCHAR(1) NOT NULL,
                        nivel INT NOT NULL,
                        tiempo DOUBLE NOT NULL,
                        correcto VARCHAR(2) NOT NULL,
                        comentarios VARCHAR(300) NOT NULL,
                        propuestas VARCHAR(300) NOT NULL,
                        valoracion INT NOT NULL,
                        PRIMARY KEY (dni),
                        CHECK (nivel>=0 && nivel<=10), CHECK (valoracion>=0 && valoracion<=10))";
                    if($this->bd->query($crearTabla)===TRUE){
                        echo "<p>Tabla 'PruebasUsabilidad' creada con exito </p>";
                        $this->creada2='1';
                    }
                    else{
                        echo "<p>Error en la creacion de la tabla PruebasUsabilidad. Error: " . $this->bd->error . "</p>";
                        exit();
                    }

                    $this->bd->close();
            }
            else{
                echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
            }

            }

            public function insertarDatosEnTabla(){
                if($this->creada =="1"){
                    if($this->creada2 =="1"){
                        
                        
                        if ($_POST['textDNI']=="" || $_POST['textNombre']=="" || $_POST['textApellidos']=="" || $_POST['textEmail']=="" || $_POST['textTelefono']=="" || $_POST['textEdad']=="" || $_POST['textSexo']=="" || $_POST['textNivel']=="" || $_POST['textTiempo']=="" || $_POST['textTarea']=="" || $_POST['textValoracion']=="") {
                            echo "<p>Algun campo obligatorio (*) está sin rellenar</p>";
                            return;
                        }
                        if(strcasecmp($_POST['textSexo'],"m")!=0 && strcasecmp($_POST['textSexo'],"h")!=0 && strcasecmp($_POST['textSexo'],"M")!=0 && strcasecmp($_POST['textSexo'],"H")!=0){
                            echo "<p> El sexo introducido tiene que ser H o M. Por favor vuelva a introducir los datos </p>";
                            return;
                        }
                        if (strcasecmp($_POST['textTarea'],"sí")!=0 && strcasecmp($_POST['textTarea'],"si")!=0 && strcasecmp($_POST['textTarea'],"no")!=0) {
                            echo "<p>Si has realizado correctamente la tarea escriba sí. En caso contrario escriba no</p>";
                            return;
                        }
                        if($_POST['textNivel']=="0" || $_POST['textNivel']=='1' || $_POST['textNivel']=='2' || $_POST['textNivel']=='3' || $_POST['textNivel']=='4' || $_POST['textNivel']=='5' || $_POST['textNivel']=='6' || $_POST['textNivel']=='7' || $_POST['textNivel']=='8' || $_POST['textNivel']=='9' || $_POST['textNivel']=='10'){
                           
                        }else{
                             echo $_POST['textNivel'];
                            echo "<p> El nivel introducido tiene que estar entre 0 y 10. Por favor vuelva a introducir los datos </p>";
                            return;
                        }
                        if($_POST['textValoracion']=='0' || $_POST['textValoracion']=='1' || $_POST['textValoracion']=='2' || $_POST['textValoracion']=='3' || $_POST['textValoracion']=='4' || $_POST['textValoracion']=='5' || $_POST['textValoracion']=='6' || $_POST['textValoracion']=='7' || $_POST['textValoracion']=='8' || $_POST['textValoracion']=='9' || $_POST['textValoracion']=='10' ){
                        }
                        else{  
                            echo "<p> La valoración introducida tiene que entar entre 0 y 10. Por favor vuelva a introducir los datos </p>";
                            return;
                        }
                        if(is_numeric($_POST['textTiempo'])==false){
                            echo "<p>El tiempo debe ser un número. Introduzcalo de nuevo</p>";
                            return;
                        }
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);

                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                        try{

                            $consultaPre=$this->bd->prepare("INSERT INTO PruebasUsabilidad (dni,nombre,apellidos,email,telefono,edad,sexo,nivel,tiempo,correcto,comentarios,propuestas,valoracion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                            $consultaPre->bind_param(
                            'sssssisidsssi', 
                            $_POST['textDNI'],$_POST['textNombre'],$_POST['textApellidos'],$_POST['textEmail'],$_POST['textTelefono'],$_POST['textEdad'],$_POST['textSexo'],$_POST['textNivel'],$_POST['textTiempo'],$_POST['textTarea'], $_POST['textComentarios'],$_POST['textPropuestas'],$_POST['textValoracion']
                            );  
                            $consultaPre->execute();
                            if ($consultaPre->affected_rows == -1){
                                echo "<p>No se han podido insertar los datos</p>";
                            }
                            else{ 
                                echo "<p>Los datos se han insertado correctamente</p>";
                            }
                            $consultaPre->close();
                        } catch (Error $error) {
                            echo "<p>ERROR: " . $error->getMessage() . "</p>";
                        }
                        $this->bd->close(); 
                    }
                    else{
                        echo "<p>¡Crea primero la tabla!</p>";
                    }
                }
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }
            }

            public function buscarEnTabla(){
                if($this->creada ==='1'){
                    if($this->creada2 =="1"){
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                        try{
                            $consultaPre = $this->bd->prepare("SELECT * FROM PruebasUsabilidad WHERE dni=?");   
                            $consultaPre->bind_param('s', $_POST['textBuscarDNI']);   	
                            $consultaPre->execute();
                            $res = $consultaPre->get_result();
                                if ($res->fetch_assoc()!=NULL) {
                                    echo "<p>Coincidencias con la tabla 'PruebasUsabilidad':</p>";
                                    $res->data_seek(0);
                                    $fila = $res->fetch_assoc();
                                    echo "<p>DNI = " . $fila['dni'] . "</p>";
                                    echo "<p>nombre = " . $fila['nombre'] . "</p>";
                                    echo "<p>apellidos = " . $fila['apellidos'] . "</p>";
                                    echo "<p>email = ". $fila['email'] . "</p>";
                                    echo "<p>telefono = ". $fila['telefono'] . "</p>";
                                    echo "<p>edad = ". $fila['edad'] . "</p>";
                                    echo "<p>sexo = ". $fila['sexo'] . "</p>";
                                    echo "<p>nivel = ". $fila['nivel'] . "</p>";
                                    echo "<p>tiempo = ". $fila['tiempo'] . "</p>";
                                    echo "<p>correcto = ". $fila['correcto'] . "</p>";
                                    echo "<p>comentarios = ". $fila['comentarios'] . "</p>";
                                    echo "<p>propuestas = ". $fila['propuestas'] . "</p>";
                                    echo "<p>valoración = ". $fila['valoracion'] . "</p>";       
                                } else {
                                    echo "<p>No hay resultados</p>";
                                }
                                $consultaPre->close();
                        } catch (Error $error) {
                            echo "<p>Error: " . $error->getMessage() . "</p>";
                        }
                            
                        $this->bd->close();
                    }
                    else{
                        echo "<p>¡Crea primero la tabla!</p>";
                    }
                    
                }
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }

            }


            public function modificarTabla() {
                if($this->creada ==='1'){
                    if($this->creada2 =="1"){
                        if(strcasecmp($_POST['textModificarSexo'],"m")!=0 && strcasecmp($_POST['textModificarSexo'],"h")!=0 && strcasecmp($_POST['textModificarSexo'],"M")!=0 && strcasecmp($_POST['textModificarSexo'],"H")!=0){
                            echo "<p> El sexo introducido tiene que ser H o M. Por favor vuelva a introducir los datos </p>";
                            return;
                        }
                        if ($_POST['textModificarTarea'] != "" && strcasecmp($_POST['textModificarTarea'],"sí")!=0 && strcasecmp($_POST['textModificarTarea'],"si")!=0 && strcasecmp($_POST['textModificarTarea'],"no")!=0) {
                            echo "<p>Si has realizado correctamente la tarea escriba sí. En caso contrario escriba no</p>";
                            return;
                        }
                        if($_POST['textModificarNivel']=="0" || $_POST['textModificarNivel']=='1' || $_POST['textModificarNivel']=='2' || $_POST['textModificarNivel']=='3' || $_POST['textModificarNivel']=='4' || $_POST['textModificarNivel']=='5' || $_POST['textModificarNivel']=='6' || $_POST['textModificarNivel']=='7' || $_POST['textModificarNivel']=='8' || $_POST['textModificarNivel']=='9' || $_POST['textModificarNivel']=='10'){
                           
                        }else{
                            
                            echo "<p> El nivel introducido tiene que estar entre 0 y 10. Por favor vuelva a introducir los datos </p>";
                            return;
                        }
                        if($_POST['textModificarValoracion']=='0' || $_POST['textModificarValoracion']=='1' || $_POST['textModificarValoracion']=='2' || $_POST['textModificarValoracion']=='3' || $_POST['textModificarValoracion']=='4' || $_POST['textModificarValoracion']=='5' || $_POST['textModificarValoracion']=='6' || $_POST['textModificarValoracion']=='7' || $_POST['textModificarValoracion']=='8' || $_POST['textModificarValoracion']=='9' || $_POST['textModificarValoracion']=='10' ){
                        }
                        else{  
                            echo "<p> La valoración introducida tiene que entar entre 0 y 10. Por favor vuelva a introducir los datos </p>";
                            return;
                        }
                        if(is_numeric($_POST['textModificarTiempo'])==false){
                            echo "<p>El tiempo debe ser un número. Introduzcalo de nuevo</p>";
                            return;
                        }
                        
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                        try {
                            $consultaPre = $this->bd->prepare("SELECT * FROM PruebasUsabilidad WHERE dni=?");   
                            $consultaPre->bind_param('s', $_POST['textModificarDNI']);   	
                            $consultaPre->execute();
                            $res = $consultaPre->get_result();
                            $consultaPre->close();
                            if ($res->fetch_assoc()!=NULL) {
                                $res->data_seek(0);
                                $fila = $res->fetch_assoc();
                                $dni = $fila['dni'];
                                if ($_POST['textModificarNombre']=="") { 
                                    $nombre = $fila['nombre']; 
                                }
                                else { 
                                    $nombre = $_POST['textModificarNombre']; 
                                }
                                if ($_POST['textModificarApellidos']=="") { 
                                    $apellidos = $fila['apellidos']; 
                                }
                                else { 
                                    $apellidos = $_POST['textModificarApellidos']; 
                                }
                                if ($_POST['textModificarEmail']=="") {
                                    $email = $fila['email']; 
                                    }
                                else { 
                                    $email = $_POST['textModificarEmail']; 
                                }
                                if ($_POST['textModificarTelefono']=="") {
                                    $telefono = $fila['telefono']; 
                                }
                                else {
                                    $telefono = $_POST['textModificarTelefono']; 
                                }
                                if ($_POST['textModificarEdad']=="") {
                                    $edad = $fila['edad']; 
                                }
                                else {
                                    $edad = $_POST['textModificarEdad']; 
                                }
                                if ($_POST['textModificarSexo']=="") {
                                    $sexo = $fila['sexo']; 
                                }
                                else { 
                                    $sexo = $_POST['textModificarSexo']; 
                                }
                                if ($_POST['textModificarNivel']=="") {
                                    $nivel = $fila['nivel']; 
                                }
                                else { 
                                    $nivel = $_POST['textModificarNivel']; 
                                }
                                if ($_POST['textModificarTiempo']=="") {
                                    $tiempo = $fila['tiempo']; 
                                }
                                else {
                                    $tiempo = $_POST['textModificarTiempo']; 
                                }
                                if ($_POST['textModificarTarea']=="") {
                                    $correcto = $fila['correcto']; 
                                }
                                else { 
                                    $correcto = $_POST['textModificarTarea']; 
                                }
                                if ($_POST['textModificarComentarios']=="") {
                                    $comentarios = $fila['comentarios']; 
                                }
                                else {
                                    $comentarios = $_POST['textModificarComentarios']; 
                                }
                                if ($_POST['textModificarPropuestas']=="") {
                                    $propuestas = $fila['propuestas']; 
                                }
                                else {
                                    $propuestas = $_POST['textModificarPropuestas']; 
                                }
                                if ($_POST['textModificarValoracion']=="") {
                                    $valoracion = $fila['valoracion']; 
                                }
                                else {
                                    $valoracion = $_POST['textModificarValoracion']; 
                                }
                            
                            
                                $consultaPre = $this->bd->prepare("UPDATE PruebasUsabilidad SET nombre = ?, apellidos = ?, email = ?, telefono = ?, edad = ?, sexo = ?, nivel = ?, tiempo = ?, correcto = ?, comentarios = ?, propuestas = ?, valoracion = ? 
                                WHERE dni=?");
                                
                                $consultaPre->bind_param('ssssisidsssis', $nombre,$apellidos,$email,$telefono,$edad,$sexo,$nivel,$tiempo, $correcto,$comentarios,$propuestas,$valoracion, $dni
                                );  
                                
                                $consultaPre->execute();
                                if ($consultaPre->affected_rows == -1){
                                    echo "<p>Los datos no se han podido modificar</p>";
                                }
                                else{
                                    echo "<p>Los datos se han modificado correctamente</p>";
                                }
                            } else {
                                echo "<p>El usuario no se ha encontrado</p>";
                            }
                            $consultaPre->close();
                        } catch (Error $error) {
                            echo "<p>Error: " . $error->getMessage() . "</p>";
                        }

                        $this->bd->close();
                    }
                    else{
                        echo "<p>¡Crea primero la tabla!</p>";
                    }
                }
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }

            }
            public function eliminarTabla() {
                if($this->creada ==='1'){
                    if($this->creada2 ==='1'){
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                        try {
                            $consultaPre = $this->bd->prepare("SELECT * FROM PruebasUsabilidad WHERE dni=?");   
                            $consultaPre->bind_param('s', $_POST['textDNIEliminar']);   	
                            $consultaPre->execute();
                            $res = $consultaPre->get_result();
                            $consultaPre->close();
                            if ($res->fetch_assoc()!=NULL) {
                                echo "<p>Se eliminará:</p>";
                                $res->data_seek(0);
                                $fila = $res->fetch_assoc();
                                echo "<p>DNI = " . $fila['dni'] . "</p>";
                                echo "<p>nombre = " . $fila['nombre'] . "</p>";
                                echo "<p>apellidos = " . $fila['apellidos'] . "</p>";
                                echo "<p>email = ". $fila['email'] . "</p>";
                                echo "<p>telefono = ". $fila['telefono'] . "</p>";
                                echo "<p>edad = ". $fila['edad'] . "</p>";
                                echo "<p>sexo = ". $fila['sexo'] . "</p>";
                                echo "<p>nivel = ". $fila['nivel'] . "</p>";
                                echo "<p>tiempo = ". $fila['tiempo'] . "</p>";
                                echo "<p>correcto = ". $fila['correcto'] . "</p>";
                                echo "<p>comentarios = ". $fila['comentarios'] . "</p>";
                                echo "<p>propuestas = ". $fila['propuestas'] . "</p>";
                                echo "<p>valoración = ". $fila['valoracion'] . "</p>";

                                $consultaPre = $this->bd->prepare("DELETE FROM PruebasUsabilidad WHERE dni=?");   
                                $consultaPre->bind_param('s', $_POST['textDNIEliminar']);   	
                                $consultaPre->execute();
                                $consultaPre->close();
                                
                                echo "<p>Se han borrado los datos correctamente</p>";
                            } else { echo "<p>No se han encontrado resultados</p>"; }
                        } catch (Error $error) {
                            echo "<p>Error: " . $error->getMessage() . "</p>";
                        }
                        $this->bd->close();
                    }
                    else{
                        echo "<p>¡Crea primero la tabla!</p>";
                    }
                }
            
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }
            }
            public function generarInforme() {
                if($this->creada ==='1'){
                    if($this->creada2 ==='1'){
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                            $consultaPre = $this->bd->prepare("SELECT * FROM PruebasUsabilidad");   
                            $consultaPre->execute();
                        try {	
                            $res = $consultaPre->get_result();
                            if ($res->fetch_assoc()!=NULL) {
                                echo "<p>Informe:</p>";
                                $res->data_seek(0);
                                $muestras = 0;
                                $media = 0;
                                $hombres = 0;
                                $mujeres = 0;
                                $pericia = 0;
                                $tiempo = 0;
                                $correcto = 0;
                                $puntuacion = 0;
                                while($fila = $res->fetch_assoc()) {
                                    $muestras++;
                                    $media += $fila["edad"];
                                    if (strcasecmp($fila["sexo"],"h") == 0) $hombres++;
                                    if (strcasecmp($fila["sexo"],"m") == 0) $mujeres++;
                                    $pericia += $fila["nivel"];
                                    $tiempo += $fila["tiempo"];
                                    if ($fila["correcto"] == "sí" || $fila["correcto"] == "si") $correcto++;
                                    $puntuacion += $fila["valoracion"];
                                }
                                echo "<p>Edad media de los usuarios = " . $media/$muestras . "</p>";
                                echo "<p>Frecuencia del % de cada tipo de sexo entre los usuarios<p>";
                                echo "<p>Hombres:" . $hombres/$muestras*100 . "%   Mujeres:" . $mujeres/$muestras*100 . "%</p>";
                                echo "<p>Valor medio del nivel o pericia informática de los usuarios = " . $pericia/$muestras . "</p>";
                                echo "<p>Tiempo medio para la tarea = ". $tiempo/$muestras . " segundos</p>";
                                echo "<p>Porcentaje de usuarios que han realizado la tarea correctamente = ". $correcto/$muestras*100 . "%</p>";
                                echo "<p>Valor medio de la puntuación de los usuarios sobre la aplicación = ". $puntuacion/$muestras . "</p>"; 
                            } else {echo "<p>No hay datos en la tabla</p>";}
                            $consultaPre->close();
                        } catch (Error $error) {
                            echo "<p>Error: " . $error->getMessage() . "</p>";
                        }
                        $this->bd->close();
                    }
                    else{
                        echo "<p>¡Crea primero la tabla!</p>";
                    }
                }
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }
            }

            public function cargarDatos() {
                if($this->creada ==='1'){
                    if($this->creada2 ==='1'){
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                        try {
                            $archivo = fopen("pruebasUsabilidad.csv","r"); 
                            while(($datos=fgetcsv($archivo, 1000, ";")) !== FALSE) {						
                                $consultaPre = $this->bd->prepare("INSERT INTO PruebasUsabilidad (dni,nombre,apellidos,email,telefono,edad,sexo,nivel,tiempo,correcto,comentarios,propuestas,valoracion) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                $consultaPre->bind_param('sssssisidsssi', 
                                $datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11],$datos[12]
                                );
                                $consultaPre->execute();
                                $consultaPre->close();
                            }
                            fclose($archivo);
                            echo "<p>Los datos se han importado correctamente</p>";
                        } catch (Error $error) {
                            echo "<p>Error: " . $error->getMessage() . "</p>";
                        }
                        $this->bd->close();
                }
                else{
                    echo "<p>¡Crea primero la tabla!</p>";
                }
                }
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }
            }

            public function exportarDatos() {
                if($this->creada ==='1'){
                    if($this->creada ==='1'){
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                        $consultaPre = $this->bd->prepare("SELECT * FROM PruebasUsabilidad");    	
                        $consultaPre->execute();
                        $res = $consultaPre->get_result();
                        $consultaPre->close();
                        $this->bd->close();
                        
                        try {
                            $archivo = fopen("datosUsabilidad.csv","w"); 
                            $campos = array('DNI', 'Nombre', 'Apellidos', 'Email', 'Telefono', 'Edad', 'Sexo', 'Nivel', 'Tiempo', 'Correcto', 'Comentarios', 'Propuestas', 'Valoracion');
                            fputcsv($archivo, $campos, ";");
                            if ($res->fetch_assoc()!=NULL) {
                                $res->data_seek(0);
                                while($fila = $res->fetch_assoc()) {
                                    $fila = array($fila['dni'],$fila['nombre'],$fila['apellidos'],$fila['email'],$fila['telefono'], 
                                        $fila['edad'],$fila['sexo'],$fila['nivel'],$fila['tiempo'],$fila['correcto'], 
                                        $fila['comentarios'],$fila['propuestas'],$fila['valoracion']);
                                    fputcsv($archivo, $fila, ";");
                                }
                            }
                            fclose($archivo);
                            echo "<p>Los datos se han exportado correctamente.</p>";
                        } catch (Error $error) {
                            echo "<p>Eror: " . $error->getMessage() . "</p>";
                        }
                    }
                    else{
                        echo "<p>¡Crea primero la tabla!</p>";
                    }

                }
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }

            }
        }










             
            $baseDatos= new BaseDatos();
            
            if (isset($_SESSION['baseDatos'])) {
                $baseDatos=$_SESSION['baseDatos'];
            }
            else{
                $_SESSION['baseDatos']=$baseDatos;
            }


            if (count($_POST)>0) {
                if(isset($_POST['btnCrearBD'])){
                    $baseDatos->creacionBD();
                }
                if(isset($_POST['btnCrearTabla'])){
                    $baseDatos->creacionTabla();
                }
                if(isset($_POST['btnInsertarDatos'])){
                    $baseDatos->insertarDatosEnTabla();
                }
                if(isset($_POST['btnBuscarDatos'])){
                    $baseDatos->buscarEnTabla();
                }
                if(isset($_POST['btnModificarDatos'])){
                    $baseDatos->modificarTabla();
                }
                if(isset($_POST['btnEliminar'])){
                    $baseDatos->eliminarTabla();
                }
                if(isset($_POST['btnGenerarInforme'])){
                    $baseDatos->generarInforme();
                }
                if(isset($_POST['btnCargarDatos'])){
                    $baseDatos->cargarDatos();
                }
                if(isset($_POST['btnExportarDatos'])){
                    $baseDatos->exportarDatos();
                }
            }

            echo "
                    

                    <nav class='menu'>
                        <div class='topnav'>
                            <a href='#ancla-1'>Crear BD</a>
                            <a href='#ancla-2'>Crear tabla</a>
                            <a href='#ancla-3'>Insertar datos</a>
                            <a href='#ancla-4'>Buscar datos</a>
                            <a href='#ancla-5'>Modificar datos</a>
                            <a href='#ancla-6'>Eliminar datos</a>
                            <a href='#ancla-7'>Generar informe</a>
                            <a href='#ancla-8'>Cargar datos desde archivo</a>
                            <a href='#ancla-9'>Exportar datos a archivo</a>
                        </div>
                    </nav>
                    <p></p>


                    <form action='#' method='post' name='baseDatos'>
                    <a id='ancla-1'></a>
                    <section>
                    <p>Esto es lo primero que debes hacer</p>
                    <h2>Crear BD</h2>
                    <input type='submit' id='crearBD' name='btnCrearBD' value='Crear BD' />
                   
                    </section>

                    <a id='ancla-2'></a>
                    <section>
                    <p>Acuerdate también de hacer esto</p>
                    <h2>Crear tabla</h2>
                    <input type='submit' id='crearTabla' name='btnCrearTabla' value='Crear tabla PruebasUsabilidad' />
                    </section>

                    <a id='ancla-3'></a>
                    <section>
                    <h2>Insertar datos en la tabla</h2>

                    <label for='textDNI'>DNI *:</label>
                    <input type='text' id='textDNI' name='textDNI' placeholder='Introduce DNI...' />
                    <p></p>

                    <label for='textNombre'>Nombre *: </label>
                    <input type='text' id='textNombre' name='textNombre' placeholder='Introduce nombre...' value= '$baseDatos->nombre'/>
                    <p></p>

                    <label for='textApellidos'>Apellidos *: </label>
                    <input type='text' id='textApellidos' name='textApellidos' placeholder='Introduce apellidos...' value= '$baseDatos->apellidos'/>
                    <p></p>

                    <label for='textEmail'>E-mail *: </label>
                    <input type='text' id='textEmail' name='textEmail' placeholder='Introduce e-mail...' value= '$baseDatos->email'/>
                    <p></p>

                    <label for='textTelefono'>Teléfono *: </label>
                    <input type='text' id='textTelefono' name='textTelefono' placeholder='Introduce teléfono...' value= '$baseDatos->telefono'/>
                    <p></p>

                    <label for='textEdad'>Edad *: </label>
                    <input type='text' id='textEdad' name='textEdad' placeholder='Introduce edad...' value= '$baseDatos->edad'/>
                    <p></p>

                    <label for='textSexo'>Sexo *: </label>
                    <input type='text' id='textSexo' name='textSexo' placeholder='Introduce sexo (Hombre=H Mujer=M)' value= '$baseDatos->sexo'/>
                    <p></p>

                    <label for='textNivel'>Nivel informático *: </label>
                    <input type='text' id='textNivel' name='textNivel' placeholder='Introduce nivel ( 0 a 10)' value= '$baseDatos->nivel'/>
                    <p></p>

                    <label for='textTiempo'>Tiempo empleado *: </label>
                    <input type='text' id='textTiempo' name='textTiempo' placeholder='Introduce tiempo en segundos...' value= '$baseDatos->tiempo'/>
                    <p></p>

                    <label for='textTarea'>¿Tarea realizada correctamente? *: </label>
                    <input type='text' class='pequeño' id='textTarea' name='textTarea' placeholder='Sí o no' value= '$baseDatos->correcto'/>
                    <p></p>

                    <label for='textComentarios'>Comentarios: </label>
                    <input type='text' id='textComentarios' name='textComentarios' placeholder='Introduce comentarios...' value= '$baseDatos->comentarios'/>
                    <p></p>

                    <label for='textPropuestas'>Propuestas: </label>
                    <input type='text' id='textPropuestas' name='textPropuestas' placeholder='Introduce propuestas...' value= '$baseDatos->propuestas'/>
                    <p></p>

                    <label for='textValoracion'>Valoración aplicación *: </label>
                    <input type='text' id='textValoracion' name='textValoracion' placeholder='Introduce valoración( 0 a 10 )' value= '$baseDatos->valoracion'/>
                    <p></p>
                    <input type='submit' id='insertarDatos' name='btnInsertarDatos' value='Insertar' />
                    </section>
                


                    <a id='ancla-4'></a>
                    <section>
                    <h2>Buscar datos de tabla</h2>
                    <label for='textBuscarDNI'>Busqueda por DNI: </label>
                    <input type='text' id='textBuscarDNI' name='textBuscarDNI' placeholder='Introduce DNI...' value='$baseDatos->buscarDni'/>
                    <input type='submit' id='buscarDatos' name='btnBuscarDatos' value='Buscar' />
                    </section>

                    <a id='ancla-5'></a>
                    <section>
                    <h2>Modificar datos de tabla</h2>
                    <label for='textModificarDNI'>DNI: </label>
                    <input type='text' id='textModificarDNI' name='textModificarDNI' placeholder='Inserta DNI...' value= '$baseDatos->dniM'/>
                    <p></p>

                    <label for='textModificarNombre'>Nombre: </label>
                    <input type='text' id='textModificarNombre' name='textModificarNombre' placeholder='Inserta nuevo nombre...' value= '$baseDatos->nombreM'/>
                    <p></p>

                    <label for='textModificarApellidos'>Apellidos: </label>
                    <input type='text' id='textModificarApellidos' name='textModificarApellidos' placeholder='Inserta nuevos apellidos...' value= '$baseDatos->apellidosM'/>
                    <p></p>

                    <label for='textModificarEmail'>E-mail: </label>
                    <input type='text' id='textModificarEmail' name='textModificarEmail' placeholder='Inserta nuevo e-mail...' value= '$baseDatos->emailM'/>
                    <p></p>

                    <label for='textModificarTelefono'>Teléfono: </label>
                    <input type='text' id='textModificarTelefono' name='textModificarTelefono' placeholder='Inserta nuevo teléfono...' value= '$baseDatos->telefonoM'/>
                    <p></p>

                    <label for='textModificarEdad'>Edad: </label>
                    <input type='text' id='textModificarEdad' name='textModificarEdad' placeholder='Inserta nueva edad...' value= '$baseDatos->edadM'/>
                    <p></p>

                    <label for='textModificarSexo'>Sexo: </label>
                    <input type='text'  id='textModificarSexo' name='textModificarSexo' placeholder='Inserta (Hombre=H || Mujer=M)' value= '$baseDatos->sexoM'/>
                    <p></p>

                    <label for='textModificarNivel'>Nivel informático: </label>
                    <input type='text' id='textModificarNivel' name='textModificarNivel' placeholder='Inserta (0 a 10)' value= '$baseDatos->nivelM'/>
                    <p></p>

                    <label for='textModificarTiempo'>Tiempo empleado: </label>
                    <input type='text' id='textModificarTiempo' name='textModificarTiempo' placeholder='Inserta nuevo tiempo en segundos...' value= '$baseDatos->tiempoM'/>
                    <p></p>

                    <label for='textModificarTarea'>¿La tarea se ha realizado correctamente?: </label>
                    <input type='text' class='pequeño' id='textModificarTarea' name='textModificarTarea' placeholder='Inserta sí o no...' value= '$baseDatos->correctoM'/>
                    <p></p>

                    <label for='textModificarComentarios'>Comentarios: </label>
                    <input type='text' id='textModificarComentarios' name='textModificarComentarios' placeholder='Inserta nuevos comentarios...' value= '$baseDatos->comentariosM'/>
                    <p></p>

                    <label for='textModificarPropuestas'>Propuestas: </label>
                    <input type='text'  id='textModificarPropuestas' name='textModificarPropuestas' placeholder='Inserta nuevas propuestas...' value= '$baseDatos->propuestasM'/>
                    <p></p>

                    <label for='textModificarValoracion'>Valoración aplicación: </label>
                    <input type='text' id='textModificarValoracion' name='textModificarValoracion' placeholder='Inserta (0 a 10)...' value= '$baseDatos->valoracionM'/>
                    <p></p>

                    <input type='submit' id='modificarDatos' name='btnModificarDatos' value='Modificar' />
                    <p></p>
                    </section>

                    <a id='ancla-6'></a>
                    <section>
                    <h2>Eliminar datos de tabla</h2>
                    <p>Introducir dni a eliminar</p>
                    <label for='textDNIEliminar'>DNI: </label>
                    <input type='text' id='textDNIEliminar' name='textDNIEliminar' placeholder='Introduce DNI...' value='$baseDatos->dniEliminar'/>
                    <input type='submit' id='eliminarDatos' name='btnEliminar' value='Eliminar' />
                    </section>

                    <a id='ancla-7'></a>
                    <section>
                    <h2>Informe</h2>
                    <p>Alguna información relevante</p>
                    <input type='submit' id='generarInforme' name='btnGenerarInforme' value='Generar' />
                    </section>

                    <a id='ancla-8'></a>
                    <section>
                    <p></p>
                    <h2>Cargar datos desde archivo en la tabla</h2>
                    <p>Desde el archivo pruebasUsabilidad</p>
                    <input type='submit' id='cargarDatos' name='btnCargarDatos' value='Cargar' />
                    </section>
                    
                    <a id='ancla-9'></a>
                    <section>
                    <p></p>
                    <h2>Exportar datos de tabla a archivo</h2>
                    <p>Al archivo datosUsabilidad</p>
                    <input type='submit' id='exportarDatos' name='btnExportarDatos' value='Exportar' />
                    </section>
                    

                </form>  
            "; 
        
    
   
    ?>



    
</body>
</html>