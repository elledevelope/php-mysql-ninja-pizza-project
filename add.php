<?php include 'models/Database.php' ?>

<?php
//we initilaze variables to use them later in <input "value = $..."> to keep data in forl fiels after subbmitting a form if there is an error:
$email = $title = $ingredients = ''; //$email, $title, and $ingredients are being simultaneously initialized to empty strings

//creating a variable $errors - associative array with empty values (those will be filled when we call $errors['....'] in IF)
$errors = [
    'email' => '',
    'title' => '',
    'ingredients' => '',
];


// ------------------------------------------ POST Method (data is NOT shown in URL, data is send straightly to a server): 
// -------------------------------------------POST Method is more secure 
if (isset($_POST['submit'])) {
    // checking if email field is empty:
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required <br>'; //here we call $errors['email'] and atribute a value of a error-text
    } else {
        //filter an email
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email must be a valid email adress'; //here we call $errors['email'] and atribute a value of a error-text
        };
    };

    // checking if title field is empty:
    if (empty($_POST['title'])) {
        $errors['title'] = 'A title is required <br>';
    } else {
        //filter title
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        };
    };

    // checking if ingredient field is empty:
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'At least one ingredient is required <br />';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list';
        };
    };


    //filter $errors array in search of errors:
    if (array_filter($errors)) { //it checks $errors array at the beggining of a page: if it's return true (1) - there are errors:
        // echo 'errors in the form';

    } else { //if it's return false (0)- it means there are no errors:

        //Sanitaze users inputs:
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);


        //inserting users unput into database via query:
        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients')";


        // echo 'form is valid';
        header('Location:index.php'); //if there are no errors, we redirect user to index page
        //later before redirecting we will send data from the form to database
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
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>"> <!-- //added $email to value of input to keep data in a filed after a form submition if here is an error so a user can modifie this data rather than typing it out again -->
        <div class="red-text"><?php echo $errors['email'] ?></div> <!-- //echoed $errors['email'] in html -->

        <label>Pizza Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors['title'] ?></div>

        <label>Ingredients (comma separated)</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>

        <div class="center">
            <input class="btn brand z-depth-0" type="submit" name="submit" value="submit">
        </div>
    </form>

</section>

<?php include 'templates/footer.php' ?>

</html>