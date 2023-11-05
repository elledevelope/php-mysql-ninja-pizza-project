<!DOCTYPE html>
<html lang="fr">

<?php include 'templates/header.php' ?>
<?php include 'templates/footer.php' ?>
<?php include 'models/Database.php' ?>

</html>



<?php
//write query for all pizzas:
$sql = 'SELECT title, ingredients, id FROM pizzas';

//make query and get result:
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array:
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($pizzas);


?>