
function save(){
$("#addUserForm").submit(function(e) {
e.preventDefault();
});   
var username=$("#username").val();
var user_email=$("#user_email").val();
var user_password=$("#user_password").val();
var user_confirm_password=$("#user_confirm_password").val();
if(username!="" && user_email!="" && user_password!="" && user_confirm_password!=""){
$.ajax(
      {
url: '../../ajax/users/users.php',
type: 'POST',
data: new FormData($('#addUserForm')[0]),
cache: false,
contentType: false,
processData: false,
beforeSend: function() {
$("#submit_btn").css("display","none");
$("#loading_btn").css("display","flex");
 },
success:function(result){
  $('#target').html(result);
 
  $("#loading_btn").css("display","none");
}
});
}
}


function editUser(){
$("#editUserForm").submit(function(e) {
e.preventDefault();
});
var val1=$("#user_edit_password").val();
var val2=$("#user_edit_confirm_password").val();
if(val1=="" || val2==""){
$("#password_field_empty_error").css("display","flex");
exit(); 
}
$.ajax({
url: '../../ajax/users/edit_user.php',
type: 'POST',
data: new FormData($('#editUserForm')[0]),
cache: false,
contentType: false,
processData: false,
beforeSend: function() {
$("#submit_edit_btn").css("display","none");
$("#loading_edit_btn").css("display","flex");
 },
success:function(result){
  $('#target1').html(result);
  // $("#submit_edit_btn").css("display","flex");
  $("#loading_edit_btn").css("display","none");
}
});
}
function clearFormData(){
$("#target").html("<input  class='btn btn-primary mr-2' type='submit' id='submit_btn' name='user_form' onclick='save(this.value)' value='Save'>");
$("#success_message").css("display","none");
$("#user_confirm_password").css("border","");
$("#user_password").css("border","");
$("#user_email").css("border",""); 
}
function clearEditFormData(){

$(".alert-success").css("display","none");
$(".alert-danger").css("display","none");
$("#user_edit_confirm_password").css("border","");
$("#user_edit_password").css("border","");
$("#edit_user_email").css("border",""); 
$("#saved_edit_btn").css("display","none");
$("#submit_edit_btn").css("display","flex");	
}

function confirmPassword(confirm_pass){
password=$("#user_password").val();
if(password==confirm_pass){
$("#submit_btn").removeAttr("disabled","disabled");
$("#password_match_error_message").css("display","none");
$("#user_confirm_password").css("border","1px solid green");
$("#user_password").css("border","1px solid green");
}else{
$("#submit_btn").attr("disabled","disabled");
$("#password_match_error_message").css("display","block");
$("#user_confirm_password").css("border","1px solid red");
$("#user_password").css("border","1px solid red");
}
}
function editConfirmPassword(confirm_pass){
password=$("#user_edit_password").val();
if(password==confirm_pass){
$("#submit_edit_btn").removeAttr("disabled","disabled");
$("#password_edit_match_error_message").css("display","none");
$("#user_edit_confirm_password").css("border","1px solid green");
$("#user_edit_password").css("border","1px solid green");
}else{
$("#submit_edit_btn").attr("disabled","disabled");
$("#password_edit_match_error_message").css("display","block");
$("#user_edit_confirm_password").css("border","1px solid green");
$("#user_edit_confirm_password").css("border","1px solid red");
$("#user_edit_password").css("border","1px solid red");
}	
}
function validateEmail(email) 
{

var re = /\S+@\S+\.\S+/;
if(re.test(email)){
$("#submit_btn").removeAttr("disabled","disabled");
$("#invalid_email_error_message").css("display","none");  
$("#user_email").css("border","1px solid green"); 
}else{
$("#submit_btn").attr("disabled","disabled");
$("#invalid_email_error_message").css("display","block");
$("#user_email").css("border","1px solid red"); 
}
}
function validateEditEmail(email) 
{
var re = /\S+@\S+\.\S+/;
if(re.test(email)){
$("#submit_edit_btn").removeAttr("disabled","disabled");
$("#invalid_edit_email_error_message").css("display","none");   
$("#edit_user_email").css("border","1px solid green"); 
}else{
$("#submit_edit_btn").attr("disabled","disabled");
$("#invalid_edit_email_error_message").css("display","block");
$("#edit_user_email").css("border","1px solid red"); 
}
}

