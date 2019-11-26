<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Qanat</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="?action=homepage" class="navbar-brand">Qanat: Find Electricity for Your Car</a>
        <?php if(isset($_SESSION["username"])){ ?>
          <div class="btn btn-light" role="alert">
                  Logged in as <?php echo htmlspecialchars($_SESSION["username"], ENT_QUOTES, 'UTF-8') ?> &nbsp;
              <a href="?action=logout">Log out</a>
          </div>
          <a href="?action=profile" class="btn btn-light">My Profile</a>
        <?php } ?>
        &nbsp;&nbsp;&nbsp;

        &nbsp;&nbsp;&nbsp;
        <?php if(!isset($_SESSION["username"])){ ?>
          <a href="?action=register" class="btn btn-light">Register</a>
          <a href="?action=login" class="btn btn-light">Log in</a>
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
