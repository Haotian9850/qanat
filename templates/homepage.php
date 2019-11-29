<?php
  include "header.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="cheat.js"></script>
<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Qanat: Find Charging for Your Electric Car</h1>
        </div>
        <div class="row row-margined">
          <?php if(isset($_SESSION["username"])){?>
            <label id="filter"><input type="checkbox"> <strong>Only show plugs that my car can use</strong></label>
          <?php } ?>
          
          <h2 class="display-5">Here are a list of charging stations available in our database: </h2>
        </div>
        <div class="row row-margined">
          <?php foreach($stations as $station){ ?>
            <div class="card station-card">
              <div class="card-header">
                <?php echo $station["location"] ?>
              </div>
              <div class="card-body">
                <h5 class="card-title total_plug_ct"><?php echo $station["num_plugs"] ?> plugs in total</h5>
                <h5 class="card-title compatible_plug_ct" style="display: none;"><?php echo $station["num_compatible"] ?> compatible plugs</h5>
                <ul class="list-group">
                <?php foreach($station["plugs"] as $plug){ ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center plug" compatible=<?php echo $plug["compatible"]?> >
                    <b>Model: </b><?php echo $plug["model_no"] ?>
                    <b>Serial: </b><?php echo $plug["serial_no"] ?>
                    <span class="badge badge-primary badge-pill">
                    <?php echo $plug["charge_speed"] ?>
                    WHr / h</span>
                  </li>
                <?php } ?>
                </ul>
                <a href="#" onClick="return false;" class="btn btn-primary show-all">Show all</a>
              </div>
            </div>
          <?php } ?>
        </div>
    </div>


</div>


<?php
  include "footer.php";
?>
