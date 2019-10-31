<?php
  include "header.php";
?>

<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Register</h1>
        </div>
        <div class="row row-margined">
            <form action="">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Username</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Password</label>
                        <input type="text" class="form-control" id="inputCity">
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
                        <input type="text" class="form-control" id="vin">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Make</label>
                        <input type="text" class="form-control" id="make">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Model</label>
                        <input type="text" class="form-control" id="model">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Year</label>
                        <input type="text" class="form-control" id="model">
                    </div>`
    var btn = document.getElementById("addNewCar");
    btn.addEventListener("click", () => {
        $("#carInput").append(newCarInput);
    });
</script>


<?php
  include "footer.php";
?>