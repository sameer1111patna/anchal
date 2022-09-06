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
            <h1 class="m-0">Header Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Header Menu</li>
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
  <strong>Congratulations !</strong> Header Menu Deleted Successfully.
  </div>
  
  
  <?php
  
}else{


  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Header Menu Not Deleted Please Try Again.
  </div>
  
  <?php

}

  }

if(isset($_POST['updatebtn'])){

  try{
  
  $title=htmlspecialchars($_POST['title']);
  $p_id=htmlspecialchars($_POST['p_id']);
  $pagename=htmlspecialchars($_POST['pagename']);

  if(empty($p_id)){

    $p_id='0';
  }
  $sourceid=base64_decode($_POST['sourceid']);

  $str = preg_replace("/[^A-Za-z0-9 ]/", '', $pagename);
  $pagename=str_replace(' ', '-', strtolower($str));
  
  
  $stmt = $classhelper->db_con->prepare("UPDATE `headermenu_tb` SET `title`=:title , `p_id`=:p_id,`pagename`=:pagename where `id`=:sourceid");
  
  $stmt->bindParam(":title",$title);
  $stmt->bindParam(":p_id",$p_id);
  $stmt->bindParam(":pagename",$pagename);

  $stmt->bindParam(":sourceid",$sourceid);
  
  
  
  if($stmt->execute()){
  
  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Header Menu Updated Successfully.
  </div>
  
  
  <?php
  
  
  }else{
  
  
  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Header Menu Update Failed Please Try Again.
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
  $p_id=htmlspecialchars($_POST['p_id']);
  $pagename=htmlspecialchars($_POST['pagename']);
  
  $today= date('Y-m-d H:i:s');

  $str = preg_replace("/[^A-Za-z0-9 ]/", '', $pagename);
  $pagename=str_replace(' ', '-', strtolower($str));
  
  $stmt = $classhelper->db_con->prepare("INSERT INTO `headermenu_tb`(`title`, `p_id`, `order_id`, `date`,`pagename`) VALUES (:title,:p_id,'0','$today',:pagename)");
  
  $stmt->bindParam(":title",$title);
  $stmt->bindParam(":p_id",$p_id);
  $stmt->bindParam(":pagename",$pagename);
  
  
  
  
  if($stmt->execute()){
  
  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Header Menu Added Successfully.
  </div>
  
  
  <?php
  
  
  }else{
  
  
  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Header Menu not Added Successfully Please Try Again.
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
                <h3 class="card-title">Header Menu</h3>
                
                <button type="button" style="float:right;"  data-toggle="modal" data-target="#addmodal" class="btn bg-gradient-primary btn-lg"><i class="fa fa-plus"></i></button>
             <!--Add Modal-->
             <div class="modal fade" id="addmodal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Header Menu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
          
               
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Parent Menu</label>
                    <select name="p_id" class="form-control" id="exampleInputEmail1">
                       <option selected disabled>Select Parent Menu</option>
                       <option value="0">Make Parent Menu</option>
<?php


$stmtx = $classhelper->db_con->prepare("SELECT * FROM `headermenu_tb` where `p_id`='0' ");


	$stmtx->execute();

		

		while($row5=$stmtx->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row5);
                           $catid=$id;
						   $cattitle=$title;



				

?>

<option value="<?php echo $catid; ?>"><?php echo $cattitle; ?></option>

<?php


                }
?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Pagename</label>
                    <input type="text" name="pagename" class="form-control" id="exampleInputEmail1" placeholder="Enter Pagename">
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
              <h4 class="modal-title" >Edit Header Menu for <span id="edittxt"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="post">
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
            <form action="" method="post"> 
            <input type="hidden" name="img" value="<?php echo base64_encode('0'); ?>">
            <input type="hidden" name="tbname" value="<?php echo base64_encode('headermenu_tb'); ?>">
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
                    <th>pid</th>
                    <th>Parent Menu</th>
                    <th>Date</th>
                    <th>Pagename</th>
                    <th>Manage</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  
                </tbody>
                <tfoot>
                <tr>
                <th>Id</th>
                <th>Title</th>
                <th>pid</th>
                    <th>Parent Menu</th>
                    <th>Date</th>
                    <th>Pagename</th>
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

<script>
  var tablex;
$(document).ready(function() {
   tablex = $('#example1').DataTable( {
      "responsive": true, "lengthChange": true, "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "columnDefs": [{ 'targets': [0,2], 'visible': false },{"render": function createManageBtn(data, type, row) {


return '<button id="manageBtn" type="button" onclick="edit(this,'+row['DT_RowId']+')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button><button id="delBtn" type="button" onclick="deletecon(this,'+row[0]+')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
}, "data": null, "targets": [6]}],
        
        "ajax": $.fn.dataTable.pipeline( {
            url: '<?php echo $admin_base_url; ?>/exec/fetch_header_menu/',
            pages: 5 // number of pages to cache
        } )
    } );

      

      });

      function edit(el,row) {
        var indx= $(row).index();
        
        var data_row = tablex.rows(indx).data().toArray();

      
       
var totalelement=data_row[0].length;

$('#edittxt').text(data_row[0][1]);

$('#contentx').children().remove();

$('#contentx').append(`<input type="hidden" name="sourceid" value="${btoa(data_row[0][0])}"><div class="form-group"><label for="exampleInputEmail1">Title</label><input type="text" name="title" value="${data_row[0][1]}" class="form-control" id="exampleInputEmail1" placeholder="Enter Title"></div><div class="form-group"> <label for="selecteditcat">Category</label> <select name="p_id" class="form-control" id="selecteditcat" placeholder="Enter Title"> <option selected disabled>Select parent Menu</option><option value="0" ${data_row[0][2]==='0' ? 'selected' : ''}>Make Parent</option> <?php $stmtx5 = $classhelper->db_con->prepare("SELECT * FROM `headermenu_tb` where `p_id`='0' "); $stmtx5->execute(); while($rowx5=$stmtx5->fetch(PDO::FETCH_ASSOC)) { extract($rowx5); $catidx=$id; $cattitlex=$title; ?> <option value="<?php echo $catidx; ?>" ${data_row[0][2]==='<?php echo $catidx; ?>' ? 'selected' : ''}><?php echo $cattitlex; ?></option> <?php } ?> </select> </div><div class="form-group"><label for="exampleInputEmail1">Title</label><input type="text" name="pagename" value="${data_row[0][5]}" class="form-control" id="exampleInputEmail1" placeholder="Enter Pagename"></div>`);
        
$('#editmodal').modal('show');

        }
        function deletecon(ex,deleteid){
     


     $('#delcontent').children().remove();
     
     $('#delcontent').append('<input type="hidden" name="sourceid" value="'+btoa(deleteid)+'">');
             
     $('#deletemodal').modal('show');
     
             }
     
             if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
     }
    </script>
