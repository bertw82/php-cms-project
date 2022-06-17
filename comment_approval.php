<?php  include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<div class="container">
<h2>Your comment will be active soon pending approval!</h2>

<?php 
 if(isset($_GET['p_id'])){
  $the_get_id = escape($_GET['p_id']);
}
?>
<div style="margin: 2em;">
<a class="btn btn-primary" href="post.php?p_id=<?php echo $the_get_id; ?>" role="button">Back to Post</a>
<a class="btn btn-danger" href="index.php" role="button">Home</a>

</div>

</div>