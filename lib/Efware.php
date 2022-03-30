<?php
class Efware{
private $data;
function Efware(){
$this->data =array();
if(file_exists("db.json")){
$myfile = fopen("db.json", "r") or die("Unable to open file!");
$this->data =  json_decode(fread($myfile,filesize("db.json")),true);
fclose($myfile);	
}
}

function &RemoveData($id){
	$dataset = array_search($id,array_column($this->data,"id"));
	if((string)$dataset!=""){
		unset($this->data[$dataset]);	
	}
	$this->Save();
	return $this->data;
}

function &GetData($search=null){
	if($search==null){
return $this->data;	
	}else{
		$dataset = array_search($search->value,array_column($this->data,$search->column));
		if((string)$dataset!=""){
			return $this->data[$dataset];
		}
	}
}

function Save($result=null){
$myfile = fopen("db.json", "w") or die("Unable to open file!");
if(isset($result)){
array_push($this->data,$result);	
}
fwrite($myfile, json_encode($this->data));
fclose($myfile);
}

	
}
class SearchData{
public $column;
public $value;	
}
?>