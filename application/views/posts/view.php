<div class="row">
	<div class="col-6">
		<h2><?php echo $post['title']; ?></h2>
	</div>
	<div class="col-6">
		<a class="btn btn-dark" href="<?php echo base_url(); ?>posts"> Back </a>
	</div>
</div>
<small>Posted on: <?php echo $post['created_at']; ?><strong><?php echo $post_cat['name']; ?></strong></small>
<br><br>
<img class=" img-thumbnail post-view-image" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<p><?php echo $post['body']; ?></p>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>" class="btn btn-success pull-right">Edit</a> <br><br>
<?php echo form_open('posts/delete/'.$post['id']); ?>
	<input type="submit" name="" value="Delete" class="btn btn-danger">
</form>