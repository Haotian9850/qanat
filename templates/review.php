<?php
  include "header.php";
?>

<div class="main-content">
	<div class="main-block">
		<div class="row row-margined centered">
            <h1 class="display-4">Leave a Review</h1>
        </div>
			<form action="?action=review" method="POST">
				<div class="form-group">
					<label>Comments</label>
					<textarea class="form-control" name="comment" rows="6"></textarea>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Give us a rating from 1 to 10</label>
					<input type="number" min="1" maxl="10" class="form-control" name="rating">
				</div>
				<button type="submit" class="btn btn-primary mb-5">Submit</button> 
			</form>

	</div>
</div>


<?php
  include "footer.php";
?>
