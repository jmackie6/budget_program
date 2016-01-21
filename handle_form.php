<?php
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$major=$_REQUEST['major'];
	$comments=$_REQUEST['comments'];

	echo "<p>Name: $name</p>";
	echo "<p>Email: $email</p>";
	echo "<p>Major: $major</p>";

	if(!empty($_POST['visited']))
	{
		foreach($_POST['visited'] as $place)
		{
			echo "You have visited " . $place . '<br/>';
		}
	}
	else
		echo 'You have not visited any where!';

	echo "<br/><br/>" . 'Your Comments: ' . $comments;

?>