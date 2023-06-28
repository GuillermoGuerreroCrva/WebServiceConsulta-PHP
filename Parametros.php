<html>
<body>
	<h3>Ingrese Fecha y Hora:</h3>

	<form action="Parametros.php" method="post">
        <label for="fechaValor">Fecha y Hora:</label>
        <input type="text" id="fechaValor" name="fechaValor">
        <br>
        <br>
        <button type="submit">Confirmar</button>
    </form>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fechaValor = $_POST['fechaValor'];

}

echo "Fecha y Hora Ingresada: " . $fechaValor;

?>

<html>
<body>
    <p><span style="color: black;">¿Deseas consultar la sigueinte fecha?</span>.</p>
    <a href="http://187.160.239.50/WebServiceConsulta/index.php?hreal=<?php echo $fechaValor; ?>">
        <button>Aceptar</button>
        <br/>
        <br/>
    </a>
</body>
</html>


