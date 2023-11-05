<?php include 'models/Database.php' ?>

<?php

//delete a record from database:
if (isset($_POST['delete'])) {

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        //success
        header('Location:index.php');
    } else {
        //falure
        echo 'query error: ' . mysqli_error($conn);
    };
};


//check GET['id'] (GET request 'id' parameter):
if (isset($_GET['id'])) { //if 'id' is present in the url

    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);  //escaping any sensitive characters to protect our database

    // make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id"; // for btn "more info" we select any record ` WHERE id = $id ` (id in url)

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
};

?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'templates/header.php' ?>

<div class="container center">
    <?php if ($pizza) : ?>
        <h4><?php echo $pizza['title']; ?></h4>
        <p>Created by <?php echo $pizza['email']; ?></p>
        <p><?php echo date($pizza['created_at']); ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo $pizza['ingredients']; ?></p>

        <!-- DELETE FORM -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>


    <?php else : ?>
        <h5>No such pizza exists</h5>

    <?php endif; ?>

</div>

<?php include 'templates/footer.php' ?>

</html>