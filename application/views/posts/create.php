<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('posts/create'); ?>
	<div class="form-group">
		<label>Title</label>
	    <input type="text" class="form-control" name="title" placeholder="Add Title" >
	</div>
	<div class="form-group">
		<label>Body</label>
	    <textarea class="form-control" name="body" placeholder="Add Body"></textarea>
	</div>
	<div class="form-group">
		<label>Category</label>
		<select name="category_id" class="form-control">
			<?php foreach($categories as $category): ?>
				<option value="<?php echo $category['id']; ?>" ><?php echo $category['name']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group">
      <label>File input</label>
      <input type="file" class="form-control-file" name="userfile">
    </div>
	<button type="submit" class="btn btn-primary mr-2">Submit</button>
	<a href="<?= site_url();?>posts" class="btn btn-danger"> Cancel</a>
</form>