<?php
session_start();
include"lib/Efware.php";
$data = new Efware();
$remove = array();
if(isset($_POST["remove"])){
	$remove = json_decode($_POST["remove"],true);
if(count($remove)>0){
for($i=0; $i<=count($remove)-1; $i++){
if(file_exists("images/".$remove[$i])){
	unlink("images/".$remove[$i]);
}	
}
}
}
$img1="";
$img2="";
$img3="";
$img4="";
$img5="";
if(isset($_FILES["file1"])){
	$img1 = strstr($_FILES["file1"]["name"],".");
	$img1 = date("Ymdhis").$img1;
	move_uploaded_file($_FILES["file1"]["tmp_name"],"images/".$img1);
}
if(isset($_FILES["file2"])){
	$img2 = strstr($_FILES["file2"]["name"],".");
	$img2 = date("Ymdhis").$img2;
	move_uploaded_file($_FILES["file2"]["tmp_name"],"images/".$img2);
}

if(isset($_FILES["file3"])){
	$img3 = strstr($_FILES["file3"]["name"],".");
	$img3 = date("Ymdhis").$img3;
	move_uploaded_file($_FILES["file3"]["tmp_name"],"images/".$img3);
}



if(isset($_FILES["file4"])){
	$img4 = strstr($_FILES["file4"]["name"],".");
	$img4 = date("Ymdhis").$img4;
	move_uploaded_file($_FILES["file4"]["tmp_name"],"images/".$img4);
}

if(isset($_FILES["file5"])){
	$img5 = strstr($_FILES["file1"]["name"],".");
	$img5 = date("Ymdhis").$img5;
	move_uploaded_file($_FILES["file5"]["tmp_name"],"images/".$img5);
}


if($_POST["id"]==""){
$saveItem["id"]=md5(json_encode(array("date"=>date("Y-m-d"),"time"=>date("h:i:s"),"sessionid"=>session_id())));
$saveItem["title"] = $_POST["title"]; 
$saveItem["desc"] = $_POST["desc"];
$saveItem["images1"] = $img1;
$saveItem["images2"] = $img2;
$saveItem["images3"] = $img3;
$saveItem["images4"] = $img4;
$saveItem["images5"] = $img5;
$data->Save($saveItem);
}else{
	$search = new SearchData();
	$search->column="id";
	$search->value=$_POST["id"];
	$rows = &$data->GetData($search);
	
	if(isset($rows)){
		if(!isset($_FILES["file1"])){
			$search  = array_search($rows["images1"],$remove);
			if((string)$search==""){
		$img1 = $rows["images1"];
			}
	}
	if(!isset($_FILES["file2"])){
			$search  = array_search($rows["images2"],$remove);
			if((string)$search==""){
		$img2 = $rows["images2"];
			}
	}
	
		if(!isset($_FILES["file3"])){
			$search  = array_search($rows["images3"],$remove);
			if((string)$search==""){
		$img3 = $rows["images3"];
			}
	}
	
		if(!isset($_FILES["file4"])){
			$search  = array_search($rows["images4"],$remove);
			if((string)$search==""){
		$img4 = $rows["images4"];
			}
	}
	
		if(!isset($_FILES["file5"])){
			$search  = array_search($rows["images5"],$remove);
			if((string)$search==""){
		$img5 = $rows["images5"];
			}
	}
	
	$rows["title"] = $_POST["title"];
$rows["desc"] = $_POST["desc"];
$rows["images1"] = $img1;
$rows["images2"] = $img2;
$rows["images3"] = $img3;
$rows["images4"] =$img4;
$rows["images5"] = $img5;
$data->Save();
	}
}
echo json_encode(array("statusCode"=>200,"Message"=>$img1));
?>