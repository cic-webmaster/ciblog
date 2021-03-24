<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('users/login'); ?>
	<div class="form-group mt-3 mb-1" style="max-width: 40em">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" class="form-control">
	</div>
	<div class="form-group mb-3" style="max-width: 40em">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" class="form-control">
	</div>
	<button type="submit" class="btn btn-info mr-3">Submit</button>
	<a class="btn btn-outline-secondary" href="<?php echo site_url();?>posts">Cancel</a>
<?php echo form_close(); ?>
