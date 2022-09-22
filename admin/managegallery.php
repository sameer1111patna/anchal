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
            <h1 class="m-0">Manage Gallery</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Gallery</li>
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
  
    $title1=htmlspecialchars($_POST['title']);

 

    $sourceid=base64_decode($_POST['sourceid']);
    
    $today= date('Y-m-d H:i:s');

     
       $today= date('Y-m-d H:i:s');


    if(!empty($_FILES['image']['name'])){
     
      $imgData = (file_get_contents($_FILES['image']['tmp_name']));

      $stmt = $classhelper->db_con->prepare("UPDATE `gallery_tb` SET `title`=:title,`image`=:image where `id`=:sourceid");
      $stmt->bindParam(":image",$imgData);

    }else{


      $stmt = $classhelper->db_con->prepare("UPDATE `gallery_tb` SET `title`=:title where `id`=:sourceid");

    }


  
  
  
  $stmt->bindParam(":title",$title1);




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
  
  $title=htmlspecialchars($_POST['title']);


  
  $today= date('Y-m-d H:i:s');

  $filename = $_FILES['image']['name'];
	
    // Select file type
    $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    
    // valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");
   
    // Check extension
  
     // Upload files and store in database
  move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename);
  
  $stmt = $classhelper->db_con->prepare("INSERT INTO `gallery_tb`(`title`, `image`,`date`) VALUES (:title,:imgData,'$today')");
  
  $stmt->bindParam(":title",$title);


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
                <h3 class="card-title">Manage Activity</h3>

            
                <button type="button" style="float:right;"  data-toggle="modal" data-target="#addmodal" class="btn bg-gradient-primary btn-lg"><i class="fa fa-plus"></i></button>
             <!--Add Modal-->
             <div class="modal fade" id="addmodal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Activity </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
          
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                  </div>
                
                 
                  <div class="form-group">
                    <label for="exampleInputFile">Feature Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile"accept=".jpg, .png, .jpeg, .gif|image/*" >
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
              <h4 class="modal-title" >Edit Blog for <span id="edittxt"></span></h4>
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
            <input type="hidden" name="tbname" value="<?php echo base64_encode('gallery_tb'); ?>">
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
                    <th>Title</th>
                    <th>Image</th>
                  
                    <th>Date</th>
                  
                   <th>Manage</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=1;
                  $stmt = $classhelper->db_con->prepare("SELECT * FROM `gallery_tb` order by id desc");
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {

                      extract($row);
                        $portfolioid=$id;
                        $portfoliotitle=$title;
                        $portfolioimage=$image;
                        $blogdate=$date;
                       
                        
                    ?>

                    
                    <tr>
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $title ; ?></td>
                    <td><img src="upload/<?php echo $portfolioimage;?>" width="50px;"></td>
                    <td><?php echo $blogdate;?></td>
                    <td>   
                    <a href="edit-gallery.php?id=<?php echo $portfolioid;?>"class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>  
                    <a href="delete.php?id=gallery&action=<?php echo $portfolioid;?>"class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Want To Delete This ?')"><i class="fa fa-trash"></i></a>
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
                    <th>Title</th>
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