function userEdit(user_id)
{
 $.ajax(
  {
   url:"../../ajax/users/users.php",
   method:"post",
   data:{user_id:user_id},
   success:function(result){
   $("#modal_content").html(result);
 } 
 });
}
function showPasswordField(){
	var display = $('#edit_password_field').css('display');
	if(display=="none")
	{
	  $("#change_pass_btn").html("Hide change password");
	  $("#edit_password_field").css("display","flex");	
	}else if(display=="flex"){
	  $("#change_pass_btn").html("Change password");
	  $("#edit_password_field").css("display","none");		
	}
}
function changeImage(user_id){

$.ajax(
  {
   url:"../../ajax/users/change_image.php",
   method:"post",
   data:{user_id:user_id},
   success:function(result){
   $("#imageUploadContent").html(result);
 } 
 });

}
// IMAGE VALIDATION AND UPDATE START
function saveImage(){
$("#imageChangeForm").submit(function(e) {
e.preventDefault();
}); 
$.ajax(
      {
url: '../../ajax/users/change_image.php',
type: 'POST',
data: new FormData($('#imageChangeForm')[0]),
cache: false,
contentType: false,
processData: false,
beforeSend: function() {
$("#submit_change_image_btn").css("display","none");
$("#loading_change_image_btn").css("display","flex");
 },
success:function(result){
$('#target3').html(result);
$("#loading_change_image_btn").css("display","none");
}
});	
}

function readURL(input) {
  
   var ext = $('#imgInp').val().split('.').pop().toLowerCase();
   $("#target3").css("color","red");
  if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
   $("#target3").html("Image extention not valid");
   $("#blah").css("display","none");
   $("#submit_change_image_btn").attr("disabled","disabled");
   exit();
  }

  else if (input.files && input.files[0]) {
    $("#blah").css("display","flex");
    $("#blah").css("width","100");
    $("#blah").css("height","100");
    $("#blah").css("border-radius","10px");
    $("#blah").css("margin-left","300px");
    $("#blah").css("margin-top","-105px");
   
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
    $("#submit_change_image_btn").removeAttr("disabled","disabled");
    $("#target3").html("");
  }
  
}

$("#imgInp").change(function() {
  $("#submit_change_image_btn").css("display","flex");
  readURL(this);

});
$(document).ready(function() {       
    $('#imgInp').bind('change', function() {
        var a=(this.files[0].size);
        if(a > 1000000) {
           $("#target3").html("Maximum file size is 1MB");
            $("#submit_change_image_btn").attr("disabled","disabled");

        };
    });
});
var _URL = window.URL || window.webkitURL;
$("#imgInp").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.onload = function () {
            if(this.width>250 || this.height>495){
            $("#target3").html("Maximum image width and height(250x495)");
            $("#submit_change_image_btn").attr("disabled","disabled");
            }
        };
        img.src = _URL.createObjectURL(file);
    }
});
// IMAGE VALIDATION AND UPDATE END
// ROLEPERMISSION START
function saveMenuItem(){
 $("#addmenuItem").submit(function(e) {
e.preventDefault();
}); 
var title=$("#menuTitle").val();
var module1=$("#module").val();
var pageUrl=$("#pageUrl").val();
if(title!='' || module1!='' || pageUrl!=''){

$.ajax(
      {
url: '../../ajax/role_permissions/permission_setup.php',
type: 'POST',
data: new FormData($('#addmenuItem')[0]),
cache: false,
contentType: false,
processData: false,
beforeSend: function() {
$("#submit_menu_item_btn").css("display","none");
$("#loading_menu_item_btn").css("display","flex");
 },
success:function(result){
$('#target3').html(result);
$("#loading_menu_item_btn").css("display","none");
}
});  
}
}
function clearMenuFormData(){
$(".alert-success").css("display","none");
$(".alert-danger").css("display","none");
$("#saved_menu_item_btn").css("display","none");
$("#submit_menu_item_btn").css("display","block");
}
function menuItemEdit(menu_id){
$.ajax(
  {
   url:"../../ajax/role_permissions/permission_setup.php",
   method:"post",
   data:{menu_id:menu_id},
   success:function(result){
   $("#modal_content").html(result);

 } 
 });
}

