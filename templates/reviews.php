<?php
  include "header.php";
?>

<div class="main-content">
    <div class="main-block">
        <div class="row row-margined">
            <h1 class="display-4">Review</h1>
        </div>
        <div class="row row-margined">
            <form action="?action=mkreview" method="POST">
                <div class="form-row" id="carInput">
                    <div class="form-group col-md-4">
                        <label>Comment Text</label>
                        <input type="text" size="150" maxlength="95" class="form-control" name="reviewarr[]">
                    </div>
					<div class="form-group col-md-4">
                        <label>Rating (out of 100) </label>
                        <input type="text" size="3" maxlength="3" class="form-control" name="ratingarr[]">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
			
			<label>Current Reviews</label>
			<?php foreach($review["text"] as $rev){ ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center plug">
                    <b>Text: </b><?php echo $rev["text"] ?>
                    <b>Rating: </b><?php echo $rev["rating"] ?>
                  </li>
                <?php } ?>
                
			
        </div>
    </div>
</div>



<?php
  include "footer.php";
?>