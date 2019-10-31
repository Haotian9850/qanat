<?php
  include "header.php";
?>

<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Register</h1>
        </div>
        <div class="row row-margined">
            <form action="?action=register" method="POST">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-row" id="carInput">
                    <div class="form-group col-md-4">
                        <label>VIN</label>
                        <input type="text" class="form-control" name="vin[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Make</label>
                        <input type="text" class="form-control" name="make[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Model</label>
                        <input type="text" class="form-control" name="model[]">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year[]">
                    </div>
                </div>
                <label id="addNewCar" class="btn btn-primary">Add a new car</label>
                <br/>
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    newCarInput = `<div class="form-group col-md-4">
                        <label>VIN</label>
                        <input type="text" class="form-control" name="vin[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Make</label>
                        <input type="text" class="form-control" name="make[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Model</label>
                        <input type="text" class="form-control" name="model[]">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Year</label>
                        <input type="text" class="form-control" name="year[]">
                    </div>`;
    document.getElementById("addNewCar").addEventListener("click", () => {
        $("#carInput").append(newCarInput);
    });
</script>


<?php
  include "footer.php";
?>