function clearEditMenuFormData(){
$(".alert-success").css("display","none");
$(".alert-danger").css("display","none");
$("#saved_btn").css("display","none");
$("#submit_btn").css("display","block");  
}
function editMenuItem(){
$("#imageEditMenuItemForm").submit(function(e) {
e.preventDefault();
});   
$.ajax(
      {
url: '../../ajax/role_permissions/edit_menu_item.php',
type: 'POST',
data: new FormData($('#imageEditMenuItemForm')[0]),
cache: false,
contentType: false,
processData: false,
beforeSend: function() {
$("#submit_btn").css("display","none");
$("#loading_btn").css("display","flex");
 },
success:function(result){
  $('#target4').html(result);
  $("#loading_btn").css("display","none");
}
});
}
function deleteMenuItem(id) {
  var txt;
  var r = confirm("Do you want to delete this record?");
  if (r == true) {
      $.ajax(
  {
   url:"../../ajax/role_permissions/edit_menu_item.php",
   method:"post",
   data:{delete_menu_id:id},
   success:function(result){
   
  } 
   });
  } else {
  
  }

}
// ADD ROLE PAGE
function addRoleData(){
  $("#addRoleForm").submit(function(e) {
e.preventDefault();
});  
  var val1=$("#roleName").val();
  var val2=$("#roleDescription").val();
  if(val1=="" || val2==""){
    $("#error_message").css("display","block");
  }else{
 $.ajax(
      {
url: '../../ajax/role_permissions/add_role.php',
type: 'POST',
data: new FormData($('#addRoleForm')[0]),
cache: false,
contentType: false,
processData: false,
beforeSend: function() {
$("#addRoleBtn").css("display","none");
$("#addRoleLoading").css("display","block");
 },
success:function(result){
  $('#target').html(result);
if(result=="true"){
$('#success_message').css('display','block');
$('#error_message').css('display','none');
$('#addRoleSaved').css('display','block');
$('#addRoleLoading').css('display','none');
}else{
$('#error_message').css('display','block'); 
}
}
}); 
}
}

function checkUncheck(className,user){
var checked=$('.'+className+':checkbox:checked').length;
// alert("asdas");
if(checked==0){
$("#"+user).prop("checked",false);
}else{
$("#"+user).prop("checked",true);  
}
}

function clearRoleData(){
$(".alert-success").css("display","none");
$(".alert-danger").css("display","none");
$("#addRoleBtn").css("display","block");
$("#addRoleSaved").css("display","none");

}
function saveUserRole(){
  
$("#addUserRoleForm").submit(function(e) {
e.preventDefault();
});  
 $.ajax(
      {
url: '../../ajax/role_permissions/add_user_role.php',
type: 'POST',
data: new FormData($('#addUserRoleForm')[0]),
cache: false,
contentType: false,
processData: false,
beforeSend: function() {
$("#submitUserRoleBtn").css("display","none");
$("#roleSavedBtn").css("display","none");
 },
success:function(result){
  $('#target').html(result);
  $("#addRoleSaved").css("display","flex");
  $('#userRoleLoadingBtn').css('display','none');
}
}); 
}

function clearUserRoleData(){
$(".alert-success").css("display","none");
$(".alert-danger").css("display","none");
$("#submitUserRoleBtn").css("display","block");
$("#addRoleSaved").css("display","none");
}
function ChangeStatus(id,status){
 $.ajax(
{
url: '../../ajax/users/changeStatus.php',
type: 'POST',
data:{userid:id,status:status},
success:function(result){
  $('#statusTarget').html(result);
}
}); 
}


