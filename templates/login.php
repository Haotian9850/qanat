<?php
  include "header.php";
?>

<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Log in</h1>
        </div>
            <form action="?action=login" method="POST">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <br/>
                <br/>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>
    </div>
</div>


<?php
  include "footer.php";
?>