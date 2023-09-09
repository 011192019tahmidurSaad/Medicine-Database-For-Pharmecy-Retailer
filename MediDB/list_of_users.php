<?php
    require('connection.php');
?>
<?php
   session_start();
   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];
   if(!empty($user_first_name) && !empty($user_last_name)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Users</title>
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
        $sql = "SELECT * FROM users";

        $query = $conn-> query($sql);
        echo "<table border='1' class='table table-secondary table-striped table-hover'> <tr>
              <th>User's first Name</th>
              <th>User's Last Name</th>
              <th>User's Email</th>
              <th>Action</th></tr> ";
        while($data = mysqli_fetch_assoc($query)){
            $user_id = $data['user_id'];
            $user_first_name = $data['user_first_name'];
            $user_last_name = $data['user_last_name'];
            $user_email = $data['user_email'];

            echo "<tr>
                  <td>$user_first_name</td>
                  <td>$user_last_name</td>
                  <td>$user_email</td>
                  <td><a href ='edit_users.php?id= $user_id'class='btn btn-secondary'>Edit</a></td></tr>";

        }
        echo"</table>";
        
    ?>
                    
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