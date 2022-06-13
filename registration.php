<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php 

if(isset($_POST['submit'])){

  $username = $_POST['username'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // escape the strings
  $username = mysqli_real_escape_string($connection, $username);
  $email = mysqli_real_escape_string($connection, $email);
  $password = mysqli_real_escape_string($connection, $password);

  // encrypt password using password_hash
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users(user_name, user_firstname,user_lastname,user_password, user_email, user_role) ";

  $query .= "VALUES('{$username}','{$first_name}','{$last_name}','{$hashed_password}', '{$email}','subscriber')";

  $register_user_query = mysqli_query($connection, $query);

  confirm($register_user_query);
  // header("Location: index.php");
}

?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
      <div class="form-wrap">
      <h1>Register</h1>
          <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
            <div class="form-group">
                <label for="username" class="sr-only">username</label>
                <input required type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
            </div>
            <div class="form-group">
                <label for="first_name" class="sr-only">First Name</label>
                <input required type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Desired First Name">
            </div>
            <div class="form-group">
                <label for="last_name" class="sr-only">Last Name</label>
                <input required type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Desired Last Name">
            </div>
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input required type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
            </div>
              <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input required type="password" name="password" id="key" class="form-control" placeholder="Password">
            </div>
    
            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
          </form>
                 
          </div>
        </div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<hr>

<?php include "includes/footer.php";?>
