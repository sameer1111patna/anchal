<!--<div class="loader">
<div class="d-table">
<div class="d-table-cell">
<div class="pre-box-one">
<div class="pre-box-two"></div>
</div>
</div>
</div>
</div>-->
<style>
    .goog-te-gadget {
    font-family: arial;
    font-size: 11px;
    color: #fff;
    white-space: nowrap;
}
</style>

<div class="header-area">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="left">
<ul>
<li>
<?php
        $i=0;
        $stmt = $classhelper->db_con->prepare("SELECT * FROM `contactdetails_tb` order by id desc");
        $stmt->execute();
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
        $portfolioid=$id;
?>
<i class="icofont-location-pin"></i>
<a href="#"><?php echo $address; ?></a>
</li>
<li>
<i class="icofont-ui-call"></i>
<a href="tel:8327468420"><?php echo $phone; ?></a>
</li>
<li><div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> </li>
</ul>
</div>
</div>
<div class="col-lg-4">
<div class="right">
<ul>
<li>
<span>Follow Us:</span>
</li>
<li>
<a href="https://www.facebook.com/TeamAnchal" target="_blank">
<i class="icofont-facebook"></i>
</a>
</li>
<!--<li>
<a href="#" target="_blank">
<i class="icofont-twitter"></i>
</a>
</li>
<li>
<a href="#" target="_blank">
<i class="icofont-youtube-play"></i>
</a>
</li>
<li>
<a href="#" target="_blank">
<i class="icofont-instagram"></i>
</a>
</li>-->
</ul>
<!--<div class="language">
 <select>
<option>English</option>
<option>العربيّة</option>
<option>Deutsch</option>
<option>Português</option>
</select>
</div>-->
<!--<div class="header-search">
<i id="search-btn" class="icofont-search-2"></i>
<div id="search-overlay" class="block">
<div class="centered">
<div id="search-box">
<i id="close-btn" class="icofont-close"></i>
<form>
<input type="text" class="form-control" placeholder="Search..." />
<button type="submit" class="btn">Search</button>
</form>
</div>
</div>
</div>
</div>-->
</div>
</div>
</div>
</div>
</div>


<div class="navbar-area sticky-top">

<div class="mobile-nav">
<a href="<?php echo $base_url; ?>" class="logo">
<img src="<?php echo $base_url; ?>/anchal-logo-1.png" alt="Logo" >
</a>
</div>

<div class="main-nav">
<div class="container">
<nav class="navbar navbar-expand-md navbar-light">
<a class="navbar-brand" href="<?php echo $base_url; ?>">
<img src="<?php echo $base_url; ?>/anchal-logo-1.png" alt="Logo" style="width:150px">
</a>
<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
<ul class="navbar-nav">
<li class="nav-item">
<a href="<?php echo $base_url; ?>" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='index.php'){ ?>active<?php } ?>">Home</a>

</li>
<li class="nav-item">
<a href="<?php echo $base_url; ?>/about.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='about.php'){ ?>active<?php } ?>">About</a>

</li>
<li class="nav-item">
<a href="<?php echo $base_url; ?>/blog.php?page=1" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='blog.php'){ ?>active<?php } ?>">Activities</a>

</li>
<li class="nav-item">
<a href="<?php echo $base_url; ?>/gallery.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='gallery.php'){ ?>active<?php } ?>">Gallery</a>

</li>
<li class="nav-item">
<a href="<?php echo $base_url; ?>/donation.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='donation.php'){ ?>active<?php } ?>">Donation</a>

</li>

<li class="nav-item">
<a href="<?php echo $base_url; ?>/contact.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='contact.php'){ ?>active<?php } ?>">Contact</a>
</li>
<li class="nav-item">
<a href="<?php echo $base_url; ?>/join-us.php" class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='join-us.php'){ ?>active<?php } ?>">Join Us</a>
</li>
</ul>
<div class="side-nav">
<a class="donate-btn" href="<?php echo $base_url; ?>/donation.php">
Donate
<i class="icofont-heart-alt"></i>
</a>
<img src="<?php echo $base_url; ?>/anchal-logo-4.png" alt="Logo" style="width:100px;" >
</div>
</div>
</nav>
</div>
</div>
</div>