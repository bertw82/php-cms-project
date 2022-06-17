
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./index.php">MyBlog Home</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

<?php 

// if no one is logged in, show login link
if(!isset($_SESSION['user_role'])){
   echo "<li><a href='#loginDiv'>Login</a></li>";
}

// if admin show the admin link in the nav
if(isset($_SESSION['user_role'])){
  if($_SESSION['user_role'] === 'admin'){
    echo "<li><a href='admin'>Admin Dashboard</a></li>";

  }
}

// if user show the edit post button 
if(isset($_SESSION['user_role'])){
  if($_SESSION['user_role'] === 'admin'){
  if(isset($_GET['p_id'])){
    $the_get_id = escape($_GET['p_id']);
    echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_get_id}'>Edit Post</a></li>";
  }
}
}

// show nav options for admin
if(isset($_SESSION['user_role'])){
  if($_SESSION['user_role'] === 'admin'){
?>

<li class="dropdown navbar-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Welcome, <?php echo $_SESSION['user_name']; ?> <b class="caret"></b></a>
<ul class="dropdown-menu">
    <li>
        <a href="admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
    </li>
    <li>
        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
    </li>
    <li class="divider"></li>
    <li>
        <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
    </li>
</ul>
</li>

<?php

  } elseif($_SESSION['user_role'] === 'subscriber'){
    ?>
    <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Welcome, <?php echo $_SESSION['user_name']; ?> <b class="caret"></b></a>
<ul class="dropdown-menu">
    <li class="divider"></li>
    <li>
        <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
    </li>
</ul>
</li>

<?php
  }
}
?>

         
        </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>