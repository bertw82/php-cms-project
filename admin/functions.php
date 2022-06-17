<?php 
// confirm connection
function confirm($query_result){
  global $connection;
  if(!$query_result){
    die("query failed ." . mysqli_error($connection));
  }
}

// Post a new category 
function insert_categories() {
  global $connection;
  if(isset($_POST['submit'])) {
    $cat_title = escape($_POST['cat_title']);
    if($cat_title == '' || empty($cat_title)) {
      echo "This field should not be empty";
    } else {
      $query = "INSERT INTO categories(cat_title)";
      $query .= "VALUE('{$cat_title}')";
      $create_category_query = mysqli_query($connection, $query);
  
      if(!$create_category_query) {
        die('QUERY FAILED' . mysqli_error($connection));
      }
    }
  }
}

// Find and display categories
function find_categories() {
  global $connection;
  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query); 

  while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";      
    echo "<td>{$cat_id}<?td>";
    echo "<td>{$cat_title}<?td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";

    echo "</tr>";
  }
}

// Delete categories
function delete_categories() {
  global $connection;
  if(isset($_GET['delete'])) {
    $get_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id ={$get_cat_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: categories.php");  // this refreshes the page
  }
}

// Update categories
function update_categories() {
  global $connection;
  if(isset($_POST['update_category'])) {
    $the_cat_title = escape($_POST['cat_title']);
    $cat_id = $_GET['edit'];
    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
    $update_query = mysqli_query($connection, $query);
    if(!$update_query) {
      die("Query failed" . mysqli_error($connection));
    }
  }
}

// escape strings to prevent SQL injection
function escape($string){
  global $connection;
  return mysqli_real_escape_string($connection, trim($string));
}
 
?>