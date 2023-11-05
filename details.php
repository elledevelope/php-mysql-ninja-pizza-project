
<?php include 'models/Database.php' ?>

<?php
//check GET['id'] (GET request 'id' parameter):
if(isset($_GET['id'])) { //if 'id' is present in the url

 $id = mysqli_real_escape_string($conn, $_GET['id']);   //escaping any sensitive characters to protect our database

//make sql:
$sql = "SELECT * FROM pizzas WHERE id = $id"; // for btn "more info" we select any record ` WHERE id = $id ` (id in url)
};

//get query result:
$result = mysqli_query($conn, $sql);
//fetch result in array format:
$pizza = mysqli_fetch_assoc($result);

//free $result from memory:
mysqli_free_result($result);
//close connection to database:
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'templates/header.php' ?>

<h2>Details</h2>

<?php include 'templates/footer.php' ?>
</html>

