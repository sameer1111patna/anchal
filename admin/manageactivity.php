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
            <h1 class="m-0">Manage Activity</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Activity</li>
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
  <strong>Congratulations !</strong> Activity Deleted Successfully.
  </div>
  
  
  <?php
  
}else{


  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Activity Not Deleted Please Try Again.
  </div>
  
  <?php

}

  }

if(isset($_POST['updatebtn'])){

  try{
  
    $title1=htmlspecialchars($_POST['title']);

    $description1=$_POST['description'];

    $sourceid=base64_decode($_POST['sourceid']);
    
    $today= date('Y-m-d H:i:s');
  
    $str = preg_replace("/[^A-Za-z0-9 ]/", '', $title1);
    $pagename1=str_replace(' ', '-', strtolower($str));
     
       $today= date('Y-m-d H:i:s');

       $stm2t1 = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` where `title`=:title AND `id`=:sourceid");
  
       $stm2t1->bindParam(":title",$title);
       $stm2t1->bindParam(":sourceid",$sourceid);
       
            $stm2t1->execute();
           $countblog1=$stm2t1->rowcount();

           if($countblog1=='0'){
  
       $stm2t = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` where `title`=:title");
  
       $stm2t->bindParam(":title",$title);
  
       $stm2t->execute();
       
       $countblog=$stm2t->rowcount();
  
      if($countblog>'0'){
  
        $pagename1=$pagename1.'-'.$countblog;
      }
    }

    if(!empty($_FILES['image']['name'])){
     
      $imgData = (file_get_contents($_FILES['image']['tmp_name']));

      $stmt = $classhelper->db_con->prepare("UPDATE `activity_tb` SET `title`=:title,`image`=:image,`description`=:description,`pagename`=:pagename1 where `id`=:sourceid");
      $stmt->bindParam(":image",$imgData);

    }else{


      $stmt = $classhelper->db_con->prepare("UPDATE `activity_tb` SET `title`=:title,`description`=:description,`pagename`=:pagename1 where `id`=:sourceid");

    }


  
  
  
  $stmt->bindParam(":title",$title1);

  $stmt->bindParam(":description",$description1);

  $stmt->bindParam(":pagename1",$pagename1);

  $stmt->bindParam(":sourceid",$sourceid);
  
  
  
  if($stmt->execute()){
  
  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Activity Updated Successfully.
  </div>
  
  
  <?php
  
  
  }else{
  
  
  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Activity Update Failed Please Try Again.
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

  
  $stmt = $classhelper->db_con->prepare("INSERT INTO `activity_tb`(`title`, `image`, `description`, `date`) VALUES (:title,:imgData,:description,'$today')");
  
  $stmt->bindParam(":title",$title);

  $stmt->bindParam(":description",$description);

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
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile"accept="image/*"/>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control ckeditor" id="exampleInputEmail1" placeholder="Enter Description"></textarea>
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
              <h4 class="modal-title" >Edit Activity for <span id="edittxt"></span></h4>
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
            <input type="hidden" name="tbname" value="<?php echo base64_encode('activity_tb'); ?>">
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
                    <th>Description</th>
                    <th>Date</th>
                  
                    
                    <th>Status</th>
                   <th>Manage</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i=1;
                  $stmt = $classhelper->db_con->prepare("SELECT * FROM `activity_tb` order by id desc");
                  $stmt->execute();
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {

                      extract($row);
                        $portfolioid=$id;
                        $portfoliotitle=$title;
                        $portfolioimage=$image;
                        $sub_title=$description;
                        $blogdate=$date;
                       
                        $activestatus=$status;
                        
                    ?>
                  <tr>
                    <td><?php echo $i ; ?></td>
                    <td><?php echo $title ; ?></td>
                    <td><img src="upload/<?php echo $portfolioimage;?>" width="50px;"></td>
                    <td><?php echo $sub_title; ?></td>
                    <td><?php echo $blogdate;?></td>
                   
                    <td> 
                      <select name="status" class="form-select status_btnn " dataa-id="<?php echo $portfolioid ; ?>">
                        <?php $status=array("1"=>"Acite","0"=>"Deactive") ?>
                        <?php foreach($status as $key=>$status_change)
                         {
                           ?>
                        <?php
                        echo'<option value="'.$key.'"';if ($key==$activestatus){echo 'selected';}echo '>'.$status_change.'</option>';
                        ?>
                        <?php  }
                         ?>
                      </select>
                       </td>

                    <td><a href="edit-activity.php?id=<?php echo $portfolioid;?>"class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    
                    <a href="delete.php?id=activity&action=<?php echo $id;?>"class="btn btn-danger btn-sm"onclick="return confirm('Are You Sure Want To Delete This ?')"><i class="fa fa-trash"></i></a>
                    
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


      function edit(el,row) {
        var indx= $(row).index();
        
        var data_row = tablex.rows(indx).data().toArray();

      
       
var totalelement=data_row[0].length;

$('#edittxt').text(data_row[0][1]);

$('#contentx').children().remove();

$('#contentx').append(`<input type="hidden" name="sourceid" value="${btoa(data_row[0][0])}"><div class="form-group"> <label for="exampleInputEmail1">Title</label> <input type="text" name="title" class="form-control" value="${data_row[0][1]}" id="exampleInputEmail1" placeholder="Enter Title"> </div> <div class="form-group"> <label for="exampleInputFile">Feature Image</label> <div class="input-group"> <div class="custom-file"> <input type="file" name="image" class="custom-file-input" id="exampleInputFile"> <label class="custom-file-label" for="exampleInputFile">Choose file</label> </div> </div> </div> <div class="form-group"> <label for="exampleInputEmail1">Description</label> <textarea name="description" class="form-control ckeditor"  id="exampleInputEmail1" placeholder="Enter Description">${data_row[0][3]}</textarea> </div> `);
CKEDITOR.replaceAll( 'ckeditor' ); 
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



<script>
        $(document).ready(function() {
        $('.status_btnn').on('change', function() {
        var status = this.value;
      
        var id=$(this).attr('dataa-id');
      
        $.ajax({
        url: "status.php", 
        type: "POST",
        data: {
        status: status,
        id:id,
        _token: '{{csrf_token()}}' 
        },
        dataType : 'json',
        success: function(result){
        


window.location.replace("pagehere.html");      

        }
        });

        });    
        });
</script>


