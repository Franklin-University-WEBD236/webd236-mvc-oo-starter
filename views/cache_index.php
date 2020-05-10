<!DOCTYPE html>
<html>
  <head>
    <title><?php echo(htmlspecialchars(CONFIG['applicationName']. " - " . $title)); ?></title>
    <link rel="shortcut icon" href="https://cdn.glitch.com/7635e9c3-2015-4ec8-967a-16ca37cc9e55%2Ffavicon.ico" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/static/style.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="/static/custom.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <img src="https://cdn.glitch.com/7635e9c3-2015-4ec8-967a-16ca37cc9e55%2Ftodo.svg" width="30" height="30" class="d-inline-block align-top" alt="">To Do List</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
              <span class="material-icons" style="vertical-align:bottom">build</span> Tools
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="nav-link" href="https://glitch.com/edit/#!/remix/<?php echo(htmlspecialchars(getenv('PROJECT_DOMAIN'))); ?>">Remix</a>
              <a class="nav-link" onclick="post('/reset');" style="cursor:pointer">DB Reset</a>
              <a class="nav-link" href="/phpliteadmin.php" target="_blank" style="cursor:pointer">DB Admin</a>
            </div>
          </li>
        </ul>          
        <ul class="navbar-nav">
<?php  if (isLoggedIn()): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
              <span class="material-icons" style="vertical-align:bottom">account_circle</span> <?php echo(htmlspecialchars($_SESSION['user']['firstName'])); ?> <?php echo(htmlspecialchars($_SESSION['user']['lastName'])); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="/user/edit/<?php echo(htmlspecialchars($_SESSION['user']->id)); ?>">Edit profile</a>
              <a class="dropdown-item" href="/user/password/<?php echo(htmlspecialchars($_SESSION['user']->id)); ?>">Change password</a>
              <a class="dropdown-item" href="/user/logout">Logout</a>
            </div>
          </li>
<?php  else: ?>
          <li class="nav-item">
            <a class="nav-link" onclick="get('/user/login');" style="cursor:pointer">Login</a>
          </li>
<?php  endif; ?>
        </ul>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-4"><?php echo(htmlspecialchars(CONFIG['applicationName']. " - " . $title)); ?></h1>
          <p class="lead"><?php echo(htmlspecialchars(CONFIG['leadDescription'])); ?></p>
          <p><em>Author: <?php echo(htmlspecialchars(CONFIG['authorName'])); ?></em></p>
          <hr>
        </div>
      </div>

<?php  if (isset($errors)): ?>
<div class="row">
  <div class="col-lg-12">
    <div class="alert alert-danger">
      Please fix the following errors:
      <ul class="mb-0">
<?php  foreach ($errors as $error): ?>
        <li><?php echo($error); ?></li>
<?php  endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?php  endif;?>
      
<?php  if (isset($_SESSION['flash'])): ?>
<div class="alert alert-success alert-dismissible flash-message" role="alert" id="flash">
  <?php echo($_SESSION['flash']); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $("div.flash-message").fadeTo(1000,1).delay(2000).fadeOut(1000);
  });
</script>
<?php  
   unset($_SESSION['flash']);
   endif;
?>


<div class="row">
  <div class="col-lg-12">
    <h2>How to use this starter</h2>
    <p>This application can be used as a starting point for any
    assignment in WEBD 236 that requires the non-object oriented
    model-view-controller architecture. It is configured with the
    framework, an empty database, and some tools. Here are some ways
    you can use this starter.
      <ul>
        <li>Several application level constants are available in <code>include/config.php</code> file. </li>
        <li>To work with the database, edit the <code><?php echo(htmlspecialchars(CONFIG['databaseFile'] . ".sql")); ?></code> file
        in the root of the project to create tables, add starter
        data, etc. Then under the "Tools" menu, click "DB Reset."
        This will reload the database from the SQL file by running the
        <code>post_index()</code> method in 
        <code>controllers/ResetController.php</code>.</li>
        <li>Remember that a URL like <a href='/say/hello'>
          <code>say/hello</code></a> will
          look for <code>controllers/SayController.php</code> and invoke the
          method <code>get_hello()</code> (or <code>post_hello()</code>
          depending on the HTTP method).</li>
      </ul>
    </ul>
    </p>
  </div>
</div>
  
    </div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">WEBD 236 examples copyright &copy; 2019 <a href="https://www.franklin.edu/">Franklin University</a>.</span>
      </div>
    </footer>
  </body>
</html> 