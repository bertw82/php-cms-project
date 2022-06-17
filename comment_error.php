<?php  include "includes/header.php"; ?>

<div class="container">
<h2>I'm sorry, you must be logged in to leave a comment</h2>

<?php 
 if(isset($_GET['p_id'])){
  $the_get_id = escape($_GET['p_id']);
}
?>
<div style="margin: 2em;">
<a class="btn btn-primary" href="post.php?p_id=<?php echo $the_get_id; ?>" role="button">Back to Post</a>
<a class="btn btn-danger" href="index.php" role="button">Home</a>
<a class="btn btn-success" href="registration.php" role="button">Sign Up</a>
</div>

</div>
