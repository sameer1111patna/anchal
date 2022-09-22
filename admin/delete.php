<?php include "inc/link.php"; ?>
<?php 

$id=$_GET['id'];

$action=$_GET['action'];
if($id=='slider')
{
   
   
    $sql ="delete from slider_tb  where id='".$action."'"; 

    // $sql ="delete from blog  where category_id='".$action."'"; 
    $result = $classhelper->db_con->query($sql);

    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location:manageslider.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }
}
elseif($id=='gallery')
{
    $sql ="delete from gallery_tb  where id='".$action."'"; 
   
    $result = $classhelper->db_con->query($sql);

    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location:managegallery.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }
}
elseif($id=='contact')
{
    $sql ="delete from contactus_tb	  where id='".$action."'"; 
   
    $result = $classhelper->db_con->query($sql);

    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location:managecontactus.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    }
}
elseif($id=='join')
{
    $sql ="delete from joinus_tb  where id='".$action."'"; 
   
    $result = $classhelper->db_con->query($sql);

    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location:managejoinus.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}
elseif($id=='team')
{
    $sql ="delete from team_tb  where id='".$action."'"; 
   
    $result = $classhelper->db_con->query($sql);

    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location:manageteam.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

elseif($id=='activity')
{
    $sql ="delete from activity_tb  where id='".$action."'"; 
   
    $result = $classhelper->db_con->query($sql);

    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location:manageactivity.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}


elseif($id=='goal-mission')
{
    $sql ="delete from goal_mission  where id='".$action."'"; 
   
    $result = $classhelper->db_con->query($sql);

    if($result){
    
        session_start();
        $_SESSION['success_message'] = "Data Delete successfully.";
        header("Location:goal-mission.php?status=deletesuccess");    
               
    } else{
        echo "ERROR: Data! Not Update $sql. "
            . mysqli_error($conn);
    } 
}

?>


