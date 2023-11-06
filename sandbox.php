<?php 
//Youtube : https://www.youtube.com/watch?v=L-S0rsFR-gQ&list=PL4cUxeGkcC9gksOX3Kd9KPo-O68ncT05o&index=34

	// ternary operators

	$score = 50;

	// if($score > 40){
	// 	echo 'high score!';
	// } else {
	// 	echo 'low score!';
	// }

// is same as:

	// echo $score > 40 ? 'high score!' : 'low score!';

?>

<!DOCTYPE html>
<html>
<head>
	<title>php tuts</title>
</head>
<body>

	<h2><?php echo $score > 40 ? 'high score!' : 'low score!'; ?></h2>

</body>
</html>