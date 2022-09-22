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
<?php include "inc/menu.php";

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Edit Slider</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Edit Slider</li>
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
  
$title=$_POST['title'];



$sub_title=$_POST['sub_title'];

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

  $studentQuery = "UPDATE slider_tb SET title='$title', sub_title='$sub_title',date='$today',image='$filename' WHERE id='$id' ";
  $result = $classhelper->db_con->query($studentQuery);

}
else
{
  $studentQuery = "UPDATE slider_tb SET title='$title', sub_title='$sub_title',date='$today' WHERE id='$id'";
  $result = $classhelper->db_con->query($studentQuery);
}     
if($result){
  
?>
  
  <!-- <div class="alert alert-success">
  <strong>Congratulations !</strong> Activity Added Successfully.
  </div> -->
<?php
  header("Location:manageslider.php?status=update"); 
  ?>

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
                <h3 class="card-title">Manage Activity</h3>

               <div class="card-body">
           

<?php
  $sliderid=$_GET['id'];

$stmt = $classhelper->db_con->prepare("SELECT * FROM `slider_tb` WHERE id=$sliderid");
$stmt->execute();
$users = $stmt->fetchAll();
    foreach($users as $user)
    {
        $title=$user['title'];
        $sub_title=$user['sub_title'];
        $image=$user['image'];
        $portfolioid=$user['id'];
      

    }
?>
       
            <div class="modal-header">
            
              
            </div>
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">


                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title"value="<?php echo $title ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                  </div>
          
               
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
                      <img src="upload/<?php echo $image; ?>"width="20%">
                        </div>
                        <input type="hidden"name="sourceid"value="<?php echo $portfolioid; ?>">
                        
                    </div>


                    <div class="form-group">
                    <label for="exampleInputEmail1">Sub Title</label>
                    <input type="text" name="sub_title"value="<?php echo $sub_title ?>"class="form-control" id="exampleInputEmail1" placeholder="Enter Sub Title">
                  </div>

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


