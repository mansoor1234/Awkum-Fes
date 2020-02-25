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
function courseEdit(courseID)
{
 $.ajax(
  {
   url:"../../ajax/add/course.php",
   method:"post",
   data:{courseID:courseID},
   success:function(result){
   $("#modal_content").html(result);
 } 
 });
}function facultyEdit(facultyID)
{
 $.ajax(
  {
   url:"../../ajax/add/faculty.php",
   method:"post",
   data:{facultyID:facultyID},
   success:function(result){
   $("#modal_content").html(result);
 } 
 });
}
// STUDENT PAGE
 function getDepartment(campus){
  // alert("asd");
 $.ajax(
  {
   url:"../../ajax/add/department.php",
   method:"post",
   data:{campusID:campus},
   success:function(result){
   $('#department')
    .empty()
    .append(result)
;
;
 } 
 });
 } function getProgram(dept){
 $.ajax(
  {
   url:"../../ajax/add/program.php",
   method:"post",
   data:{DeptID:dept},
   success:function(result){
   $('#program')
    .empty()
    .append(result)
 } 
 });
 }function getSemester(prog){

 $.ajax(
  {
   url:"../../ajax/add/semseter.php",
   method:"post",
   data:{ProgID:prog},
   success:function(result){
   $('#semester')
    .empty()
    .append(result)
 } 
 });
 }function getCourse(semesterID){
 var program=$("#program").val();
 var campus=$("#campus").val();
 var department=$("#department").val();
 $.ajax(
  {
   url:"../../ajax/add/course.php",
   method:"post",
   data:{semesterID:semesterID,program:program,campus:campus,department:department},
   success:function(result){
    // alert(result);
   $('#course')
    .empty()
    .append(result)
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
}function validateFaculty(){
var campus=$("#campus").val(); 
var department=$("#department").val(); 
var program=$("#program").val(); 
var semester=$("#semester").val(); 
var course=$("#course").val(); 
if(campus=="0" || department=="0" || program=="0" || semester=="0" || course=="0"){
   $("form").submit(function(e) {
    e.preventDefault();
   });
   if(campus=="0"){$("#campus").css("border","1px solid red");}else{$("#campus").css("border","1px solid green");}
   if(department=="0"){$("#department").css("border","1px solid red");}else{$("#department").css("border","1px solid green");}
   if(program=="0"){$("#program").css("border","1px solid red");}else{$("#program").css("border","1px solid green");}
   if(semester=="0"){$("#semester").css("border","1px solid red");}else{$("#semester").css("border","1px solid green");}
   if(course=="0"){$("#course").css("border","1px solid red");}else{$("#course").css("border","1px solid green");}
 }else{
  $('form').on('submit',function(event){
  event.preventDefault();
  event.currentTarget.submit();
});
 }
}function validateEditFaculty(){
var campus=$("#campus2").val(); 
var department=$("#department2").val(); 
var program=$("#program2").val(); 
var semester=$("#semester2").val(); 
var course=$("#course2").val(); 
if(campus=="0" || department=="0" || program=="0" || semester=="0" || course=="0"){
   $("form").submit(function(e) {
    e.preventDefault();
   });
   if(campus=="0"){$("#campus2").css("border","1px solid red");}else{$("#campus2").css("border","1px solid green");}
   if(department=="0"){$("#department2").css("border","1px solid red");}else{$("#department2").css("border","1px solid green");}
   if(program=="0"){$("#program2").css("border","1px solid red");}else{$("#program2").css("border","1px solid green");}
   if(semester=="0"){$("#semester2").css("border","1px solid red");}else{$("#semester2").css("border","1px solid green");}
   if(course=="0"){$("#course2").css("border","1px solid red");}else{$("#course2").css("border","1px solid green");}
 }else{
  $('form').on('submit',function(event){
  event.preventDefault();
  event.currentTarget.submit();
});
 }
}function validateProgram(){
var semester=$("#semester").val(); 
if(semester=="0"){
   $("#addProgram").submit(function(e) {
    e.preventDefault();
   });
  if(semester=="0"){$("#semester").css("border","1px solid red");}else{$("#semester").css("border","1px solid green");}
 }else{
 $('#addProgram').on('submit',function(event){
  event.preventDefault();
  event.currentTarget.submit();
});
 }
}function validateEditProgram(){
var semester=$("#semestersEdit").val(); 
if(semester=="0"){
   $("#editProgForm").submit(function(e) {
    e.preventDefault();
   });
  if(semester=="0"){$("#semestersEdit").css("border","1px solid red");}else{$("#semestersEdit").css("border","1px solid green");}
 }else{
  $('#editProgForm').on('submit',function(event){
  event.preventDefault();
  event.currentTarget.submit();
});
 }
}