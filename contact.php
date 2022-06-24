<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php 

if(isset($_POST['submit'])){
  $to = 'bwitzel82@gmail.com';
  $name = escape($_POST['name']);
  $subject = escape($_POST['subject']);
  $body = wordwrap(escape($_POST['body']), 70);
  $header = escape($_POST['email']);
  // send email
  mail($to,$subject,$body, $header);

  header("Location: index.php");
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
      <h1>Contact</h1>
          <form role="form" action="" method="post" id="login-form" autocomplete="off">
            <div class="form-group">
                <label for="name" class="sr-only">Name</label>
                <input required type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
            </div>
         
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input required type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
            </div>
            <div class="form-group">
                <label for="email" class="sr-only">Subject</label>
                <input required type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject">
            </div>
              <div class="form-group">
                <label for="body" class="sr-only">Password</label>
                <textarea required name="body" id="body" class="form-control" placeholder="Text Body" cols="50" rows="10"></textarea>
            </div>
    
            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
          </form>
                 
          </div>
        </div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<hr>

<?php include "includes/footer.php";?>
