<?php

//creating a variable $errors - associative array with empty values (those will be filled when we call $errors['....'] in IF)
$errors = [
 'email' => '',
 'title' => '',
 'ingredient' => '',
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
    if (empty($_POST['ingredient'])) {
        $errors['ingridient'] = 'At least one ingredient is required <br>';
    } else {
        $ingredient = $_POST['ingredient'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){ //Regular Expression (RegEx)
            $errors['ingridient'] = 'Ingredients must be a comma separated list';
        };
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