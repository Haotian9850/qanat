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
					<textarea class="form-control" name="comment" rows="6" required></textarea>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Give us a rating from 1 to 100</label>
					<input type="number" min="1" max="100" class="form-control" name="rating" required>
				</div>
				<button type="submit" class="btn btn-primary mb-5">Submit</button> 
			</form>
	<div class="row row-margined">
		<h1 class="display-4">Stats</h1>
		<table class="table">
			<thead>
				<tr>
				<th scope="col">Total number of users</th>
				<th scope="col">Average rating</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td><?php echo $stats["numUsers"] ?></td>
				<td><?php echo $stats["avgRating"] ?></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="row row-margined">
		<h1 class="display-4">All Reviews</h1>
		<table class="table">
			<thead>
				<tr>
				<th scope="col">Comment</th>
				<th scope="col">Rating</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($reviews as $review){ ?>
				<tr>			
				<td><?php echo $review["text"] ?></td>
				<td><?php echo $review["rating"] ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>


<?php
  include "footer.php";
?>
