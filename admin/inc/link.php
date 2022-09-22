
<?php



include "functions/functions.php";





$prefix='a';
$cookie_field_names=array("username","password");
$fetch_field_names=array("id","username","password");
$currentpagename=basename($_SERVER['PHP_SELF']);


if($classhelper->checklogin($cookieadminname1,$cookieadminname2,'admin_tb',$cookie_field_names,$fetch_field_names,$prefix)==true){

  $classhelper->checklogin($cookieadminname1,$cookieadminname2,'admin_tb',$cookie_field_names,$fetch_field_names,$prefix);
if($currentpagename=='login.php'){
  ?>
      <script>location.replace('<?php echo $admin_base_url; ?>/');</script>
  
      <?php
    }

}else{

  if($currentpagename<>'login.php'){
?>
    <script>location.replace('<?php echo $admin_base_url; ?>/login.php');</script>

    <?php
  }
}
?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Anchal | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo $admin_base_url; ?>/plugins/toastr/toastr.min.css">

  