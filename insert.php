<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$data = json_decode(file_get_contents("php://input"));
$connection = new mysqli("localhost", "root", "", "nbb");
$sql = "INSERT INTO descriptions (longitude, latitude, location)
VALUES ('$data->longi', '$data->lati', '$data->location')";
if($data->longi){
	$qry = $connection->query($sql);
}
$connection->close();

?>