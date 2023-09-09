<?php
    require('connection.php');
 ?>
 <?php 
     $disease_id =null;
     $disease_name = '';
     $disease_entry_date;

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
    <title>Edit Disease</title>
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

          $sql = "SELECT * FROM disease_category WHERE disease_id = $getid";

          $query = $conn-> query($sql);

          $data = mysqli_fetch_assoc($query);

          $disease_id = $data['disease_id'];
          $disease_name = $data['disease_name'];
          $disease_entry_date = $data['disease_entry_date'];
       }

       if(isset($_GET['disease_name'])){
        $new_disease_name = $_GET['disease_name'];
        $new_disease_id = $_GET['disease_id'];
        $new_disease_entry_date = $_GET['disease_entry_date'];

        $sql1 = "UPDATE disease_category SET
                 disease_name =  '$new_disease_name',
                 disease_entry_date = '$new_disease_entry_date'
                 WHERE disease_id = '$new_disease_id'";
        if($conn-> query($sql1)==true){
            echo 'Update Successfully';
        }
        else{
            echo 'Not updated';
        }
       }
    ?>
    <form action="edit_disease.php" method="GET">
        Disease Name :<br>
        <input type="text" name="disease_name" value="<?php echo $disease_name; ?>"><br><br>
        Disease Entry Date :<br>
        <input type="date" name="disease_entry_date" value="<?php echo $disease_entry_date; ?>"><br><br>
        <input type="text" name="disease_id" value="<?php echo $disease_id; ?>" hidden>
        <input type="submit" value="update" class="btn btn-secondary"></input>
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