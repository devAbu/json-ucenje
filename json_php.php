<?php
	/*$object = new \stdClass();
	$object->name = "abu";
	$object->age = 30;
	$object->city = "Sarjevo";

	$JSON = json_encode($object);
	echo $JSON;
	echo "<br>";
	$object2 = new \stdClass();
	$object2 = array("abu", "juhu", "huju");
	
	$JSON2 = json_encode($object2);
	echo $JSON2;
	*/
	//uzimianje podataka iz baze
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'json');

    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('could not connect'. mysqli_connect_error());
	
	header("Content-Type: application/json");
	$object = json_decode($_POST["x"], false);
	$result = $dbc->query("SELECT name FROM ".$object->table." LIMIT ".$object->limit);
	$outp = array();
	$outp = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($outp);

	//$query = "INSERT INTO customer (name,surname,city) VALUES ('test','test','test')";
	//$result = mysqli_query($dbc, $query);

?>