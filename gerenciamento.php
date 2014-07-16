<?
require_once "dbSelect.php";
extract($_GET);

$consulta = buscaPreco($produto);
header('Content-type: application/json');
echo json_encode($consulta);
?>
