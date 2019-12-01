<?php
  include "header.php";
?>
<div class="main-content">
    <div class="main-block">
        <div class="row row-margined centered">
            <h1 class="display-4"><b>Qanat: Find Electricity for Your Electric Car</b></h1>
        </div>

        <div class="row row-margined map">
          <div class="col-md-8">
            <div>
                <iframe id="map" width="800" height="400" frameborder="0" src="" scrolling="yes">
                </iframe>
                <div style="white-space: nowrap; text-align: center; width: 800px; padding: 6px 0;">
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="list-group">
                  <a class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Your current location:</h5>
                    </div>
                    <ul class="list-group">
                      <li class="list-group-item"><b>Latitude: </b><code id="currLatitude"></code></li>
                      <li class="list-group-item"><b>Longitude: </b><code id="currLongitude"></code></li>
                    </ul>
                  </a>
                  <a class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">Closest charging station to you:</h5>
                    </div>
                    <ul class="list-group">
                      <li class="list-group-item"><b>Station ID: </b><code id="closestId"></code></li>
                      <li class="list-group-item"><b>Latitude: </b><code id="closestLatitude"></code></li>
                      <li class="list-group-item"><b>Longitude: </b><code id="closestLongitude"></code></li>
                      <li class="list-group-item"><b>Distance: </b><code id="dist"></code> km</li>
                    </ul>
                  </a>
                </div>
              </div>

              <div class="row mt-2 justify-content-between">
              <a class="btn btn-primary" id="dirMapLink" target="_blank" href="">Get Directions</a>  
              </div>
            </div>
          </div>


        <div class="row row-margined">
          <h2 class="display-5">Here are a list of charging stations available in our database: </h2>
        </div>
        
        <?php if(isset($_SESSION["username"])){?>
            <div class="row row-margined">
            <label id="filter"><input type="checkbox"> <strong>Only show plugs that my car can use</strong></label>
            </div>
        <?php } ?>

        <div class="row row-margined">
          <?php foreach($stations as $station){ ?>
            <div class="card station-card">
              <div class="card-header">
                <b>Location: </b><?php echo $station["location"] ?>
              </div>
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($station["num_plugs"], ENT_QUOTES, 'UTF-8') ?> plugs in total</h5>
                <h5 class="card-title compatible_plug_ct" style="display: none;"><?php echo $station["num_compatible"] ?> compatible plugs</h5>
                <ul class="list-group">
                <?php foreach($station["plugs"] as $plug){ ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center plug" compatible=<?php echo $plug["compatible"]?> >
                    <b>Model: </b><?php echo htmlspecialchars($plug["model_no"], ENT_QUOTES, 'UTF-8') ?>
                    <b>Serial: </b><?php echo htmlspecialchars($plug["serial_no"], ENT_QUOTES, 'UTF-8') ?>
                    <span class="badge badge-primary badge-pill">
                    <?php echo htmlspecialchars($plug["charge_speed"], ENT_QUOTES, 'UTF-8') ?>
                    WHr / h
                    </span>
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
