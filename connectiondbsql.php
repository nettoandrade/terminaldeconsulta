<?
function connectionDBSQL($namedb = "MESTRE11"){
	$user = "sa";
	$password = "******";
	$db  = "dblib";
	$host = "192.168.2.1";
	$dsn = ($namedb == "MESTRE11")?"$db:host=$host;dbname=$namedb":"$db:host=$host";
	try {
		return new PDO($dsn, $user, $password);
	} catch (Exception $e) {
		echo 'Connection failed: '. $e->getMessage();
	}
}
?>
