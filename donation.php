<!DOCTYPE html>
<html lang="zxx">

<head>
<?php include "inc/link.php"; ?>
</head>
<body>

<div class="loader">
<div class="d-table">
<div class="d-table-cell">
<div class="pre-box-one">
<div class="pre-box-two"></div>
</div>
</div>
</div>
</div>


<?php include "inc/header.php"; ?>

<?php
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `banner_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        
?>
<style>
   .title-bg-thirteen {
    background-image:url(admin/upload/<?php echo $donation_banner; ?>)!important;
}
</style>


<div class="page-title-area title-bg-thirteen" style="background-image:url('assets/img/72444532_2567562780141258_2637366355061374976_o.jpg');">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2>Donation</h2>
<ul>
<li>
<a href="<?php echo $base_url; ?>">Home</a>
</li>
<li>
<span>Donation</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class=" ptb-100">
<div class="container">
<div class="rules-item">
    
<?php
$stmt = $classhelper->db_con->prepare("SELECT * FROM `donation_tb` order by id desc");


	$stmt->execute();


		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row);
                           $portfolioid=$id;
                           $title=$title;
                           $description=$description;
                           $image=$image;
                        
               
                          
                          ?>
<h3 class="text-center"><?php echo $title; ?></h3>
<div class="row">
    <div class="col-md-6">
        <img src="admin/upload/<?php echo $image; ?>" width="100%">
   </div>
   <div class="col-md-6">
        <p><?php echo $description; ?></p>
   </div>
</div>

<?php

}
?>
</div>
</div>
</div>


<?php include "inc/footer.php"; ?>