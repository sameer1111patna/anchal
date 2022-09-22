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
            <h1 class="m-0">Manage Team</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Team</li>
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

  if(isset($_POST['delete_btn'])){
$validx=$classhelper->deletecontent($_POST['img'],$_POST['tbname'],$_POST['sourceid'],'image');


if($validx){

  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Gallery Deleted Successfully.
  </div>
  
  
  <?php
  
}else{


  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Gallery Not Deleted Please Try Again.
  </div>
  
  <?php

}

  }

if(isset($_POST['updatebtn'])){

  try{
  
    $name1=htmlspecialchars($_POST['name']);
    $designation=htmlspecialchars($_POST['designation']);

 

    $sourceid=base64_decode($_POST['sourceid']);
    
    $today= date('Y-m-d H:i:s');

     
       $today= date('Y-m-d H:i:s');


    if(!empty($_FILES['image']['name'])){
     
      $imgData = (file_get_contents($_FILES['image']['tmp_name']));

      $stmt = $classhelper->db_con->prepare("UPDATE `team_tb` SET `name`=:name,`designation`=:designation,`image`=:image where `id`=:sourceid");
      $stmt->bindParam(":image",$imgData);

    }else{


      $stmt = $classhelper->db_con->prepare("UPDATE `team_tb` SET `name`=:name,`designation`=:designation where `id`=:sourceid");

    }


  
  
  
  $stmt->bindParam(":name",$name1);
  $stmt->bindParam(":designation",$designation);




  $stmt->bindParam(":sourceid",$sourceid);
  
  
  
  if($stmt->execute()){
  
  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Gallery Updated Successfully.
  </div>
  
  
  <?php
  
  
  }else{
  
  
  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Gallery Update Failed Please Try Again.
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
if(isset($_POST['addbtn'])){

  try{
  
  $name=htmlspecialchars($_POST['name']);
  $designation=htmlspecialchars($_POST['designation']);


  
  $today= date('Y-m-d H:i:s');

  $filename = $_FILES['image']['name'];
	
  // Select file type
  $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  
  // valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");
 
  // Check extension

   // Upload files and store in database
move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename);

  
  $stmt = $classhelper->db_con->prepare("INSERT INTO `team_tb`(`name`,`designation`,`image`,`date`) VALUES (:name,:designation,:imgData,'$today')");
  
  $stmt->bindParam(":name",$name);
  $stmt->bindParam(":designation",$designation);


  $stmt->bindParam(":imgData",$filename);
  
  
  
  
  if($stmt->execute()){
  
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

}

?>
              <div class="card-header">
                <h3 class="card-title">Manage Team</h3>

            
                <button type="button" style="float:right;"  data-toggle="modal" data-target="#addmodal" class="btn bg-gradient-primary btn-lg"><i class="fa fa-plus"></i></button>
             <!--Add Modal-->
             <div class="modal fade" id="addmodal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Team </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
          
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputEmail1" placeholder="Enter Designation">
                  </div>
                
                 
                  <div class="form-group">
                    <label for="exampleInputFile">Feature Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
                 
               
               
                  
             
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="addbtn" class="btn btn-primary">Save changes</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

             <!--Add Modal Ends-->



               <!--Edit Modal-->
               <div class="modal fade" id="editmodal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" >Edit Team for <span id="edittxt"></span></h4>
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

             <!---Delete Modal stars-->

             <div class="modal fade" id="deletemodal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Are You Sure Want To Delete This ?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            
            <div class="modal-footer">
            <form method="post"> 
            <input type="hidden" name="img" value="<?php echo base64_encode('1'); ?>">
            <input type="hidden" name="tbname" value="<?php echo base64_encode('team_tb'); ?>">
            <div id="delcontent"></div>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
              <button type="submit" name="delete_btn" class="btn btn-outline-success">Yes</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
             <!--Delete Modal ends-->




             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Image</th>
                  
                    <th>Date</th>
                  
                   <th>Manage</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=1;
                  $stmt = $classhelper->db_con->prepare("SELECT * FROM `team_tb` order by id desc");
                    $stmt->execute();
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                      {
                        extract($row);
		                      
                          
			                ?>
                    <tr>
                      <td><?php echo $i ; ?></td>
                      <td><?php echo $name ; ?></td>
                      <td><?php echo $designation; ?></td>
                      <td><img src="upload/<?php echo $image;?>" width="50px;"></td>
                     
                      <td><?php echo $date;?></td>
                      <td><a href="edit-team.php"class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                         <a href="delete.php?id=team&action=<?php echo $id;?>" onclick="return confirm('Are You Sure Want To Delete This ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
                      
                    </tr>

                    <?php
                    $i++;
                    }
                    ?>
                </tbody>
                <tfoot>
                <tr>
               <th>Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Image</th>
                  
                    <th>Date</th>
                  
                   <th>Manage</th>
                </tr>
                </tfoot>
              </table>
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


