<?php 
  if(isset($_GET['p_id'])){
    $the_get_id = $_GET['p_id'];
  }

?>

<h4>Your post has been updated!</h4>

<a class="btn btn-primary" href="../post.php?p_id=<?php echo $the_get_id; ?>" role="button">View Post</a>
<a class="btn btn-success" href="./posts.php" role="button">View All Posts (Admin)</a>