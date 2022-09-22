<?php ob_start();
session_start();?>
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
            <h1 class="m-0">Manage Edit Banner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Edit Banner</li>
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
  
$filename1 = $_FILES['about_banner']['name'];

	// Select file type
$imageFileType = strtolower(pathinfo($filename1,PATHINFO_EXTENSION));
	
	// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension

 	// Upload files and store in database
move_uploaded_file($_FILES["about_banner"]["tmp_name"],'upload/'.$filename1);


$filename2 = $_FILES['activity_banner']['name'];

	// Select file type
$imageFileType = strtolower(pathinfo($filename2,PATHINFO_EXTENSION));
	
	// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension

 	// Upload files and store in database
move_uploaded_file($_FILES["activity_banner"]["tmp_name"],'upload/'.$filename2);


$filename3 = $_FILES['gallery_banner']['name'];

	// Select file type
$imageFileType = strtolower(pathinfo($filename3,PATHINFO_EXTENSION));
	
	// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension

 	// Upload files and store in database
move_uploaded_file($_FILES["gallery_banner"]["tmp_name"],'upload/'.$filename3);

// $stmt = $classhelper->db_con->prepare("INSERT INTO `aboutus_tb`(`content`,`image`, `date`) VALUES (:content,:imgData,'$today')");


$filename4 = $_FILES['donation_banner']['name'];

	// Select file type
$imageFileType = strtolower(pathinfo($filename3,PATHINFO_EXTENSION));
	
	// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension

 	// Upload files and store in database
move_uploaded_file($_FILES["donation_banner"]["tmp_name"],'upload/'.$filename4);

// $stmt = $classhelper->db_con->prepare("INSERT INTO `aboutus_tb`(`content`,`image`, `date`) VALUES (:content,:imgData,'$today')");


$filename5 = $_FILES['contact_banner']['name'];

	// Select file type
$imageFileType = strtolower(pathinfo($filename3,PATHINFO_EXTENSION));
	
	// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension

 	// Upload files and store in database
move_uploaded_file($_FILES["contact_banner"]["tmp_name"],'upload/'.$filename5);

// $stmt = $classhelper->db_con->prepare("INSERT INTO `aboutus_tb`(`content`,`image`, `date`) VALUES (:content,:imgData,'$today')");

$filename6 = $_FILES['joinus_banner']['name'];

	// Select file type
$imageFileType = strtolower(pathinfo($filename3,PATHINFO_EXTENSION));
	
	// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
	// Check extension

 	// Upload files and store in database
move_uploaded_file($_FILES["joinus_banner"]["tmp_name"],'upload/'.$filename6);


if(!empty($_FILES['about_banner']['name'])){
  $studentQuery = "UPDATE banner_tb SET about_banner='$filename1' WHERE id='$id' ";
  $result = $classhelper->db_con->query($studentQuery);
}

if(!empty($_FILES['activity_banner']['name'])){
  $studentQuery = "UPDATE banner_tb SET acivity_banner='$filename2' WHERE id='$id' ";
  $result = $classhelper->db_con->query($studentQuery);
}


if(!empty($_FILES['gallery_banner']['name'])){
  $studentQuery = "UPDATE banner_tb SET galley_banner='$filename3' WHERE id='$id' ";
  $result = $classhelper->db_con->query($studentQuery);
}

if(!empty($_FILES['donation_banner']['name'])){
  $studentQuery = "UPDATE banner_tb SET donation_banner='$filename4' WHERE id='$id' ";
  $result = $classhelper->db_con->query($studentQuery);
}
    
if(!empty($_FILES['contact_banner']['name'])){
  $studentQuery = "UPDATE banner_tb SET contact_banner='$filename5' WHERE id='$id' ";
  $result = $classhelper->db_con->query($studentQuery);
}

if(!empty($_FILES['joinus_banner']['name'])){
  $studentQuery = "UPDATE banner_tb SET joinus_banner='$filename6' WHERE id='$id' ";
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
            <div class="card-header">
                <h3 class="card-title">Manage Banner</h3>

               <div class="card-body">
              


              <?php
             

              $stmt = $classhelper->db_con->prepare("SELECT * FROM `banner_tb` order by id desc");
              $stmt->execute();
              $users = $stmt->fetchAll();
                  foreach($users as $user)
                  {
                      $portfolioid=$user['id'];
                      $about_banner=$user['about_banner'];
                      $acivity_banner=$user['acivity_banner'];
                      $gallery_banner=$user['galley_banner'];
                      $donation_banner=$user['donation_banner'];
                      $contact_banner=$user['contact_banner'];
                      $joinus_banner=$user['joinus_banner'];
                  }
              ?>
       
            <div class="modal-header">
            
              
            </div>
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">


              
          
               
                  <div class="form-group">
                         <label for="exampleInputFile">About Banner</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="about_banner" class="custom-file-input"  accept=".jpg, .png, .jpeg, .gif|image/*" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                     </div>
                 <br>
                    <div class="form-group">
                      <img src="upload/<?php echo $about_banner; ?>"width="20%">
                        </div>
                        
                        
                    </div>


                    <div class="form-group">
                         <label for="exampleInputFile">Activity Banner</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="activity_banner" class="custom-file-input"  accept=".jpg, .png, .jpeg, .gif|image/*" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                     </div>
                 <br>
                    <div class="form-group">
                      <img src="upload/<?php echo $acivity_banner; ?>"width="20%">
                        </div>
                        
                        
                    </div>



                    <div class="form-group">
                         <label for="exampleInputFile">Gallery Banner</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="gallery_banner" class="custom-file-input"  accept=".jpg, .png, .jpeg, .gif|image/*" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                     </div>
                    <br>
                    <div class="form-group">
                      <img src="upload/<?php echo $gallery_banner; ?>"width="20%">
                        </div>
                        
                        
                    </div>


                    <div class="form-group">
                         <label for="exampleInputFile">Donation Banner</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="donation_banner" class="custom-file-input"  accept=".jpg, .png, .jpeg, .gif|image/*" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                     </div>
                    <br>
                    <div class="form-group">
                      <img src="upload/<?php echo $donation_banner; ?>"width="20%">
                        </div>
                        
                        
                    </div>
                    <div class="form-group">
                         <label for="exampleInputFile">Contact Banner</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="contact_banner" class="custom-file-input"  accept=".jpg, .png, .jpeg, .gif|image/*" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                     </div>
                     <br>
                    <div class="form-group">
                      <img src="upload/<?php echo $contact_banner; ?>"width="20%">
                        </div>
                        
                        
                    </div>


                    <div class="form-group">
                          <label for="exampleInputFile">Joinus Banner</label>
                    <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="joinus_banner" class="custom-file-input"  accept=".jpg, .png, .jpeg, .gif|image/*" >
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>

                    </div>
                  </div>

                   <br>
                    <div class="form-group">
                      <img src="upload/<?php echo $joinus_banner; ?>"width="20%">
                        </div>
                   </div>


                  
                    
                   <input type="hidden"name="sourceid"value="<?php echo $portfolioid; ?>">


            <div class="modal-footer">
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


