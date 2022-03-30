<?php
include"lib/Efware.php";
$db = new Efware();
$dataset = &$db->RemoveData($_GET["id"]);
echo json_encode(array("statusCode"=>200));

?>