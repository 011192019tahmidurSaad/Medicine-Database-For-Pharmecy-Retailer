<?php
    require('connection.php');
    $user_id= null;
    $user_first_name = '';
    $user_last_name = '';
    $user_email = '';
    $user_password= '';
 ?>
 <?php
   session_start();
   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];
   if(!empty($user_first_name) && !empty($user_last_name)){
?>


<!DOCTYPE html>
<html lang="pend
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
<div class="container bg-light">
        <div class="container-foluid border-bottom border-secondary"> <!--  topbar -->
              <?php include('bootstrap/topbar.php'); ?>
           
        </div><!-- end topbar -->
        <div class="container-foluid">
            <div class="row">
                <div class="col-sm-3 bg-light p-0 m-0">
                    <?php include('bootstrap/leftside_bar.php'); ?>
                </div>
                <div class="col-sm-9 border-start border-secondary">
                    <div class="container p-4 m-4">
                    <?php 
       if(isset($_GET['id'])){
        $getid = $_GET['id'];

        $sql = "SELECT * FROM users WHERE user_id = $getid";

        $query3 = $conn-> query($sql);

        $data = mysqli_fetch_assoc($query3);

        $user_id = $data['user_id'];
        $user_first_name = $data['user_first_name'];
        $user_last_name = $data['user_last_name'];
        $user_email = $data['user_email'];
        $user_password= $data['user_password'];
     }

     if(isset($_GET['user_first_name'])){
        
        $new_user_first_name= $_GET['user_first_name'];
        $new_user_last_name = $_GET['user_last_name'];
        $new_user_email= $_GET['user_email'];
        $new_user_password= $_GET['user_password'];
        $new_user_id= $_GET['user_id'];

        $sql4 = "UPDATE users SET
        user_first_name =  '$new_user_first_name',
        user_last_name =  '$new_user_last_name',
        user_email = '$new_user_email',
        user_password = '$new_user_password'
        WHERE user_id = '$new_user_id' ";

        if($conn-> query($sql4)==true){
            echo 'Update Successfully';
        }
        else{
            echo 'Not updated';
}
    }
        
     ?>
    <form action="edit_users.php" method="GET">
    User's First Name :<br>
        <input type="text" name="user_first_name" value="<?php echo $user_first_name; ?>"><br><br>
        User's Last Name :<br>
        <input type="text" name="user_last_name" value="<?php echo $user_last_name; ?>"><br><br>
        User's Email :<br>
        <input type="email" name="user_email" value="<?php echo $user_email; ?>"><br><br>
        User's Password :<br>
        <input type="password" name="user_password" value="<?php echo $user_password; ?>"><br><br>
        <input type="text" name="user_id" value="<?php echo $user_id; ?>" hidden>
        <input type="submit" value="submit" class="btn btn-secondary"></input>
    </form>
                    
                    
                    </div> 
                    
                </div>
            </div>

        </div>
        <div class="border-top border-secondary">
        <?php include('bootstrap/bottom_bar.php'); ?>
        </div>

    </div>
</body>
</html>

<?php
   }
   else{
    header('location:login.php');
   }
 ?>