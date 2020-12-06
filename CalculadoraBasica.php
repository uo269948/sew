<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculadora básica</title>
    <link rel="stylesheet" href="CalculadoraBasica.css" />
</head>

<body>
    <h1>Calculadora Básica</h1>
    <label for = 'expresion'>Pantalla:</label>
    
    <?php

    class CalculadoraBasica
    {

        private $expresion;
        private $memoria;
        private $mrcUltimoPulsado;
        private $error;

        public function __construct($expresion, $error, $memoria, $mrcUltimoPulsado)
        {
            $this->expresion = $expresion;
            $this->error = $error;
            $this->memoria = $memoria;
            $this->mrcUltimoPulsado = $mrcUltimoPulsado;
        }

        private function beforeClick()
        {
            if ($this->error)
                $this->expresion = "";
            $this->error = false;
            $this->mrcUltimoPulsado = false;
        }

        public function clickMplus()
        {
            $this->beforeClick();
            try {
                $this->memoria = eval("return " .$this->memoria . " + " . $this->expresion .";");
                $this->expresion = "";
            } catch (ParseError $e) {
                $this->error = true;
                $this->expresion = "Error de sintaxis";
            }
        }

        public function clickMminus()
        {
            $this->beforeClick();
            try {
                $this->memoria = eval("return " .$this->memoria . " - " . $this->expresion .";");
                $this->expresion = "";
            } catch (ParseError $e) {
                $this->error = true;
                $this->expresion = "Error de sintaxis";
            }
        }

        public function clickMrc()
        {
            if ($this->mrcUltimoPulsado)
                $this->memoria = 0;
            $this->beforeClick();
            $this->mrcUltimoPulsado = true;
            $this->expresion = "" . $this->memoria;
        }

        public function clickNum($n)
        {
            $this->beforeClick();
            $this->expresion = $this->expresion . $n;
        }

        public function clickOperator($op)
        {
            $this->beforeClick();
            $this->expresion = $this->expresion . $op;
        }

        public function clickEqual()
        {
            $this->beforeClick();
            $this->expresion = "" . $this->evaluarExpresion();
        }

        public function clickDot()
        {
            $this->beforeClick();
            $this->expresion = $this->expresion . ".";
        }

        public function clickClear()
        {
            $this->beforeClick();
            $this->expresion = "";
        }

        private function evaluarExpresion()
        {
            try {
                return eval("return " .$this->expresion .";");
            } catch (ParseError  $e) {
                $this->error = true;
                return "Error de sintaxis";
            }
        }

        public function getExpresion()
        {
            return $this->expresion;
        }

        public function getError()
        {
            return $this->error;
        }

        public function getMemoria()
        {
            return $this->memoria;
        }

        public function getMrcUltimoPulsado()
        {
            return $this->mrcUltimoPulsado;
        }
    }

    session_start();

    if (!isset($_SESSION['expresion'])) {
        $_SESSION['expresion'] = "";
    }

    if (!isset($_SESSION['error'])) {
        $_SESSION['error'] = false;
    }

    if (!isset($_SESSION['memoria'])) {
        $_SESSION['memoria'] = 0;
    }

    if (!isset($_SESSION['mrcUltimoPulsado'])) {
        $_SESSION['mrcUltimoPulsado'] = false;
    }

    $calculadora = new CalculadoraBasica($_SESSION['expresion'], $_SESSION['error'], $_SESSION['memoria'], $_SESSION['mrcUltimoPulsado']);

    if (count($_POST) > 0) {
        for ($i = 0; $i < 10; $i++)
            if (isset($_POST['boton' . $i])) $calculadora->clickNum($i);
        if (isset($_POST['mrc'])) $calculadora->clickMrc();
        if (isset($_POST['mmas'])) $calculadora->clickMplus();
        if (isset($_POST['mmenos'])) $calculadora->clickMminus();
        if (isset($_POST['div'])) $calculadora->clickOperator('/');
        if (isset($_POST['mul'])) $calculadora->clickOperator('*');
        if (isset($_POST['menos'])) $calculadora->clickOperator('-');
        if (isset($_POST['mas'])) $calculadora->clickOperator('+');
        if (isset($_POST['dot'])) $calculadora->clickDot();
        if (isset($_POST['igual'])) $calculadora->clickEqual();
        if (isset($_POST['clear'])) $calculadora->clickClear();
        $_SESSION['expresion'] = $calculadora->getExpresion();
        $_SESSION['error'] = $calculadora->getError();
        $_SESSION['memoria'] = $calculadora->getMemoria();
        $_SESSION['mrcUltimoPulsado'] = $calculadora->getMrcUltimoPulsado();
    }

    echo "
        <p><input type='text' id='expresion' value = '" . $calculadora->getExpresion() . "'disabled/></p>"
    ?>

    <form action='#' method='post' name='botones'>
    <input type='submit' name='mrc' class='memoria' value='MRC' />
    <input type='submit' name='mmas' class='memoria' value='M+' />
    <input type='submit' name='mmenos' class='memoria' value='M-' />
        <input type='submit' name='div' class='operador' value='/' />
        <input type='submit' name='boton7' value='7' />
        <input type='submit' name='boton8' value='8' />
        <input type='submit' name='boton9' value='9' />
        <input type='submit' name='mul' class='operador' value='*' />
        <input type='submit' name='boton4' value='4' />
        <input type='submit' name='boton5' value='5' />
        <input type='submit' name='boton6' value='6' />
        <input type='submit' name='menos' class='operador' value='-' />
        <input type='submit' name='boton1' value='1' />
        <input type='submit' name='boton2' value='2' />
        <input type='submit' name='boton3' value='3' />
        <input type='submit' name='mas' class='operador' value='+' />
        <input type='submit' name='boton0' value='0' />
        <input type='submit' name='dot' value='.' />
        <input type='submit' name='clear' value='C' />
        <input type='submit' name='igual' value='=' />
    </form>
</body>

</html>