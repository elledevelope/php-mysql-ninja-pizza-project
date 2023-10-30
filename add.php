<?php


// ------------------------------------------ GET Method (data is shown in URL):

//Function to check if a form was submitted /  if  a'submit' btn have been pressed :
if (isset($_GET['submit'])) { 
    echo $_GET['email'] . '<br>';
    echo $_GET['title'] . '<br>';
    echo $_GET['ingredients'] . '<br>';
};



// ------------------------------------------ POST Method (data is NOT shown in URL, data is send straightly to a server): 
// -------------------------------------------POST Method is more secure 
if (isset($_POST['submit'])) {
    // checking if email field is empty:
    if (empty($_POST['email'])) {
        echo 'An email is required <br>'; //so if 'email' is empty we show error msg
    } else {
        //filter an email
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //if email passes the filter it's gonna return "true", we reverse it to "false" usung `!` symbol. So if this function gets "false" it prints an error:
            echo 'email must be a valid email adress'; 
        };
    };

    // checking if title field is empty:
    if (empty($_POST['title'])) {
        echo 'A title is required <br>';
    } else {
        $title = $_POST['title'];
    };

    // checking if ingredient field is empty:
    if (empty($_POST['ingredient'])) {
        echo 'At least one ingredient is required <br>';
    } else {
        echo htmlspecialchars($_POST['ingredient']) . '<br>';
    };
};



?>




<!DOCTYPE html>
<html lang="fr">
<?php include 'templates/header.php' ?>

<section class="container grey-text">

    <h4 class="center">Add a Pizza</h4>

    <form class="white" action="add.php" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email">

        <label>Pizza Title:</label>
        <input type="text" name="title">

        <label>Ingredients (comma separeted):</label>
        <input type="text" name="ingredients">

        <div class="center">
            <input class="btn brand z-depth-0" type="submit" name="submit" value="submit">
        </div>
    </form>

</section>

<?php include 'templates/footer.php' ?>

</html>