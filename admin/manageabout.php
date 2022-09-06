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
              <li class="breadcrumb-item active">Manage About Us Conten</li>
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
                <h3 class="card-title">Manage About Us</h3>

            



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
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>Id</th>
                      <th>Description</th>
                    <th>Date</th>
                  <th>Manage</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  
                </tbody>
                <tfoot>
                <tr>
                 <th>Id</th>
                      <th>Description</th>
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

<script>
  var tablex;
$(document).ready(function() {
   tablex = $('#example1').DataTable( {
      "responsive": true, "lengthChange": true, "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "columnDefs": [{ 'targets': [0], 'visible': false },{"render": function createManageBtn(data, type, row) {


return '<button id="manageBtn" type="button" onclick="edit(this,'+row['DT_RowId']+')" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>';
}, "data": null, "targets": [3]}],
        
        "ajax": $.fn.dataTable.pipeline( {
            url: '<?php echo $admin_base_url; ?>/exec/fetch_about/',
            pages: 5 // number of pages to cache
        } )
    } );

      
     

      });

      function edit(el,row) {
        var indx= $(row).index();
        
        var data_row = tablex.rows(indx).data().toArray();

      
       
var totalelement=data_row[0].length;



$('#contentx').children().remove();

$('#contentx').append(`<input type="hidden" name="sourceid" value="${btoa(data_row[0][0])}"><div class="form-group"> <label for="exampleInputEmail1">Description</label> <textarea name="description" class="form-control ckeditor"  id="exampleInputEmail1" placeholder="Enter Description">${data_row[0][1]}</textarea> </div> `);
CKEDITOR.replaceAll( 'ckeditor' ); 
$('#editmodal').modal('show');

        }
  
     
             if ( window.history.replaceState ) {
       window.history.replaceState( null, null, window.location.href );
     }
    </script>
