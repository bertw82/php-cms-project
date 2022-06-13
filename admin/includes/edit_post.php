<?php

  if(isset($_GET['p_id'])){
    $the_get_id = $_GET['p_id'];
  }

  $query = "SELECT * FROM posts WHERE post_id = $the_get_id";
  $select_posts_by_id = mysqli_query($connection, $query); 

  while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_view_count = $row['post_view_count'];
  }
  confirm($query);

  // update post query
  if(isset($_POST['update_post'])){
    
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){
      $query = "SELECT * FROM posts WHERE post_id = $the_get_id ";
      $select_image = mysqli_query($connection, $query);
      while($row = mysqli_fetch_array($select_image)){
        $post_image = $row['post_image'];
      }
    }

    if(isset($_POST['post_view_count'])){
      $new_post_view_count = 0;
    } else {
      $new_post_view_count = $post_view_count;
    }

    // update post
    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_view_count = {$new_post_view_count} ";
    $query .= "WHERE post_id = {$the_get_id} ";

    $update_post = mysqli_query($connection, $query); 
    confirm($update_post);
    header("Location: posts.php?source=edit_post_success&p_id={$the_get_id}");
  }

?>

<form action="" method="post" enctype="multipart/form-data">
  <!-- enctype is for images -->
  <div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title;?>" type="text" class="form-control" name="post_title">
  </div>

  <div class="form-group">
    <label for="post_category">Post Category</label>
    <select name="post_category" id="post_category">
      <?php 
    
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query); 

        // confirm($select_categories);

        while($row = mysqli_fetch_assoc($select_categories)) {
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
      ?>
  
    </select>
  </div>

  <div class="form-group">
    <label for="title">Post Author</label>
    <input value="<?php echo $post_author;?>" type="text" class="form-control" name="post_author">
  </div>

  <div class="form-group">
    <label for="title">Post Date</label>
    <input value="<?php echo $post_date;?>" type="text" class="form-control" name="date">
  </div>

  <div class="form-group">
    <label for="post_status">Post Image</label>
    <img width="100" src="../images/<?php echo $post_image; ?>" alt="">

    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea name="post_content" id="summernote" cols="30" rows="10" class="form-control"><?php echo $post_content;?></textarea>
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input value="<?php echo $post_tags;?>" type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="title">Post View Count: <?php echo $post_view_count;?></label>
    <div>
      <label style="font-weight:normal;">Reset to Zero?</label>
      <input value="" type="checkbox" class="form-check_input" name="post_view_count">
    </div>
  </div>

  <div class="form-check">
 
    <label for="title">Post Status</label>
    <div>
      <input value="<?php echo $post_status;?>" type="radio" class="form-check-input" name="post_status" checked> <label class="form-check-label" for="exampleRadios1"><?php echo $post_status;?></label>
    </div>
    <div>

    <?php 
    if($post_status === 'published'){
      echo '<input value="draft" type="radio" class="form-check-input" name="post_status"> <label class="form-check-label" for="exampleRadios1">draft</label>';
    } else {
      echo '<input value="published" type="radio" class="form-check-input" name="post_status"> <label class="form-check-label" for="exampleRadios1">published</label>';
    }
    
    ?>

    </div>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
  </div>

</form>