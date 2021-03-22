<h2><?= $title ?></h2>
<br>
<?php foreach($posts as $post) : ?>
<div class="row">
	<div class="col-3">
		<img class=" img-thumbnail post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
	</div>
	<div class="col-9">
		<h3><?php echo $post['title']; ?></h3>
		<small>Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name'] ?></strong></small>
		<p><?php echo word_limiter($post['body'], 60); ?></p>
		<p><a class="btn btn-success" href="<?php echo site_url('posts/'.$post['slug']); ?>"> Read more..</a></p>
	</div>
</div>
<hr>
<?php endforeach; ?>