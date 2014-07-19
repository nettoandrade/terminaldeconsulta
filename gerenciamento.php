<?
require_once "dbSelect.php";
extract($_GET);

if (isset($_GET['codbar'])) {
	$consulta = buscaPrecoCodBar($codbar);
}

if (isset($_GET['produto'])) {
	$consulta = buscaPrecoProd($produto);
}

if (isset($_GET['cod'])) {
	$consulta = buscaPrecoCod($cod);
}

if (isset($_GET['fab'])) {
	$consulta = buscaPrecoFab($fab);
}

foreach ($consulta as $key => $value) {
	$consulta[$key]['B1_DESC'] = $consulta[$key][2] = utf8_encode($value[2]);	
}

header('Content-type: application/json');
echo json_encode($consulta);
?>
