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
            <h1 class="m-0">Manage Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Contact</li>
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
if($_POST){
if(isset($_POST['addbtn'])){

  try{
  
   $description1=$_POST['description1'];
   $description2=$_POST['description2'];
   $description3=$_POST['description3'];

   $id=$_POST['sourceid'];
    
  
   $studentQuery = "UPDATE  footer_tb SET description1='$description1', description2='$description2',description3='$description3' WHERE id='$id' ";
   $result = $classhelper->db_con->query($studentQuery);
  
   if($result){
  
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
                  $stmt = $classhelper->db_con->prepare("SELECT * FROM `footer_tb` order by id desc");
                  $stmt->execute();
                   $row=$stmt->fetch(PDO::FETCH_ASSOC);
                  extract($row);
                           $portfolioid=$id;
                           
                           
			          ?>
       
            <div class="modal-header">
              <h4 class="modal-title">Add  contact </h4>
              
            </div>
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
          
            <div class="form-group">
               <label for="exampleInputEmail1">Description 1</label>
               <textarea name="description1" class="form-control ckeditor" id="exampleInputEmail1" placeholder="Enter Description"><?php echo $description1;  ?></textarea>
              
            </div>
              
            <div class="form-group">
               <label for="exampleInputEmail1">Description 2</label>
               <textarea name="description2" class="form-control ckeditor" id="exampleInputEmail1" placeholder="Enter Description"><?php echo $description2;  ?></textarea>
              
            </div>
           
            <div class="form-group">
               <label for="exampleInputEmail1">Description 3</label>
               <textarea name="description3" class="form-control ckeditor" id="exampleInputEmail1" placeholder="Enter Description"><?php echo $description3;  ?></textarea>
              
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


