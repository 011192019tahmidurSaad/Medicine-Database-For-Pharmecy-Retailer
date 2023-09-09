<?php
    require('connection.php');
?>
<?php
   session_start();
   $user_first_name= $_SESSION['user_first_name'];
   $user_last_name= $_SESSION['user_last_name'];
   if(!empty($user_first_name) && !empty($user_last_name)){
?>
 <?php
        $sql5 = "SELECT * FROM disease_category";
        $query5 = $conn -> query($sql5);
        $sql6 = "SELECT * FROM company_category";
        $query6 = $conn -> query($sql6);
     ?>
<?php 
    $sql1 = "SELECT * FROM medicine";
    $query1 = $conn -> query($sql1);
    $data_list = array();
    while($data1 = mysqli_fetch_assoc($query1)){
        $medicine_id = $data1['medicine_id'];
        $medicine_name = $data1['medicine_name'];
        $data_list[$medicine_id] = $medicine_name;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Medicine</title>
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
                        <form action="search_by_company.php" method="GET">
                        Company Name :<br>
                        <select name="company" >
                            <?php 
                                while ($data6 = mysqli_fetch_array($query6)){
                                $company_id = $data6['company_id'];
                                $company_name = $data6['company_name'];
                             echo "<option value ='$company_id'>$company_name</option>";}
                            ?>
                        </select>
                        <input type="submit" value="Search"  class="btn btn-success"></input>
                        </form>
                        
                        
                        <hr>
                        <form action="search_by_disease.php" method="GET">
                        Disease Name :<br>
                        <select name="disease" id="">
                            <?php 
                                while ($data5 = mysqli_fetch_array($query5)){
                                $disease_id = $data5['disease_id'];
                                $disease_name = $data5['disease_name'];
                                echo "<option value ='$disease_id'>$disease_name</option>";}

                            ?>
                        </select>
                        <input type="submit" value="Search"  class="btn btn-success"></input>
                        </form>
                        <hr>




                    <?php
        $sql = "SELECT * FROM medicine";

        $query = $conn-> query($sql);
        echo "<table border='1' class='table table-secondary table-striped table-hover'> <tr>
              <th>Medicine Category </th>
              <th>Medicine Code </th>
              <th>Medicine Type </th>
              
              <th>Action</th></tr> ";
        while($data = mysqli_fetch_assoc($query)){
            $medicine_id = $data['medicine_id'];
            $medicine_name = $data['medicine_name'];
            $medicine_code = $data['medicine_code'];
            $medicine_type = $data['medicine_type'];
            

            echo "<tr>
                  <td>$medicine_name</td>
                  <td>$medicine_code</td>
                  <td>$medicine_type</td>
                  <td><a href ='edit_medicine.php?id= $medicine_id'class='btn btn-secondary'>Edit</a></td></tr>";

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