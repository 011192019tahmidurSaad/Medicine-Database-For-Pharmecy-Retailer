<?php
    require('connection.php');
    session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

</head>
<body>
<div class="container bg-light">
        <div class="container-foluid border-bottom border-secondary"> <!--  topbar -->
            <div class="row p-3">
                <div class="col-sm-9">
                    <h1> <a href="index.php" class="text-secondary text-decoration-none">Medicine Database</a> </h1>
                </div>
                <div class="col-sm-3">
                    <p class="pt-3">
                        
                    </p>
                </div>
             </div>
           
        </div><!-- end topbar -->
        <div class="container-foluid">
            <div class="row">
                <div class="col-sm-3 bg-light p-1 m-1">
                <?php 
       if(isset($_POST['user_email'])){
        $user_email= $_POST['user_email'];
        $user_password= $_POST['user_password'];
        
        $sql = "SELECT * FROM users
                WHERE user_email = '$user_email'
                AND user_password = '$user_password' ";
        
        $query = $conn->query($sql);
        if(mysqli_num_rows($query) >0){
            $data = mysqli_fetch_array($query);
            
            $user_first_name = $data['user_first_name'];
            $user_last_name = $data['user_last_name'];

            $_SESSION['user_first_name'] = $user_first_name;
            $_SESSION['user_last_name'] = $user_last_name;

            header("location:index.php");
        }
        else{ ?>
            <!-- echo 'Incorrect Password!!! Please try again.'; -->
            <p class="text-danger">Incorrect Password!!! Please try again.</p>
            <?php
        }
        
        

       }
    ?>
    <?php
            
            echo 'Please Login First';
        
    ?>
    
    <form action="login.php" method="POST">
        User's Email :<br>
        <input type="email" name="user_email" required><br><br>
        User's Password :<br>
        <input type="password" name="user_password" required><br><br>
        <input type="submit" value="Login" class="btn btn-secondary"></input>
        <br/>
        <br/>
        
    </form>




                   
                </div>
                <div class="col-sm-8 border-start border-secondary">
                    <div class="container p-4 m-4">
                        <h3 class="text-center text-secondary">In the realm of modern healthcare, the meticulous management
                             of medicines within pharmacies is a cornerstone of effective patient care.
                              Introducing MediDB, an innovative and comprehensive solution meticulously 
                              crafted to transform the way pharmaceutical establishments handle medicine
                               inventories.
                            </h3>




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

