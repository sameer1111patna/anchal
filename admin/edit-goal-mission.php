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
            <h1 class="m-0">Edit goal mission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit goal mission</li>
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

$icon=$_POST['icon'];

$description=$_POST['description'];
	
$studentQuery = "UPDATE goal_mission SET title='$title', icon='$icon',description='$description' WHERE id='$id'";
  
$result = $classhelper->db_con->query($studentQuery);
    
if($result){
  
?>
  
  <!-- <div class="alert alert-success">
  <strong>Congratulations !</strong> Activity Added Successfully.
  </div> -->
<?php
  header("Location:goal-mission.php?status=update"); 
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
    <h3 class="card-title">Manage Edit goal mission</h3>
<div class="card-body">
<?php
$sliderid=$_GET['id'];
$stmt = $classhelper->db_con->prepare("SELECT * FROM `goal_mission` WHERE id=$sliderid");
$stmt->execute();
$users = $stmt->fetchAll();
    foreach($users as $user)
    {
        $title=$user['title'];
        $icon=$user['icon'];
        $description=$user['description'];
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
                        <label for="exampleInputEmail1">Icon</label>
                        <input type="icon"name="icon"class="form-control"value="<?php echo $icon; ?>">
                        <input type="hidden"name="sourceid"value="<?php echo $portfolioid; ?>">
                        
                 </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description"class="form-control"><?php echo $description; ?> </textarea>
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


