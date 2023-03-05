<?php 
/*
session_start();
require "db_conn.php";
if ((isset($_POST['login'])) ) {
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$user_name = validate($_POST['user_name']);
	$password = validate($_POST['password']);
	if (empty($user_name)) {
		header("Location: pglogin.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: pglogin.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM user WHERE user_name='$user_name' AND password='$password'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $user_name && $row['password'] === $password) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: index1.php");
		        exit();
            }else{
				header("Location: pglogin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: pglogin.php?error=Incorect User name or password");
	        exit();
		}
	}

}else{
	header("Location: pglogin.php");
	exit();
}
*/
require "db_conn.php";

if(isset($_POST['login'])){
    $requete="SELECT * from user where user_name=:user_name and password = :password";
    $reponse= $conn->prepare($requete); 
    $reponse->execute(
    array(
       'user_name'=>$_POST['user_name'],
       'password'=>$_POST['password']
       ));
    $count=$reponse->rowCount();
   if( $count > 0){
	  Session_start();
      $_SESSION["user_name"]=$_POST["user_name"];
      header("location:index1.php");
   }
else{
	header("Location: pglogin.php?error=Incorect User name or password");
	exit();
  
    } 

}

?>