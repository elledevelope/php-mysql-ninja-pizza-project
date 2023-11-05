<?php include 'templates/header.php' ?>
<?php include 'templates/footer.php' ?>
<?php include 'models/Database.php' ?>


<?php
//write query for all pizzas:
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

//make query and get result:
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array:
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free $results from memory:
mysqli_free_result($result);

//close connection to database:
mysqli_close($conn);


// print_r($pizzas);
// print_r(explode(',' , $pizzas[0]['ingredients']));

?>


<!DOCTYPE html>
<html lang="fr">

<h4 class="center grey-text">
    Pizzas!
</h4>

<div class="container">
    <div class="row">
        <?php foreach ($pizzas as $pizza) : // -- : -- instead of -- { -- 
        ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlentities($pizza['title']); ?></h6>

                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ingredient) : // ` : ` instead of ` { `
                            ?>

                                <li><?php echo htmlentities($ingredient); ?></li>

                            <?php endforeach; // --endforeach -- indead of -- { -- 
                            ?>
                        </ul>



                    </div>
                    <div class="card-action">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; // `endforeach` instead  of ` { `
        ?>

    </div>
</div>

</html>