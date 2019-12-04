<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../resources/css/style.css">

    <title>Qanat</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?action=homepage">Qanat</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION["username"])){ ?>
        <li class="nav-item active">
        <a class="btn btn-disabled">Logged in as <?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES, 'UTF-8') ?></a>
        </li>
        <li class="nav-item">
        <a href="?action=review" class="btn btn-primary">Leave a Review</a>
        <a href="?action=profile" class="btn btn-secondary">My Profile</a>
        <a href="?action=logout" class="btn btn-danger">Log out</a>
        </li>
        <?php } ?>
        <?php if(!isset($_SESSION["username"])){ ?>
        <li class="nav-item">
        <a href="?action=register" class="btn btn-primary">Register</a>
        <a href="?action=login" class="btn btn-success">Log in</a>
        </li>
        <?php } ?>
      </ul>
    </div>
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
