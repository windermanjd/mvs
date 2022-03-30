<?php
include"lib/Efware.php";
$item = new Efware();
$getdata = $item->GetData();
$source = array();
foreach($getdata as $value){
$temp["title"] = $value["title"];	
$temp["desc"] = $value["desc"];
$temp["id"] = $value["id"];
$temp["images1"] = array();
$temp["images1"]["isremove"] = false;
$temp["images1"]["status"] = false;
$temp["images1"]["value"] = "";
if($value["images1"]!=""){
$temp["images1"]["status"] = true;	
$temp["images1"]["value"] = $value["images1"];
}

$temp["images2"] = array();
$temp["images2"]["isremove"] = false;
$temp["images2"]["status"] = false;
$temp["images2"]["value"]="";
if($value["images2"]!=""){
$temp["images2"]["status"] = true;	
$temp["images2"]["value"] = $value["images2"];
}

$temp["images3"] = array();
$temp["images3"]["isremove"] = false;
$temp["images3"]["status"] = false;
$temp["images3"]["value"]="";
if($value["images3"]!=""){
$temp["images3"]["status"] = true;	
$temp["images3"]["value"] = $value["images3"];
}

$temp["images4"] = array();
$temp["images4"]["isremove"] = false;
$temp["images4"]["status"] = false;
$temp["images4"]["value"]="";
if($value["images4"]!=""){
$temp["images4"]["status"] = true;	
$temp["images4"]["value"] = $value["images4"];
}

$temp["images5"] = array();
$temp["images5"]["isremove"] = false;
$temp["images5"]["status"] = false;
$temp["images5"]["value"]="";
if($value["images5"]!=""){
$temp["images5"]["status"] = true;	
$temp["images5"]["value"] = $value["images5"];
}
array_push($source,$temp);	
}
echo json_encode(array("statusCode"=>200,"Data"=>$source));
?>