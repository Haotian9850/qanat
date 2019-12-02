<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/style.css">

    <title>Qanat</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="?action=homepage" class="navbar-brand">Qanat: Find Electricity for Your Car</a>
        <?php if(isset($_SESSION["username"])){ ?>
          <a class="btn btn-light">Logged in as <?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES, 'UTF-8') ?></a>&nbsp;&nbsp;
          <a href="?action=review" class="btn btn-primary">Leave a Review</a> &nbsp;&nbsp;&nbsp;
          <a href="?action=profile" class="btn btn-secondary">My Profile</a>&nbsp;&nbsp;&nbsp;
          <a href="?action=logout" class="btn btn-danger">Log out</a>
        <?php } ?>
        <?php if(!isset($_SESSION["username"])){ ?>
          <a href="?action=register" class="btn btn-primary">Register</a>&nbsp;&nbsp;&nbsp;
          <a href="?action=login" class="btn btn-success">Log in</a>
        <?php } ?>
  </nav>
  <div class="main-content">
    <div class="main-block">
      <div class="row margined">
        <?php if(isset($_SESSION["statusMsg"])){ ?>
          <div class="alert alert-primary msg" role="alert">
            <?php echo htmlspecialchars($_SESSION["statusMsg"], ENT_QUOTES, 'UTF-8'); ?>
          </div>
        <?php } ?>
      </div>
      <div class="row margined">
        <?php if(isset($_SESSION["errMsg"])){ ?>
          <div class="alert alert-danger msg" role="alert">
            <?php echo htmlspecialchars($_SESSION["errMsg"], ENT_QUOTES, 'UTF-8'); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
