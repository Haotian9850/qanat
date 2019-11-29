<?php
  include "header.php";
?>
<div class="main-content">
    <div class="main-block">
        <div class="row row-margined centered">
            <h1 class="display-4"><b>Qanat: Find Charging for Your Electric Car</b></h1>
        </div>
        
          <?php if(isset($_SESSION["username"])){?>
            <div class="row row-margined">
            <label id="filter"><input type="checkbox"> <strong>Only show plugs that my car can use</strong></label>
            </div>
          <?php } ?>

        <div class="row row-margined map">
          <div class="col-md-8">
            <div>
                <iframe width="800" height="400" frameborder="0" src="https://www.bing.com/maps/embed?h=400&w=800&cp=38.0694~-78.494&lvl=11&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="yes">
                </iframe>
                <div style="white-space: nowrap; text-align: center; width: 800px; padding: 6px 0;">
                    <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=38.0694~-78.494&amp;sty=r&amp;lvl=11&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
                    <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=38.0694~-78.494&amp;sty=r&amp;lvl=11&amp;rtp=~pos.38.0694_-78.494____&amp;FORM=MBEDLD">Get Directions</a>
                </div>
            </div>
          </div>
          <div class="col-md-4">
          <div class="list-group">
              <a class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Your current location:</h5>
                </div>
                <ul class="list-group">
                  <li class="list-group-item"><b>Latitude: </b><span id="currLatitude"></span></li>
                  <li class="list-group-item"><b>Longitude: </b><span id="currLongitude"></span></li>
                </ul>
              </a>
              <a class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Closest charging station to you:</h5>
                </div>
                <ul class="list-group">
                <li class="list-group-item"><b>Latitude: </b><span id="closestLatitude"></span></li>
                  <li class="list-group-item"><b>Longitude: </b><span id="closestLongitude"></span></li>
                </ul>
              </a>
              <a class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">Estimated charding time:</h5>
                </div>
                <p class="mb-1">150 minutes</p>
              </a>
            </div>
          </div>
        </div>

        <div class="row row-margined">
          <h2 class="display-5">Here are a list of charging stations available in our database: </h2>
        </div>
        
        <div class="row row-margined">
          <?php foreach($stations as $station){ ?>
            <div class="card station-card">
              <div class="card-header">
                <b>Location: </b><?php echo $station["location"] ?>
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
