<?php
session_start();
if(isset($_SESSION['root_id_4448'])){

    if(isset($_GET['user_id'])){
        include_once "config.php";
    
        $id = $_GET['user_id'];
        $user_id = $_SESSION['root_id_4448'];
        
        
        if($id == 1){
            header("location: ../Admin-root-users.php");
        }else{
            $sql2 = mysqli_query($con, "DELETE FROM users WHERE user_id = $id");
            if($sql2){
                header("location: ../Admin-root-users.php");
                }else{
                    header("location: ../ordersDashbord.php");
        
                }
        }

    }else{
        header("location: ../Signup-Login.php");
    }
    
}else{
    header("location: ../Signup-Login.php");
}
?>