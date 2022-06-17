<!-- update category -->
<form action="" method="post" >
  <div class="form-group">
    <label for="cat_title">Update Category</label>

    <!-- Display "Update Category" input field and button if "Edit" is selected -->
    <?php 

      if(isset($_GET['edit'])) {
        $cat_id = escape($_GET['edit']);
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
      $select_categories_id = mysqli_query($connection, $query); 

      while($row = mysqli_fetch_assoc($select_categories_id)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        ?>

      <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">

        <?php } 
      }

    ?>

    <?php update_categories(); ?>
        
  </div>
  <div class="form-group">
    <input class="btn btn-primary" name="update_category" type="submit" value="Update Category">
  </div>
</form>