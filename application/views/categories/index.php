<h2><?= $title; ?></h2>

<?php foreach($categories as $category): ?>
	<a href="<?= site_url();?>categories/posts/<?= $category['id']; ?>"><?= $category['name']; ?></a>
	<hr>
<?php endforeach; ?>