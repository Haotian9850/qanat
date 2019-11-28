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
          <h2 class="display-5">Here are a list of charging stations available in our database: </h2>
        </div>
        <div class="row row-margined">
          <?php foreach($stations as $station){ ?>
            <div class="card station-card">
              <div class="card-header">
                <?php echo $station["location"] ?>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo $station["num_plugs"] ?> plugs in total</h5>
                <ul class="list-group">
                  <?php
                    echo count($station["plugs"]);
                  ?>
                <?php foreach($station["plugs"] as $plug){ ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center plug">
                    <b>Model: </b><?php echo $plug["model_no"] ?>
                    <b>Serial: </b><?php echo $plug["serial_no"] ?>
                    <span class="badge badge-primary badge-pill">
                    <?php echo $plug["charge_speed"] ?>
                    WHr / h</span>
                  </li>
                <?php } ?>
                </ul>
                <a href="#" class="btn btn-primary">Check it out</a>
              </div>
            </div>
          <?php } ?>
        </div>
    </div>


</div>


<?php
  include "footer.php";
?>
