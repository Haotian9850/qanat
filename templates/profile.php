<?php
  include "header.php";
?>

<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Your Vehicles</h1>
        </div>

        <div class="row row-margined">
          	<ul class="list-group">
	        <?php foreach($cars as $car){ ?>
	          <li class="list-group-item d-flex justify-content-between align-items-center plug">
	            <b>VIN: </b><?php echo htmlspecialchars($car["VIN"], ENT_QUOTES, 'UTF-8'); ?> &nbsp;&nbsp; 
	            <b>Make: </b><?php echo htmlspecialchars($car["make"], ENT_QUOTES, 'UTF-8'); ?> &nbsp;&nbsp;
	            <b>Model: </b><?php echo htmlspecialchars($car["model"], ENT_QUOTES, 'UTF-8'); ?> &nbsp;&nbsp;
	            <b>Year: </b><?php echo htmlspecialchars($car["year"], ENT_QUOTES, 'UTF-8'); ?> &nbsp;&nbsp;
                <div class="btn btn-primary" onclick="deleteCar('<?php echo htmlspecialchars($car["VIN"], ENT_QUOTES, 'UTF-8');?>');">Delete</div>
	          </li>
	        <?php } ?>
	        </ul>
        </div>

        <div class="row row-margined">
            <h1 class="display-4">Register Vehicles</h1>
        </div>
        <div class="row row-margined">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
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
</script>

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