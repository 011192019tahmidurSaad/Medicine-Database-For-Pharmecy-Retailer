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
    <title>ADD Disease</title>
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
       if(isset($_GET['disease_name'])){
        $disease_name= $_GET['disease_name'];
        $disease_entry_date= $_GET['disease_entry_date'];
        
        $sql = "INSERT INTO disease_category (disease_name,disease_entry_date)
        VALUES ('$disease_name',' $disease_entry_date')";

        if($conn-> query($sql)== true){
            echo 'Data inserted';
        }
        else{
            echo 'data not inserted';
        }
        

       }
        
        
    ?>
    <form action="add_disease.php" method="GET">
        Disease Name :<br>
        <input type="text" name="disease_name" required><br><br>
        Disease Entry Date :<br>
        <input type="date" name="disease_entry_date" required><br><br>
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