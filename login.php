<?php
  require('config/config.php');
  require('config/db.php');
  if(isset($_POST['submit'])){
    
    if ( !empty($_POST['username']) && !empty($_POST['password'])) {

      $username = $_POST['username'];
      $password = $_POST['password'];
      $result= $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'"); 

      $row= $result ->Fetch_array();
      $loginCheck= $result-> num_rows;
  
      if($loginCheck> 0)
      {
        header("Location: table.php");
      }
  
      else
      {
       echo "User credentials are invalid ";
      }
  }
  }


?>
<?php include('inc/header.php'); ?>
  <br/>
  <div style="width:30%; margin: auto; text-align: center;">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
      <img class="mb-4" src="img/haus.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Emro's Boarding House</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      <br/><label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        
      </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Log in</button>

    </form>
  </div>
<?php include('inc/footer.php'); ?>