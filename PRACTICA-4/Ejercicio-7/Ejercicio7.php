<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio7</title>
    <link rel="stylesheet" href="Ejercicio7.css" />
</head>
<body>
    <header>
        <h1>Carreras</h1>

    </header>
    <?php
     session_name("dsh");
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
                $this->bdName="BDCarreras";
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

                
                $cadenaSQL = "CREATE DATABASE IF NOT EXISTS BDCarreras COLLATE utf8_spanish_ci";
                if($this->bd->query($cadenaSQL) === TRUE){
                    echo "<p>Base de datos 'BDCarreras' creada con éxito</p>";
                    $this->creada = "1";
                } else { 
                    echo '<p>ERROR en la creación de la Base de Datos BDCarreras Error: ' . $this->bd->error . '</p>';
                    exit();
                }   
                $this->bd->close();
            }
            public function creacionTabla(){
                if($this->creada ==='1'){
                    $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                    $crearTabla = "CREATE TABLE IF NOT EXISTS Participante (
                        dni VARCHAR(9) NOT NULL,
                        nombre VARCHAR(300) NOT NULL,
                        PRIMARY KEY (dni)
                        )";
                    if($this->bd->query($crearTabla)===TRUE){
                        echo "<p>Tabla 'Participante' creada con exito </p>";
                        $this->creada2='1';
                    }
                    else{
                        echo "<p>Error en la creacion de la tabla Participante. Error: " . $this->bd->error . "</p>";
                        exit();
                    }

                    $crearTabla = "CREATE TABLE IF NOT EXISTS Inscripcion (
                        idInscripcion VARCHAR(30) NOT NULL,
                        precio DOUBLE NOT NULL,
                        
                        PRIMARY KEY (idInscripcion)
                        )";
                    if($this->bd->query($crearTabla)===TRUE){
                        echo "<p>Tabla 'Inscripcion' creada con exito </p>";
                        $this->creada2='1';
                    }
                    else{
                        echo "<p>Error en la creacion de la tabla Inscripcion. Error: " . $this->bd->error . "</p>";
                        exit();
                    }

                    $crearTabla = "CREATE TABLE IF NOT EXISTS Competicion (
                        idInscripcion VARCHAR(30) NOT NULL,
                        dni VARCHAR(9) NOT NULL,
                        FOREIGN KEY (idInscripcion) REFERENCES Inscripcion(idInscripcion),
                        FOREIGN KEY (dni) REFERENCES Participante(dni)
                        )";
                    if($this->bd->query($crearTabla)===TRUE){
                        echo "<p>Tabla 'Competicion' creada con exito </p>";
                        $this->creada2='1';
                    }
                    else{
                        echo "<p>Error en la creacion de la tabla Competicion. Error: " . $this->bd->error . "</p>";
                        exit();
                    }
                    
                    $this->bd->close();
                }
                else{
                    echo "<p>¡PRIMERO HAY QUE CREAR LA BASE DE DATOS!</p>";
                }

            }

            public function insertarParticipante(){
                if($this->creada =="1"){
                    if($this->creada2 =="1"){
                        if ($_POST['dni']=="" || $_POST['nombre']=="") {
                            echo "<p>Algun campo obligatorio (*) está sin rellenar</p>";
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
                            $dni = $_POST["dni"];
                            $nombre = $_POST["nombre"];

                            $insert = $this->bd->prepare("INSERT INTO Participante (dni,nombre) VALUES (?,?)");
                           
                            $insert->bind_param(
                            'ss', $dni,$nombre);  
                            $insert->execute();
                            
                            $insert->close();
                            echo "<p>Participante insertado <p>";
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
            
            
            public function insertarInscripcion(){
                if($this->creada =="1"){
                    if($this->creada2 =="1"){
                        if ($_POST['id']=="" || $_POST['precio']=="") {
                            echo "<p>Algun campo obligatorio (*) está sin rellenar</p>";
                            return;
                        }
                        if(is_numeric($_POST['precio'])==false){
                            echo "<p>El precio es incorrecto</p>";
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
                            $id = $_POST["id"];
                            $precio = $_POST["precio"];
                            
                            $insert = $this->bd->prepare("INSERT INTO Inscripcion (idInscripcion,precio) VALUES (?,?)");
                           
                            $insert->bind_param(
                            'ss', $id,$precio);  
                            $insert->execute();
                            
                            $insert->close();
                            echo "<p>Inscripcion insertada <p>";
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
            public function insertarCompeticion(){
                if($this->creada =="1"){
                    if($this->creada2 =="1"){
                        if ($_POST['dniP']=="" || $_POST['idI']=="") {
                            echo "<p>Algun campo obligatorio (*) está sin rellenar</p>";
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
                            $dni = $_POST["dniP"];
                            $id = $_POST["idI"];
                            
                            $consultaPre=$this->bd->prepare("SELECT * FROM Inscripcion where idInscripcion = ?");
                            $consultaPre2=$this->bd->prepare("SELECT * FROM Participante where dni = ?");
                    
                            $consultaPre->bind_param('s',$id);
                            $consultaPre->execute();
                            $res1=$consultaPre->get_result();

                            $consultaPre2->bind_param('s',$dni);
                            $consultaPre2->execute();
                            $res2=$consultaPre2->get_result();
                            
                            if($res1->fetch_assoc()!=NULL && $res2->fetch_assoc()!=NULL){
                                
                                $insert = $this->bd->prepare("INSERT INTO Competicion (idInscripcion,dni) VALUES (?,?)");
                            
                                $insert->bind_param(
                                'ss', $id,$dni);  
                                $insert->execute();
                                
                                $insert->close();
                                echo "<p>Competicion insertada <p>";
                            }
                            else{
                                echo "<p>No se puede insertar en la tabla competiciones o inscripciones no registradas <p>";
                            }
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
                            $consultaPre = $this->bd->prepare("SELECT * FROM Participante WHERE dni=?");   
                            $consultaPre->bind_param('s', $_POST['textBuscarDNI']);   	
                            $consultaPre->execute();
                            $res = $consultaPre->get_result();
                                if ($res->fetch_assoc()!=NULL) {
                                    echo "<p>Coincidencias con la tabla 'Participante':</p>";
                                    $res->data_seek(0);
                                    $fila = $res->fetch_assoc();
                                    echo "<p>DNI = " . $fila['dni'] . "</p>";
                                    echo "<p>nombre = " . $fila['nombre'] . "</p>";
                                       
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

            public function buscarEnTabla2(){
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
                            $consultaPre = $this->bd->prepare("SELECT * FROM Inscripcion WHERE idInscripcion=?");   
                            $consultaPre->bind_param('s', $_POST['textBuscarID']);   	
                            $consultaPre->execute();
                            $res = $consultaPre->get_result();
                                if ($res->fetch_assoc()!=NULL) {
                                    echo "<p>Coincidencias con la tabla 'Participante':</p>";
                                    $res->data_seek(0);
                                    $fila = $res->fetch_assoc();
                                    echo "<p>ID = " . $fila['idInscripcion'] . "</p>";
                                    echo "<p>Precio = " . $fila['precio'] . "</p>";
                                       
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

            public function generarInforme() {

                if($this->creada ==='1'){
                    if($this->creada2 =="1"){
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo '<p>Error de conexión: ' . $this->bd->connect_error . '</p>';
                        }
                        else{
                           
                        }
                        try{
                           

                            $consultaPre = $this->bd->prepare("SELECT * FROM Competicion ");      	
                            $consultaPre->execute();
                            $res = $consultaPre->get_result();
                                if ($res->fetch_assoc()!=NULL) {
                                    echo "<p>Participantes inscritos en la carrera:</p>";
                                    
                                    $res->data_seek(0);
                                    while($fila = $res->fetch_assoc()) {
                                        echo "<p>ID = " . $fila['idInscripcion'] . " DNI = " . $fila['dni'] . "</p>";
                                        echo "<p> --------------------------------</p>";
                                    }
                                       
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

            public function cargarDatos() {
                if($this->creada ==='1'){
                    if($this->creada2 ==='1'){
                        $this->bd=new mysqli($this->serverName,$this->usuario,$this->contraseña,$this->bdName);
                        if($this->bd->connect_error){
                            echo "<p>Error de conexión: " . $this->bd->connect_error . "</p>";
                        }
                        else{
                            echo '<p>Conexion establecida con ' . $this->bd->host_info . '</p>';
                        }
                        try {
                            $archivo = fopen("participantes.csv","r"); 
                            while(($datos=fgetcsv($archivo, 1000, ";")) !== FALSE) {						
                                $consultaPre = $this->bd->prepare("INSERT INTO Participante (dni,nombre) VALUES (?,?)");
                                $consultaPre->bind_param('ss', $datos[0],$datos[1] );
                                $consultaPre->execute();
                                $consultaPre->close();
                               
                            }
                            fclose($archivo);
                           
                            $archivo = fopen("inscripciones.csv","r"); 
                            while(($datos=fgetcsv($archivo, 1000, ";")) !== FALSE) {						
                                $consultaPre = $this->bd->prepare("INSERT INTO Inscripcion (idInscripcion,precio) VALUES (?,?)");
                                $consultaPre->bind_param('ss', $datos[0],$datos[1] );
                                $consultaPre->execute();
                                $consultaPre->close();
                               
                            }
                            fclose($archivo);
                            
                            $archivo = fopen("inscritos.csv","r"); 
                            while(($datos=fgetcsv($archivo, 1000, ";")) !== FALSE) {						
                                $consultaPre = $this->bd->prepare("INSERT INTO Competicion (idInscripcion,dni) VALUES (?,?)");
                                $consultaPre->bind_param('ss', $datos[0],$datos[1] );
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
                        $consultaPre = $this->bd->prepare("SELECT * FROM Competicion");    	
                        $consultaPre->execute();
                        $res = $consultaPre->get_result();
                        $consultaPre->close();
                        $this->bd->close();
                        
                        try {
                            $archivo = fopen("datosCompeticion.csv","w"); 
                            $campos = array('IDInscripcion', 'DNI');
                            fputcsv($archivo, $campos, ";");
                            if ($res->fetch_assoc()!=NULL) {
                                $res->data_seek(0);
                                while($fila = $res->fetch_assoc()) {
                                    $fila = array($fila['idInscripcion'],$fila['dni']
                                        );
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
                    $baseDatos->insertarParticipante();
                }
                if(isset($_POST['btnBuscarDatos'])){
                    $baseDatos->buscarEnTabla();
                }
                if(isset($_POST['btnInsertarInscripcion'])){
                    $baseDatos->insertarInscripcion();
                }
                if(isset($_POST['btnBuscarID'])){
                    $baseDatos->buscarEnTabla2();
                }
                if(isset($_POST['btnInsertarCompeticion'])){
                    $baseDatos->insertarCompeticion();
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
                <a href='#ancla-2'>Crear tablas</a>
                <a href='#ancla-3'>Insertar participante</a>
                <a href='#ancla-4'>Buscar participante</a>
                <a href='#ancla-5'>Insertar inscripcion</a>
                
                <a href='#ancla-6'>Buscar inscripcion</a>
                <a href='#ancla-7'>Insertar competicion</a>
                <a href='#ancla-8'>Mostrar todos los participantes inscritos en la carrera</a>
                <a href='#ancla-9'>Cargar datos desde archivo</a>
                <a href='#ancla-10'>Exportar datos a archivo</a>
            </div>
            </nav>
             <p></p>
                <form action='#' method='post' name='baseDatos'>
                    

                    <a id='ancla-1'></a>
                    <section>
                    <h2>Crear BD</h2>
                    <p>Esto es lo primero que debes hacer</p>
                    <input type='submit' id='crearBD' name='btnCrearBD' value='Crear BD' />
                    </section>

                    <a id='ancla-2'></a>
                    <section>
                    <h2>Crear tabla</h2>
                    <p>Acuerdate también de hacer esto</p>
                    <input type='submit' id='crearTabla' name='btnCrearTabla' value='Crear tablas' />
                    </section>

                    <a id='ancla-3'></a>
                    <section>
                    <h2>Insertar participante</h2>

                    <label for='dni'>DNI*:</label>
                    <input type='text' id='dni' name='dni' placeholder='Introduce DNI...' />
                    <p></p>

                    <label for='nombre'>Nombre*: </label>
                    <input type='text' id='nombre' name='nombre' placeholder='Introduce nombre...' value= '$baseDatos->nombre'/>
                    <p></p>

                    
                    <input type='submit' id='insertarDatos' name='btnInsertarDatos' value='Insertar' />
                    </section>
                    

                    
                


                    <a id='ancla-4'></a>
                    <section>
                    <h2>Buscar participante</h2>
                    <p>Por dni</p>
                    <label for='textBuscarDNI'>DNI: </label>
                    <input type='text' id='textBuscarDNI' name='textBuscarDNI' placeholder='Introduce DNI...' value='$baseDatos->buscarDni'/>
                    <input type='submit' id='buscarDatos' name='btnBuscarDatos' value='Buscar' />
                    </section>

                    <a id='ancla-5'></a>
                    <section>
                    <h2>Insertar inscripcion</h2>
                    <label for='id'>Identificador*: </label>
                    <input type='text'  id='id' name='id' placeholder='Inserta ID...' />
                    <p></p>

                    <label for='precio'>Precio*: </label>
                    <input type='text' id='precio' name='precio' placeholder='Inserta precio...'/>
                    <p></p>

                    

                    <input type='submit' id='btnInsertarInscripcion' name='btnInsertarInscripcion' value='Insertar' />
                    <p></p>
                    </section>




                    <a id='ancla-6'></a>
                    <section>
                    <h2>Buscar inscripcion</h2>
                    <p>Por id</p>
                    <label for='textBuscarID'>Identificador: </label>
                    <input type='text' id='textBuscarID' name='textBuscarID' placeholder='Introduce ID...' value='$baseDatos->dniEliminar'/>
                    <input type='submit' id='buscarID' name='btnBuscarID' value='Buscar' />
                    </section>

                    <a id='ancla-7'></a>
                    <section>
                    <h2>Crear competicion con participante e inscripcion</h2>
                    <label for='idI'>Identificador inscripcion*: </label>
                    <input type='text' id='idI' name='idI' placeholder='Inserta ID inscripcion...' />
                    <p></p>

                    <label for='dniP'>DNI*: </label>
                    <input type='text' id='dniP' name='dniP' placeholder='Inserta DNI participante...'/>
                    <p></p>
                    <input type='submit' id='btnInsertarCompeticion' name='btnInsertarCompeticion' value='Insertar' />
                    <p></p>
                    </section>


                    <a id='ancla-8'></a>
                    <section>
                    <h2>Informe</h2>
                    <p>Alguna información relevante</p>
                    <input type='submit' id='generarInforme' name='btnGenerarInforme' value='Generar' />
                    </section>

                    <a id='ancla-9'></a>
                    <section>
                    <h2>Cargar datos desde archivo en la tabla</h2>
                    <p>Desde 3 archivos diferentes</p>
                    <input type='submit' id='cargarDatos' name='btnCargarDatos' value='Cargar' />
                    </section>
                    
                    <a id='ancla-10'></a>
                    <section>
                    <h2>Exportar datos de tabla a archivo</h2>
                    <p>Al archivo datosCompeticion</p>
                    <input type='submit' id='exportarDatos' name='btnExportarDatos' value='Exportar' />
                    </section>
                    

                </form>  
            "; 
        
    
   
    ?>



    
</body>
</html>