
<?php 
include('../../config.php');
extract($_POST);
if (isset($add_menu_item)) {
  $get_id=mysqli_query($con,"select * from rbac_menu_item ORDER BY menu_id DESC LIMIT 1");
  $row=mysqli_fetch_array($get_id);
  $id=$row['menu_id']+1;
  $created_date=date("Y-m-d H:m:s");
  $is_report=0;
  $created_by=0;
  $insert=$conn->prepare("INSERT INTO `rbac_menu_item` (`menu_id`, `menu_title`, `page_id`, `page_name`,`module`, `parent_menu`, `is_report`, `create_by`, `create_date`) VALUES (:id,:title ,:url ,:pagename,:module ,:parent ,:report ,:created_by ,:create_date )");
  $insert->bindParam(":id",$id);
  $insert->bindParam(":title",$menu_title);
  $insert->bindParam(":url",$url);
  $insert->bindParam(":pagename",$pageName);
  $insert->bindParam(":module",$module);
  $insert->bindParam(":parent",$parent_menu);
  $insert->bindParam(":report",$is_report);
  $insert->bindParam(":created_by",$created_by);
  $insert->bindParam(":create_date",$created_date);
  $run=$insert->execute();
  if($run){
   echo "<script>$('.alert-danger').css('display','none');</script>";
   echo "<script>$('#success_message').css('display','block');</script>";
   echo " <button class='btn btn-primary' type='button' disabled id='saved_menu_item_btn' > <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Saved</button>";
  }else{
  	echo "<script>$('.alert-danger').css('display','block');</script>";
    echo "<script>$('#success_message').css('display','none');</script>";
    echo " <input  class='btn btn-primary mr-2' type='submit' id='submit_menu_item_btn' name='user_form' onclick='saveMenuItem(this.value)' value='Save'>";

  }
}
if(isset($_POST['menu_id'])){
  $menu_id=$_POST['menu_id'];
  $get_menu_id=$conn->prepare("select * from `rbac_menu_item` where menu_id=:id");
  $get_menu_id->bindParam(":id",$menu_id);
  $get_menu_id->execute();
  $rows=$get_menu_id->fetch(PDO::FETCH_ASSOC);	

  $get_parent_menu_id=$conn->prepare("select * from `rbac_menu_item` where parent_menu=:id");
  $get_parent_menu_id->bindParam(":id",$menu_id);
  $get_parent_menu_id->execute();
  $row2=$get_parent_menu_id->fetch(PDO::FETCH_ASSOC);

 ?>
  <div class="row">
                                  <div class="col-lg-12">
                                    <div >
                            	      <center>
                                            <div id="error_messages_area">
                                            <div class="alert alert-success has-icon" role="alert" id="edit_success_message" style="display: none;"><i class="fa fa-check-circle alert-icon"></i> Menu Item has been edited.</div>
                                            <div class="alert alert-danger has-icon" role="alert" id="edit_error_message" style="display: none;"><i class="fa fa-exclamation-triangle alert-icon"></i> Sorry, Failed to edit menu Item.</div>
                                           
                                         </center>
                                      </div>
                                <div class="card card-fullheight">
                                    <div class="card-body">
                                        <h5 class="box-title text-primary"></h5>
                                        
                                          <div class="row">
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" placeholder="Menu Title" name="menu_title" value="<?php echo $rows['menu_title'];?>" required>
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-user"></i></div><input class="form-control" type="text" placeholder="Page Url" name="url" value="<?php echo $rows['page_id'];?>" required>
                                                </div>
                                            </div>
                                           </div>
                                            </div>
                                            <div class="row">
                                           <div class="col-lg-6 col-sm-12 mb-2">
                                            <div class="form-group  ">
                                                <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-text"></i></div><input class="form-control" type="text" name="module" value="<?php echo $rows['module'];?>" placeholder="Module">
                                                </div>
                                            </div>
                                           </div>
                                           <div class="form-group col-lg-6 col-sm-12 mb-2">
                                             <div class="input-group-icon input-group-icon-left input-group-lg">
                                                    <div class="input-icon input-icon-left"><i class="ti-text"></i></div><input class="form-control" type="text" name="pageName" value="<?php echo $rows['page_name'];?>" placeholder="Page Name">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-lg-6 col-sm-12 mb-2">
                                                <select name="parent_menu" class="form-control" style="border-radius: 8px;">
                                                        
                                                        <?php if(isset($row2['menu_id'])){?>
                                                        <option value="<?php echo $row2['menu_id'];?>"><?php echo $row2['menu_title'];?></option>
                                                        <?php   }else{ ?>
                                                        <option value="0">Choose Parent Menu</option><?php  } ?>  
                                                        <?php $get_parent=mysqli_query($con,"select * from rbac_menu_item");?>
                                                        <?php while($rows2=mysqli_fetch_array($get_parent)){?>
                                                        <option value="<?php echo $rows2['menu_id'];?>"><?php echo $rows2['menu_title'];?></option>
                                                        <?php }?>
                                                 </select>
                                              </div>
                                            </div>
                                         <input type="hidden" name="menu_id" value="<?php echo $menu_id;?>">
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                         <div class="modal-footer">
                                                <button class="btn btn-light" type="button"     data-dismiss="modal">Close
                                                </button>
                                                 <button class="btn btn-light" type="reset" 
                                                 onclick="clearEditMenuFormData()">Clear
                                                 </button>
                                                 <input  class="btn btn-primary mr-2" type="submit" id="submit_btn" name="user_form" onclick="editMenuItem(this.value)" value="Save Changes">
                                                 <div id="target4">
                                                      
                                                    <button class="btn btn-primary"
                                                      type="button" disabled id="saved_btn" style="display: none;">
                                                       <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Saved
                                                    </button>
                                                 </div>
                                           <button class="btn btn-primary" type="button" disabled id="loading_btn" style="display: none;">
                                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...<div id="target">
                                       </div>
                                   </button>
                               </div>
                                           
<?php } ?>