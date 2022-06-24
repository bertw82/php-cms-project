<?php ob_start(); ?>
<!-- Header -->
<?php include "includes/header.php"; ?>
<!-- Database  -->
<?php include "includes/db.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

      <?php

      if(isset($_GET['p_id'])){
        $the_post_id = escape($_GET['p_id']);

        // post view count query
        $view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = $the_post_id";
        $send_view_query = mysqli_query($connection, $view_query);
        confirm($send_view_query);


        // display all posts query
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_all_posts_query = mysqli_query($connection, $query);
        confirm($select_all_posts_query);

        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];
          $post_tags = $row['post_tags'];
          
          ?>

          <!-- First Blog Post -->
          <h2>
              <a href="#"><?php echo $post_title ?></a>
          </h2>
          <p class="lead">
              by <a href="index.php"><?php echo $post_author ?></a>
          </p>
          <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
          <hr>
          <!-- display image from database, although in images folder -->
          <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
          <hr>
          <p><?php echo $post_content; ?></p>

          <hr>
        
      <?php } 
    
      } else {
        header("Location: index.php");
      } 
      
      ?>

      <!-- Blog Comments -->

      <?php 
        if(isset($_POST['create_comment'])){

          if(($_SESSION['user_role'] === 'admin') || ($_SESSION['user_role'] === 'subscriber')){

            $the_post_id = escape($_GET['p_id']);
            $comment_author = escape($_POST['comment_author']);
            $comment_email = escape($_POST['comment_email']);
            $comment_content = escape($_POST['comment_content']);

            $query = "INSERT INTO comments (comment_post_id,comment_author, comment_email, comment_content, comment_status, comment_date)";

            $query .= "VALUES ($the_post_id,'{$comment_author}', '{$comment_email}', '{$comment_content}', 'Declined', now())";

            $create_comment_query = mysqli_query($connection, $query);
            confirm($create_comment_query);

            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
            $query .= "WHERE post_id = $the_post_id ";

            $update_comment_count = mysqli_query($connection, $query);
            confirm($update_comment_count);
            header("Location: comment_approval.php?p_id=$the_post_id");
          } else {
            header("Location: comment_error.php?p_id=$the_post_id");

          }
          
        }
      
      ?>

          <!-- Comments Form -->
          <div class="well">
              <h4>Leave a Comment:</h4>
              <form action="" method="post" role="form">
                  <div class="form-group">
                    <label for="author">Author</label>
                    <input id="author" type="text" class="form-control" name="comment_author" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control"  name="comment_email" required>
                  </div>
                  <div class="form-group">
                      <label for="comment">Comment</label>
                      <textarea id="comment" name="comment_content" class="form-control" rows="3" required></textarea>
                  </div>
                  <button name="create_comment" type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>

          <hr>

          <!-- Posted Comments -->

          <?php 

          $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
          $query .= "AND comment_status = 'Approved' ";
          $query .= "ORDER BY comment_id DESC";
          $select_comment_query = mysqli_query($connection, $query);
          confirm($select_comment_query);
          while($row = mysqli_fetch_assoc($select_comment_query)) {
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];

          ?>

          <!-- Comment -->
          <div class="media">
            <div class="media-body">
              <h3 style="text-decoration: underline;">Comments</h3>
                <h4 class="media-heading"><?php echo $comment_author; ?>
                    <small><?php echo $comment_date; ?></small>
                </h4>
                <?php echo $comment_content; ?>
            </div>
          </div>

        <?php  } ?>

      </div>

      <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
        

    </div>
      <!-- /.row -->
    </div>
        <hr>

     <?php include "includes/footer.php"; ?>