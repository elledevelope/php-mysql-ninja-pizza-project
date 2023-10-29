<?php


// ------------------------------------------ GET Method (data is shown in URL):

//Function to check if a form was submitted /  if  a'submit' btn have been pressed :
if (isset($_GET['submit'])) { //if $_GET['submit'] is not set(=empty = in this case - if a form was not send yet(no data was send)/the btn 'submit' was not pressed) then, when the btn is pressed we echo data from a form:
    echo $_GET['email'] . '<br>';
    echo $_GET['title'] . '<br>';
    echo $_GET['ingredients'] . '<br>';
};



// ------------------------------------------ POST Method (data is NOT shown in URL, data is send straightly to a server): 
// -------------------------------------------POST Method is more secure 
if (isset($_POST['submit'])) {
    // !!!!! IMPORTANT : always have to use //-- htmlspecialchars() --// to prevent Cross Site Scripting (XSS) Attaks (in this case via a form method POST ) !!!!!
    echo htmlspecialchars($_POST['email']) . '<br>';
    echo htmlspecialchars($_POST['title']) . '<br>';
    echo htmlspecialchars($_POST['ingredients']) . '<br>';
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