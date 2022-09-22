<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include "inc/link.php"; ?>
    <style>
        #message{
            
            padding-top: 16px;
    padding-left: 48px !important;
        }
    </style>
</head>
<body>

    <?php include "inc/header.php"; ?>

    <?php
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `banner_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        
?>
<style>
   .title-bg-eight {
    background-image:url(admin/upload/<?php echo $joinus_banner; ?>)!important;
}
</style>
<div class="page-title-area title-bg-eight" >
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2>Join Us</h2>
<ul>
<li>
<a href="<?php echo $base_url; ?>">Home</a>
</li>
<li>
<span>Join Us</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>



<div class="contact-area pb-70">
<div class="container">
   
<form action="" method="post" id="contactForm" enctype="multipart/form-data">
     <?php
                        if($_POST){
                        if(isset($_POST['addbtn'])){

  try{
  
  $name=htmlspecialchars($_POST['name']);
  $blood=htmlspecialchars($_POST['blood']);
  $phone=htmlspecialchars($_POST['phone']);
  $dob=htmlspecialchars($_POST['dob']);
  $address=htmlspecialchars($_POST['address']);
  
  $today= date('Y-m-d H:i:s');
  
       $pfstudentpic = $_FILES['documentsproof']['name'];
                
            $ptempstudentpic = explode(".", preg_replace("/[^A-Za-z0-9_. ]/","",$_FILES['documentsproof']['name']));
            $pnewfilename = $ptempstudentpic[0]. '.' . end($ptempstudentpic);
            $pfimagename = $pnewfilename;
            $imageurl=$base_url."/documents/".$pfimagename;
        
  
  $stmt = $classhelper->db_con->prepare("INSERT INTO `joinus_tb`(`name`, `blood`, `phone`, `dob`, `address`, `documentsproof`, `date`) VALUES  (:name,:blood,:phone,:dob,:address,:documentsproof,'$today')");
  
  $stmt->bindParam(":name",$name);
  $stmt->bindParam(":blood",$blood);
  $stmt->bindParam(":phone",$phone);
  $stmt->bindParam(":dob",$dob);
  $stmt->bindParam(":address",$address);
  $stmt->bindParam(":documentsproof",$imageurl);
  
  
  
  
  if($stmt->execute()){
  
       move_uploaded_file($_FILES['documentsproof']['tmp_name'], 'documents/'.$pnewfilename);
  
  ?>
  
  <div class="alert alert-success">
  <strong>Congratulations !</strong> Send  Successfully We'll get back to you soon.
  </div>
  
  
  <?php
  
  
  }else{
  
  
  ?>
  
  
  <div class="alert alert-danger">
  <strong>Failed</strong>Your Query Not Send Successfully Please Try Again.
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
  
  ?><br/><br/>
<h2>Join Us...!</h2>
<p>Feel free to contact us today</p>
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-user-alt-3"></i>
</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-ui-email"></i>
</label>
<input type="text" name="blood" id="email" class="form-control" placeholder="Blood Group" required data-error="Please enter Blood Group">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-ui-call"></i>
</label>
<input type="text" name="phone" id="phone_number" placeholder="Phone" required data-error="Please enter your number" class="form-control">
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>
<i class="icofont-ui-calendar"></i>
</label>
<input type="date" name="dob" id="phone_number" placeholder="Date of birth" required data-error="Please enter Date of birth" class="form-control">
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-lg-12">
<div class="form-group">
<label>
<i class="icofont-comment"></i>
</label>
<textarea name="address" class="form-control" id="address" cols="30" rows="8" placeholder="Enter your Address" required data-error="Enter your Address"></textarea>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>
<i class="icofont-file-alt"></i>
</label>
<input type="file" name="documentsproof" class="form-control" id="message" cols="30" rows="8" placeholder="Documents proof of identity" required data-error=""></textarea>
<div class="help-block with-errors"></div>
</div>
</div>
<div class="col-lg-12">
<button type="submit" name="addbtn" class="btn common-btn">
Join Now
</button>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="clearfix"></div>
</div>
</div>
</form>
</div>
</div>


<?php include "inc/footer.php"; ?>