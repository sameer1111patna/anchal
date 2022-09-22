<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "inc/link.php"; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
<?php include "inc/menu.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage About Us Content</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage About Us Content</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12">
            <div class="card">


<?php 

if(isset($_POST['addbtn'])){

try{

$id=$_POST['sourceid'];
  
$description=$_POST['description'];

$today= date('Y-m-d H:i:s');

$filename = $_FILES['image']['name'];


	
	// Select file type
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	
	// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension

 	// Upload files and store in database
move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename);

// $stmt = $classhelper->db_con->prepare("INSERT INTO `aboutus_tb`(`content`,`image`, `date`) VALUES (:content,:imgData,'$today')");

if(!empty($_FILES['image']['name'])){

  $studentQuery = "UPDATE aboutus_tb SET content='$description', date='$today',image='$filename' WHERE id='$id' ";
  $result = $classhelper->db_con->query($studentQuery);

}
else
{
  $studentQuery = "UPDATE aboutus_tb SET content='$description',date='$today' WHERE id='$id'";
  $result = $classhelper->db_con->query($studentQuery);
}     
if($result){
  
?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Activity Added Successfully.
  </div>
  
  <?php
  }else{
  
  ?>
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Activity not Added Successfully Please Try Again.
  </div>
  
  <?php
  
  }
  
  }
  catch(PDOException $ex){
  
  ?>
  
  <div class="alert alert-danger">
  <strong>A problem occured!</strong><?php echo $ex->getMessage(); ?>.
  </div>
  
  <?php
  
  }
  
  
  }

 ?>





            <?php
if($_POST){
if(isset($_POST['updatebtn'])){

  try{
  
   $content=$_POST['description'];

   $sourceid=base64_decode($_POST['sourceid']);
    
    $today= date('Y-m-d H:i:s');
  


     
$stmt = $classhelper->db_con->prepare("UPDATE `aboutus_tb` SET `content`=:content,`date`='$today' where `id`=:sourceid");



  $stmt->bindParam(":content",$content);



  $stmt->bindParam(":sourceid",$sourceid);
  
  
  
  if($stmt->execute()){
  
  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> About Us Updated Successfully.
  </div>
  
  
  <?php
  
  
  }else{
  
  
  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your About Us Update Failed Please Try Again.
  </div>
  
  <?php
  
  }
  
  }
  catch(PDOException $ex){
  
  ?>
  
  <div class="alert alert-danger">
  <strong>A problem occured!</strong><?php echo $ex->getMessage(); ?>.
  </div>
  
  <?php
  
  }
  
  
  }


}

?>
             <div class="card-header">
                <h3 class="card-title">Manage Activity</h3>

            
                    <!--Add Modal-->
     

            



               <!--Edit Modal-->
               <div class="modal fade" id="editmodal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" >Edit About Us <span id="edittxt"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
          
               <div id="contentx">


               </div>
                
               
               

              
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="updatebtn" class="btn btn-primary">Save changes</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

             <!--Edit Modal Ends-->
      </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                  $i=0;
                  $stmt = $classhelper->db_con->prepare("SELECT * FROM `aboutus_tb` order by id desc");
                  $stmt->execute();
                   $row=$stmt->fetch(PDO::FETCH_ASSOC);
                  extract($row);
                           $portfolioid=$id;
                           $portfoliotitle=$content;
                           $portfolioimage=$image;
                           
			          ?>
       
            <div class="modal-header">
              <h4 class="modal-title">Add Aboutus Content </h4>
              
            </div>
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
          
               
                  <div class="form-group">
                    <label for="exampleInputFile">About Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input"  accept=".jpg, .png, .jpeg, .gif|image/*" >
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                 </div>
                  </div>

                  <div class="form-group">
                    
                    <img src="upload/<?php echo $portfolioimage; ?>">
                 </div>
                 <input type="hidden"name="sourceid"value="<?php echo $portfolioid; ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control ckeditor" id="exampleInputEmail1" placeholder="Enter Description"><?php echo $content;  ?></textarea>
                  </div>
               </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="addbtn" class="btn btn-primary">Save changes</button>
              </form>
            </div>
         
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         

         

        </div>
        <!-- /.row -->


    
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

<?php include "inc/footer.php"; ?>
</body>
</html>


