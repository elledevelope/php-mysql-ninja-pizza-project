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

    // PHP script used to validate the "title" input received from a form submitted via POST method. It checks if the title is not empty and if it consists of only letters and spaces using regular expressions (RegEx). :
    if (empty($_POST['title'])) { // This line checks if the 'title' field in the POST request is empty. If it is, it means that the form was submitted without a title, and it echoes "A title is required"
        echo 'A title is required <br>';
    } else {
        //if (!preg_match('/^[a-zA-Z\s]+$/', $title)): This line uses the preg_match function to perform a regular expression pattern match on the $title. 
        $title = $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) { //Regular Expression (RegEx). The regular expression /^[a-zA-Z\s]+$/ specifies the pattern that the title must match:
            // ^: Asserts the start of the string.
            // [a-zA-Z\s]+: Matches one or more characters that are either lowercase letters (a-z), uppercase letters (A-Z), or whitespace characters (spaces and tabs).
            // $: Asserts the end of the string.
            echo 'Title must be letters and spaces only';
            //If the preg_match function returns true, it means that the title contains only letters and spaces as per the defined pattern. If the condition is met, the code continues execution.

            //If the regular expression check fails (i.e., the title contains characters other than letters and spaces), it echoes "Title must be letters and spaces only," indicating that the user needs to provide a valid title.
        };
    };

    // checking if ingredient field is empty:
    if (empty($_POST['ingredient'])) {
        echo 'At least one ingredient is required <br>';
    } else {
        $ingredient = $_POST['ingredient'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){ //Regular Expression (RegEx)
            echo 'Ingredients must be a comma separated list';
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