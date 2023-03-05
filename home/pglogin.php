<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
   <div class="container">
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<input type="text" name="user_name" placeholder="User Name" autocomplete="off"><br>

     	<input type="password" name="password" placeholder="Password" autocomplete="off"><br>
        <button type="submit" name="login" class="b">Login</button>
     	
     </form>
     
  
     </div>
</body>
</html>