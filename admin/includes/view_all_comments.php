<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Post Id</th>
      <th>Author</th>
      <th>Email</th>
      <th>Content</th>
      <th>Status</th>
      <th>In Response To</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Decline</th>
      <th>Delete</th>

    </tr>
  </thead>
  <tbody>

  <?php 
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_comments)) {
      $comment_id = $row['comment_id'];
      $comment_post_id = $row['comment_post_id'];
      $comment_author = $row['comment_author'];
      $comment_email = $row['comment_email'];
      $comment_content = $row['comment_content'];
      $comment_status = $row['comment_status'];
      $comment_date = $row['comment_date'];
      
      echo "<tr>";      
      echo "<td>{$comment_id}</td>";
      echo "<td>{$comment_author}</td>";
      echo "<td>{$comment_email}</td>";
      echo "<td>{$comment_content}</td>";
      echo "<td>{$comment_status}</td>";

      $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
      $select_post_id_query = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_post_id_query)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];

        echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
      }
      echo "<td>{$comment_date}</td>";
      echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
      echo "<td><a href='comments.php?decline={$comment_id}'>Decline</a></td>";
      echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='comments.php?delete={$comment_id}'>Delete</a></td>";
      echo "</tr>";
    }
    confirm($select_comments);
  ?>
  </tbody>
</table>

<?php 

  // Approve comment
  if(isset($_GET['approve'])){
    $the_comment_id = escape($_GET['approve']);
    $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = $the_comment_id";
    $approve_comment_query = mysqli_query($connection, $query);
    confirm($approve_comment_query);
    header("Location: comments.php"); //reload the query
  }

  // DECLINE to approve comment
  if(isset($_GET['decline'])){
    $the_comment_id = escape($_GET['decline']);
    $query = "UPDATE comments SET comment_status = 'Declined' WHERE comment_id = $the_comment_id";
    $decline_comment_query = mysqli_query($connection, $query);
    confirm($decline_comment_query);
    header("Location: comments.php"); //reload the query
  }

  // delete comment
  if(isset($_GET['delete'])){
    $the_comment_id = escape($_GET['delete']);
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);
    confirm($delete_query);
    header("Location: comments.php"); //reload the query
  }

?>