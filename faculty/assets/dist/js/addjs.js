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