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
    <title>ADD Medicine</title>
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
       if(isset($_GET['medicine_name'])){
        $medicine_name= $_GET['medicine_name'];
        $disease= $_GET['disease'];
        $company= $_GET['company'];
        $medicine_code = $_GET['medicine_code'];
        $medicine_type = $_GET['medicine_type'];
        
        
        $sql = "INSERT INTO medicine (medicine_name,
                                     disease,company,
                                     medicine_code,
                                     medicine_type
                                     )
        VALUES ('$medicine_name','$disease','$company','$medicine_code','$medicine_type')";

        if($conn-> query($sql)== true){
            echo 'Data inserted';
        }
        else{
            echo 'data not inserted';
        }
        

       }
        
        
    ?>
    <?php
        $sql1 = "SELECT * FROM disease_category";
        $query1 = $conn -> query($sql1);
        $sql2 = "SELECT * FROM company_category";
        $query2 = $conn -> query($sql2);
     ?>
    <form action="add_medicine.php" method="GET">
        Medicine Name :<br>
        <input type="text" name="medicine_name" required><br><br>
        Disease Name :<br>
        <select name="disease" id="">
            <?php 
                while ($data = mysqli_fetch_array($query1)){
                $disease_id = $data['disease_id'];
                $disease_name = $data['disease_name'];
                echo "<option value ='$disease_id'>$disease_name</option>";}

            ?>
        </select><br><br>
        Company Name :<br>
        <select name="company" id="">
            <?php 
                while ($data = mysqli_fetch_array($query2)){
                $company_id = $data['company_id'];
                $company_name = $data['company_name'];
                echo "<option value ='$company_id'>$company_name</option>";}

            ?>
        </select><br><br>
        Medicine Code :<br>
        <input type="text" name="medicine_code" required><br><br>
        Medicine Type :<br>
        <input type="text" name="medicine_type" required><br><br>
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