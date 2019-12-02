<?php
  include "header.php";
?>

<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Your Vehicles</h1>
        </div>

        <?php if(count($cars) > 0){ ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">VIN</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($cars as $car){ ?>
                    <tr>
                        <td scope="row" class="Vin">
                            <?php echo htmlspecialchars($car["VIN"], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($car["make"], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($car["model"], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars($car["year"], ENT_QUOTES, 'UTF-8'); ?>
                        </td>
                        <td>
                            <input type="button" class="btn btn-danger deleteCar" value="Delete this car" onclick="location.href='?action=deleteCar&vin=<?php echo htmlspecialchars($car['VIN'], ENT_QUOTES, 'UTF-8'); ?>';">
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
        <?php }else{ ?>
            <div class="alert alert-danger" role="alert">
                Currently, there is no car registered with you!
            </div>
        <?php } ?>


        <div class="row row-margined">
            <h1 class="display-4">Register Vehicles</h1>
        </div>
            <form action="?action=profile" method="POST">
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
                <button type="submit" class="btn btn-primary mb-10">Submit</button>
            </form>
    </div>
</div>

<script>
    function deleteCar(vin) {
        var request = new XMLHttpRequest();
        request.open("POST", "index.php?action=deleteCar", false);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send('VIN='.concat(vin));
        location.reload(true);
    }
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