<?php

if (isset($_POST['submit'])){  //the submit is the button(signup page) name. checked if its clicked.
	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);//that coding after the = means that if the use trys to type a code inside the input to access the db, the code escapes it. 
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers 
	// check for empty fields
	if(empty($first) || empty($last)|| empty($email) || empty($uid)|| empty($pwd)){
		header("Location: ../signup.php?signup=empty");
		exit();	
	} else{
		//Check if input character are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*/", $last) ){
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else{
			//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=invalidemail");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE user_uid = '$uid' "; 
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}else{
					//Hashing the password
					$hashePwd = password_hash($pwd, PASSWORD_DEFAULT);
					//inserT the user into database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashePwd');";
					 mysqli_query($conn, $sql);
					 header("Location: ../signup.php?signup=success");
					exit();

				}
			}
		}
	}
 
} else {

	header("Location: ../signup.php");//when the user did not click the button it sends them directly to the sign up page.//saftey okey!!
	exit();// its a function that closes and stops the script from running if there is anything after the exit function

}