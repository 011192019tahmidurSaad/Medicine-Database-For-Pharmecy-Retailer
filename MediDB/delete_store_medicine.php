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
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $sql = "DELETE from store_medicine where store_medicine_id = $id";
    $result = $conn->query ( $sql);
    if ($result) {
        header('location: list_of_entry_medicine.php');
    }
}
?>





<?php
   }
   else{
    header('location:login.php');
   }
 ?>