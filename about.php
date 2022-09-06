<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include "inc/link.php"; ?>
</head>
<body>

    <?php include "inc/header.php"; ?>


<div class="page-title-area title-bg-one">
<div class="d-table">
<div class="d-table-cell">
<div class="container">
<div class="title-item">
<h2>About</h2>
<ul>
<li>
<a href="index.html">Home</a>
</li>
<li>
<span>About</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<style>
    .title-bg-one {
    background-image: url(assets/img/81786506_2659081867656015_7141842915969466368_o.jpg);
}
</style>

<div class="about-area pt-100 pb-70">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="about-img">
<img src="assets/img/WhatsApp%20Image%202021-03-25%20at%2012.30.45%20PM.jpeg" alt="About">
</div>
</div>
<div class="col-lg-6">
<div class="about-content">
<div class="section-title">
<span class="sub-title">About us</span>
<h2>About Anchal</h2>
</div>

<?php


$stmt = $classhelper->db_con->prepare("SELECT * FROM `aboutus_tb` order by id desc");


	$stmt->execute();


		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row);
                           $portfolioid=$id;
                           $content=$content;
                        
                          
                          
				}
				
                          
                          ?>
                          
                          
<p>
    <?php echo $content; ?>
</p>
</div>
</div>
</div>
</div>
</div>






<?php 


$stmt2 = $classhelper->db_con->prepare("SELECT * FROM `team_tb` order by id desc");


	$stmt2->execute();
	
	$count2=$stmt2->rowcount();
	
	if($count2>0){
	?>

<section class="team-area pb-70">
<div class="container">
<div class="section-title">
<span class="sub-title">Team</span>
<h2>Meet our Awesome Team Memebers</h2>
<!--<p>We exist for non-profits, social enterprises, community groups, activists,lorem politicians and individual citizens that are making.</p>-->
</div>
<div class="row">
        <?php



		while($row2=$stmt2->fetch(PDO::FETCH_ASSOC))
				{

						   extract($row2);
                           $teamid=$id;
                           $teamname=$name;
                           $teamimage=$image;
                           $teamdesignation=$designation;
                          
                          $blogdate=$date;
                          
				
                          
                          ?>
<div class="col-sm-6 col-lg-4">
<div class="team-item">
<div class="top">
<img src="data:image/jpeg;base64,<?php echo base64_encode($teamimage); ?>" style="height:620px;object-fit:cover;" alt="Team">

</div>
<div class="bottom">
<h3><?php echo $teamname; ?></h3>
<span><?php echo $teamdesignation; ?></span>
</div>
</div>
</div>
<?php
}
?>

</div>
</div>
</section>
<?php
}
?>

<?php include "inc/footer.php"; ?>