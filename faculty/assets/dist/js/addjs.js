function campusEdit(campusID)
{
 $.ajax(
  {
   url:"../../ajax/add/campus.php",
   method:"post",
   data:{campusID:campusID},
   success:function(result){
   $("#modal_content").html(result);
 } 
 });
} function viladateProduct(){
 var campus=$("#campus").val(); 
 if(campus=="0"){
   $("form").submit(function(e) {
    e.preventDefault();
   });
  $("#output").html('<div class="alert has-icon text-center" role="alert"  style="border:1px dashed red; color: red;"><i class="fa fa-exclamation-triangle alert-icon">Please fill required fields</div>');
  $("#campus").css("border","1px solid red");
 }else{
  $('form').unbind('submit').submit();
  $("#campus").css("border","1px solid green");
}
}function deptEdit(deptID)
{
 $.ajax(
  {
   url:"../../ajax/add/department.php",
   method:"post",
   data:{deptID:deptID},
   success:function(result){
   $("#modal_content").html(result);
 } 
 });
}function progEdit(progID)
{
 $.ajax(
  {
   url:"../../ajax/add/program.php",
   method:"post",
   data:{progID:progID},
   success:function(result){
   $("#modal_content").html(result);
 } 
 });
}function semEdit(semID)
{
 $.ajax(
  {
   url:"../../ajax/add/semseter.php",
   method:"post",
   data:{semID:semID},
   success:function(result){
   $("#modal_content").html(result);
 } 
 });
}

// STUDENT PAGE
 function getDepartment(campus){
 $.ajax(
  {
   url:"../../ajax/add/department.php",
   method:"post",
   data:{campusID:campus},
   success:function(result){
   $("#department").html(result);
 } 
 });
 } function getProgram(dept){
 $.ajax(
  {
   url:"../../ajax/add/program.php",
   method:"post",
   data:{DeptID:dept},
   success:function(result){
   $("#program").html(result);
 } 
 });
 }function getSemester(prog){
 $.ajax(
  {
   url:"../../ajax/add/semseter.php",
   method:"post",
   data:{ProgID:prog},
   success:function(result){
   $("#semester").html(result);
 } 
 });
 }function validateStd(){
var campus=$("#campus").val(); 
var department=$("#department").val(); 
var program=$("#program").val(); 
var semester=$("#semester").val(); 
var stdContact=$("#stdContact").val().toString().length;

if(campus=="0" || department=="0" || program=="0" || semester=="0" || $stdContact!=11){
   $("form").submit(function(e) {
    e.preventDefault();
   });
   if(campus=="0"){$("#campus").css("border","1px solid red");}else{$("#campus").css("border","1px solid green");}
   if(department=="0"){$("#department").css("border","1px solid red");}else{$("#department").css("border","1px solid green");}
   if(program=="0"){$("#program").css("border","1px solid red");}else{$("#program").css("border","1px solid green");}
   if(semester=="0"){$("#semester").css("border","1px solid red");}else{$("#semester").css("border","1px solid green");}
   if(stdContact!=11){$("#stdContact").css("border","1px solid red");}else{$("#stdContact").css("border","1px solid green");}
 }else{
   $('form').unbind('submit').submit();
 }
}