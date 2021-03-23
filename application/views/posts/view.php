<div class="row">
	<div class="col-6">
		<h2><?php echo $post['title']; ?></h2>
	</div>
	<div class="col-6">
		<a class="btn btn-dark" href="<?php echo base_url(); ?>posts"> Back </a>
	</div>
</div>

<small>Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post_cat['name']; ?></strong></small>
<br><br>

<img class=" img-thumbnail post-view-image" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">

<p><?php echo $post['body']; ?></p>
	<div class="d-flex flex-row">
  		<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-success mr-2">Edit</a>

  		<?php echo form_open('posts/delete/'.$post['id']); ?>
			<input type="submit" name="submit" value="Delete" class="btn btn-danger">
		</form>
	</div>
<hr>

	<!-- Comment Section -->
<h4>Comments</h4>
	<?php if($comments) : ?>
		<?php foreach($comments as $comment) : ?>
			<div class="card mb-3" style="max-width: 30rem;">
				<div class="card-header"><strong><?php echo $comment['name']; ?></strong></div>
				<div class="card-body">
					<!-- <h4 class="card-title"></h4> -->
					<p class="card-text"><?php echo $comment['comment']; ?></p>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No comments</p>
	<?php endif; ?>
	<!-- End Comment Section -->
<hr>
<h4>Add Comments</h4>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']);?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Comment</label>
				<textarea class="form-control" name="comment"></textarea>
			</div>
			<input type="hidden" name="slug" value="<?= $post['slug'];?>" hidden>
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>



