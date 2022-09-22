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
            <h1 class="m-0">Manage Join us</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Join Us</li>
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
$validx=$classhelper->deletecontent($_POST['img'],$_POST['tbname'],$_POST['sourceid']);


if($validx){

  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Contact us Deleted Successfully.
  </div>
  
  
  <?php
  
}else{


  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Contact us Not Deleted Please Try Again.
  </div>
  
  <?php

}

  }


}

?>
              <div class="card-header">
                <h3 class="card-title">Manage Join Us</h3>

            
             




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
            <input type="hidden" name="img" value="<?php echo base64_encode('0'); ?>">
            <input type="hidden" name="tbname" value="<?php echo base64_encode('joinus_tb'); ?>">
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
                    <th>Blood group</th>
                    <th>Phone</th>
                   
                    <th>Date of birth</th>
                     <th>Address</th>
                     <th>Documents proof of identity</th>
                    <th>Date</th>
                    
                   <th>Manage</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=1;
                  $stmt = $classhelper->db_con->prepare("SELECT * FROM `joinus_tb` order by id desc");
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {

                      extract($row);
                        
                    ?>
                  <tr> 
                      <td><?php echo $i; ?></td>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $blood; ?></td>
                      <td><?php echo $phone; ?></td>
                      <td><?php echo $dob; ?></td>
                      <td><?php echo $address; ?></td>
                      <td><a href="<?php echo $documentsproof; ?>">PDF</a></td>
                      <td><?php echo $date; ?></td>
                      <td> <a href="delete.php?id=join&action=<?php echo $id;?>"class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Want To Delete This ?')"><i class="fa fa-trash"></i></a>
                    
                    </td>
                  </tr>
                  <?php $i++; } ?>
                  </tbody>
                <tfoot>
                <tr>
             <th>Id</th>
                    <th>Name</th>
                    <th>Blood group</th>
                    <th>Phone</th>
                   
                    <th>Date of birth</th>
                     <th>Address</th>
                     <th>Documents proof of identity</th>
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

