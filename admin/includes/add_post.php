<?php 

  if(isset($_POST['create_post'])){
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_comment_count = 0;
    $post_date = date('d-m-y');
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status)";

    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}', now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";
    // now() will format the date

    $create_post_query = mysqli_query($connection, $query);
    confirm($create_post_query);

    $the_post_id = mysqli_insert_id($connection); // provides the last created id
    header("Location: posts.php?source=add_post_success&p_id={$the_post_id}");

  }

?>

<form action="" method="post" enctype="multipart/form-data">
  <!-- enctype is for images -->
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
  </div>

  <!-- <div class="form-group">
    <label for="title">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
  </div> -->

  <div class="form-group">
    <label for="title">Post Category</label>
    <select name="post_category_id" id="post_category_id">
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
    <input type="text" class="form-control" name="post_author">
  </div>

  <div class="form-group">
    <label for="title">Post Date</label>
    <input type="text" class="form-control" name="date">
  </div>

  <div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea name="post_content" id="summernote" cols="30" rows="10" class="form-control"></textarea>
  </div>

  <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>

<div>
  <label for="">Post Status</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="post_status" id="exampleRadios1" value="draft">
    <label class="form-check-label" for="exampleRadios1">
    draft
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="post_status" id="exampleRadios2" value="published">
    <label class="form-check-label" for="exampleRadios2">
      published
    </label>
  </div>
</div>
 

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
  </div>

</form>