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


<div class="page-title-area title-bg-thirteen" style="background-image:url('assets/img/72444532_2567562780141258_2637366355061374976_o.jpg');">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2>Donation</h2>
<ul>
<li>
<a href="index.html">Home</a>
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


<div class="rules-area ptb-100">
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
                        
               
                          
                          ?>
<h3><?php echo $title; ?></h3>
<p><?php echo $description; ?></p>
<?php

}
?>
</div>
</div>
</div>


<?php include "inc/footer.php"; ?>