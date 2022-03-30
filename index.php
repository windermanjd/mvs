<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Movie System</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	text-align: center;
}
.fw {
	color: #FFF;
	font-size: 18px;
	text-align: left;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script>
var app = angular.module("app",[]);
app.controller("movie",function($scope,$interval){
	$interval(function(){},10);
	$scope.config = {
	status:false,
	value:{
	id:"",
	title:"",
	desc:"",
	images:{
	images1:{
	value:"",
	status:false,
	isremove:false	
	},
	images2:{
	value:"",
	status:false,
	isremove:false
	},
	images3:{
	value:"",
	status:false,
	isremove:false	
	},
	images4:{
	value:"",
	status:false,
	isremove:false	
	},
	images5:{
	value:"",
	status:false,
	isremove:false	
	}
	}
	}
	}
	
	$scope.Add = function(){
			$("#file1").val("");
		$("#file2").val("");
		$("#file3").val("");
		$("#file4").val("");
		$("#file5").val("");
	$scope.config.status = true;
	$scope.config.value.title="";
	$scope.config.value.desc="";
	$scope.config.value.images.images1.value="";
	$scope.config.value.images.images1.status = false;
	$scope.config.value.images.images1.isremove = false;
	$scope.config.value.images.images2.value="";
	$scope.config.value.images.images2.status = false;
	$scope.config.value.images.images2.isremove = false;
	$scope.config.value.images.images3.value="";
	$scope.config.value.images.images3.status = false;
	$scope.config.value.images.images3.isremove = false;
	$scope.config.value.images.images4.value="";
	$scope.config.value.images.images4.status = false;
	$scope.config.value.images.images4.isremove = false;
	$scope.config.value.images.images5.value="";
	$scope.config.value.images.images5.status = false;
	$scope.config.value.images.images5.isremove = false;
	}
	
	var iscreate = false;
	
	$scope.init = function(){
		$.get("data.php",function(res){
			res = JSON.parse(res);
			if(res.statusCode==200){
			$scope.DataItem = res.Data;	
			}else{
				alert(res.Message);
			}
		});
		
		if(iscreate==false){
		iscreate = true;
		$("#file1").change(function(){
		if($scope.config.value.images.images1.value!=""){
		$scope.config.value.images.images1.isremove = true;	

		}
		
		if($("#file1").val()!=""){
		$scope.config.value.images.images1.status = true;
		document.getElementById("img1").src = URL.createObjectURL($('#file1')[0].files[0]);	
		}
		
			
		})	
		
		$("#file2").change(function(){
		if($scope.config.value.images.images2.value!=""){
		$scope.config.value.images.images2.isremove = true;	
		
		}
		
		if($("#file2").val()!=""){
		$scope.config.value.images.images2.status = true;
		document.getElementById("img2").src =  URL.createObjectURL($('#file2')[0].files[0]);	
		}
		
			
		})
		
		$("#file3").change(function(){
		if($scope.config.value.images.images1.value!=""){
		$scope.config.value.images.images3.isremove = true;	
		
		}
		if($("#file3").val()!=""){
		$scope.config.value.images.images3.status = true;
		document.getElementById("img3").src =  URL.createObjectURL($('#file3')[0].files[0]);	
		}
		
			
		})
		
		$("#file4").change(function(){
		if($scope.config.value.images.images4.value!=""){
		$scope.config.value.images.images4.isremove = true;	
	
		}
		
		if($("#file4").val()!=""){
		$scope.config.value.images.images4.status = true;
		document.getElementById("img4").src =  URL.createObjectURL($('#file4')[0].files[0]);	
		}
		
			
		})
		
		$("#file5").change(function(){
		if($scope.config.value.images.images5.value!=""){
		$scope.config.value.images.images5.isremove = true;	

		}
		
		if($("#file5").val()!=""){
		$scope.config.value.images.images5.status = true;
		document.getElementById("img5").src =  URL.createObjectURL($('#file5')[0].files[0]);	
		}
	
			
		})
		
		}
	}
	
	$scope.Save = function(){
		var formData = new FormData();
		formData.append('id', $scope.config.value.id);
		if($("#file1").val()!=""){
formData.append('file1', $('#file1')[0].files[0]);
		}
			if($("#file2").val()!=""){
formData.append('file2', $('#file2')[0].files[0]);
			}
				if($("#file3").val()!=""){
formData.append('file3', $('#file3')[0].files[0]);
				}
					if($("#file4").val()!=""){
formData.append('file4', $('#file4')[0].files[0]);
					}
						if($("#file5").val()!=""){
formData.append('file5', $('#file5')[0].files[0]);
						}
formData.append('title',$scope.config.value.title);
formData.append('desc',$scope.config.value.desc);
var _fileremove = [];
if($scope.config.value.images.images1.isremove){
	if($scope.config.value.images.images1.value!=""){
		_fileremove.push($scope.config.value.images.images1.value);
	}
}

if($scope.config.value.images.images2.isremove){
	if($scope.config.value.images.images2.value!=""){
		_fileremove.push($scope.config.value.images.images2.value);
	}
}

if($scope.config.value.images.images3.isremove){
	if($scope.config.value.images.images3.value!=""){
		_fileremove.push($scope.config.value.images.images3.value);
	}
}

if($scope.config.value.images.images4.isremove){
	if($scope.config.value.images.images4.value!=""){
		_fileremove.push($scope.config.value.images.images4.value);
	}
}

if($scope.config.value.images.images5.isremove){
	if($scope.config.value.images.images5.value!=""){
		_fileremove.push($scope.config.value.images.images5.value);
	}
}
formData.append('remove',JSON.stringify(_fileremove));
$.ajax({
       url : 'save.php',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,  // tell jQuery not to set contentType
       success : function(data) {
           data = JSON.parse(data);
		   if(data.statusCode==200){
			   alert("ดำเนินการเสร็จสิ้น");
			   $scope.init();
			   $scope.config.status = false;
		   }else{
			alert(data.Message);   
		   }
       }
});
	}
	
	$scope.Edit = function(x){
		console.log(x);
	$scope.config.value.title=x.title;
	$scope.config.value.desc=x.desc;
	$scope.config.value.id=x.id;
	$scope.config.status = true;
	$scope.config.value.images.images1.value=x.images1.value;
	$scope.config.value.images.images1.status =x.images1.status;
	$scope.config.value.images.images1.isremove = x.images1.isremove;
	$scope.config.value.images.images2.value=x.images2.value;
	$scope.config.value.images.images2.status = x.images2.status;
	$scope.config.value.images.images2.isremove = x.images2.isremove;
	$scope.config.value.images.images3.value=x.images3.value;
	$scope.config.value.images.images3.status = x.images3.status;
	$scope.config.value.images.images3.isremove = x.images3.isremove;
	$scope.config.value.images.images4.value=x.images4.value;
	$scope.config.value.images.images4.status = x.images4.status;
	$scope.config.value.images.images4.isremove = x.images4.isremove;
	$scope.config.value.images.images5.value= x.images5.value;
	$scope.config.value.images.images5.status =  x.images5.status;
	$scope.config.value.images.images5.isremove = x.images5.isremove;
	
		
	}
	

	
	$scope.Reset = function(){
		$("#file1").val("");
		$("#file2").val("");
		$("#file3").val("");
		$("#file4").val("");
		$("#file5").val("");
		$scope.config.status = false;
	$scope.config.value.title="";
	$scope.config.value.desc="";
	$scope.config.value.images.images1.value="";
	$scope.config.value.images.images1.status = false;
	$scope.config.value.images.images1.isremove = false;
	$scope.config.value.images.images2.value="";
	$scope.config.value.images.images2.status = false;
	$scope.config.value.images.images2.isremove = false;
	$scope.config.value.images.images3.value="";
	$scope.config.value.images.images3.status = false;
	$scope.config.value.images.images3.isremove = false;
	$scope.config.value.images.images4.value="";
	$scope.config.value.images.images4.status = false;
	$scope.config.value.images.images4.isremove = false;
	$scope.config.value.images.images5.value="";
	$scope.config.value.images.images5.status = false;
	$scope.config.value.images.images5.isremove = false;
	}
	
	$scope.deleteImages = function(x){
		if(x=="1"){
			if($("#file1").val()!=""){
			$("#file1").val("");
			}else{
			$scope.config.value.images.images1.isremove = true;
			}	
			document.getElementById("img1").src="";
			$scope.config.value.images.images1.status = false;
			
			 
		}else if(x=="2"){
	if($("#file2").val()!=""){
			$("#file2").val("");
			}else{
			$scope.config.value.images.images2.isremove = true;
			}	
			document.getElementById("img2").src="";
			$scope.config.value.images.images2.status = false;	
		}else if(x=="3"){
		if($("#file3").val()!=""){
			$("#file3").val("");
			}else{
			$scope.config.value.images.images3.isremove = true;
			}	
			document.getElementById("img3").src="";
			$scope.config.value.images.images3.status = false;	
		}else if(x=="4"){
		$("#file4").val("");
		if($("#file4").val()!=""){
			$("#file4").val("");
			}else{
			$scope.config.value.images.images4.isremove = true;
			}	
			document.getElementById("img4").src="";
			$scope.config.value.images.images4.status = false;	
		}else if(x=="5"){
		if($("#file5").val()!=""){
			$("#file5").val("");
			}else{
			$scope.config.value.images.images5.isremove = true;
			}	
			document.getElementById("img5").src="";
			$scope.config.value.images.images5.status = false;	
		}
	}
	
	$scope.Delete = function(x){
		if(confirm("confirm")==false){
		return;	
		}
	$.get("delete.php?id="+x.id,function(res){
		res = JSON.parse(res);
		if(res.statusCode==200){
			alert("delete complete");
			$scope.init();
			
		}else{
		alert(res.Message);	
		}
	});
	}
		
		
	
});
</script>
</head>

<body ng-app="app" ng-controller="movie" ng-init="init();">
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="49" bgcolor="#000000" class="fw">&nbsp;&nbsp;Movie System</td>
  </tr>
  <tr>
    <td height="500" align="center" valign="top">
    <br />
    <button class="btn btn-primary" ng-click="Add();" style="float:right;">เพิ่มใหม่</button>
    &nbsp;
    <br />
   <br />
   <hr />
   <div ng-show="config.status==true">
     <table width="1024" border="0" cellspacing="0" cellpadding="0">
       <tr>
         <td width="195">ชื่อ</td>
         <td width="829"><label for="textfield"></label>
           <input type="text" name="textfield" class="form-control" ng-model="config.value.title" id="textfield" /></td>
       </tr>
       <tr>
         <td>รูป1</td>
         <td><table width="812" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="195">
             <div ng-show="config.value.images.images1.status">
             <img src="images/{{config.value.images.images1.value}}"  id="img1" width="194" height="96" /><br />
               <a href="javascript:void(0);" ng-click="deleteImages('1');">ลบรูปภาพนี้</a>
               </div>
            </td>
             <td width="617"><label for="file1"></label>
               <input type="file" name="file1" id="file1" /></td>
           </tr>
         </table></td>
       </tr>
       <tr>
         <td>รูป2</td>
         <td><table width="812" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="195">
              <div ng-show="config.value.images.images2.status">
             <img src="images/{{config.value.images.images2.value}}" id="img2" width="194" height="96" /><br />
               <a href="javascript:void(0);" ng-click="deleteImages('2');">ลบรูปภาพนี้</a>
               </div>
             </td>
             <td width="617"><label for="file2"></label>
               <input type="file" name="file2" id="file2" /></td>
           </tr>
         </table></td>
       </tr>
       <tr>
         <td>รูป3</td>
         <td><table width="812" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="195">
              <div ng-show="config.value.images.images3.status">
             <img src="images/{{config.value.images.images3.value}}"  id="img3" width="194" height="96" /><br />
               <a href="javascript:void(0);" ng-click="deleteImages('3');">ลบรูปภาพนี้</a>
               </div>
             </td>
             <td width="617"><label for="file3"></label>
               <input type="file" name="file3" id="file3" /></td>
           </tr>
         </table></td>
       </tr>
       <tr>
         <td>รูป4</td>
         <td><table width="812" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="195">
              <div ng-show="config.value.images.images4.status">
             <img src="images/{{config.value.images.images4.value}}"  id="img4" width="194" height="96" /><br />
               <a href="javascript:void(0);" ng-click="deleteImages('4');">ลบรูปภาพนี้</a>
               </div>
             </td>
              <td width="617"><label for="file4"></label>
               <input type="file" name="file4" id="file4" /></td>
           </tr>
         </table></td>
       </tr>
       <tr>
         <td>รูป5</td>
         <td><table width="812" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="195">
             <div ng-show="config.value.images.images5.status">
             <img src="images/{{config.value.images.images5.value}}"  id="img5" width="194" height="96" /><br />
               <a href="javascript:void(0);" ng-click="deleteImages('5');">ลบรูปภาพนี้</a>
               </div>
               </td>
             <td width="617"><label for="file5"></label>
               <input type="file" name="file5" id="file5" /></td>
           </tr>
         </table></td>
       </tr>
       <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
       </tr>
       <tr>
         <td colspan="2"><label for="textarea"></label>
           <textarea name="textarea" ng-model="config.value.desc" class="form-control" id="textarea" cols="45" rows="5"></textarea></td>
         </tr>
       <tr>
         <td>&nbsp;</td>
         <td>
         <br />
         <input type="button" class="btn btn-primary" ng-click="Save();" name="button" id="button" value="บันทึก" />
           <input type="button" class="btn btn-danger" ng-click="Reset();" name="button2" id="button2" value="ยกเลิก" /></td>
       </tr>
     </table>
     </br>
   </div>
   
     <div ng-show="config.status==false">
       <table width="1024" border="0" cellspacing="0" cellpadding="0">
         <tr>
           <td width="348">ID</td>
           <td width="399">หนัง</td>
           <td width="98">ลบ</td>
           <td width="179">แก้ไข</td>
         </tr>
         <tr ng-repeat="data in DataItem">
           <td>{{data.id}}</td>
           <td>{{data.title}}</td>
           <td><a class="btn btn-danger" href="javascript:void(0);" ng-click="Delete(data);">ลบ</a></td>
           <td><a class="btn btn-primary"  href="javascript:void(0);" ng-click="Edit(data);">แก้ไข</a></td>
         </tr>
       </table>
     </div>
    </td>
  </tr>
  <tr>
    <td height="90" bgcolor="#000000" class="fw">
    <center>
    Desing By Web Master
    </center>
    </td>
  </tr>
</table>
</body>
</html>