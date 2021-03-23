<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
	<div class="form-group mt-3 mb-1" style="max-width: 40em">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="form-control">
	</div>
	<div class="form-group mb-1" style="max-width: 40em">
		<label for="email">Email</label>
		<input type="text" name="email" id="email" class="form-control">
	</div>
	<div class="form-group mb-1" style="max-width: 40em">
		<label for="zipcode">Zipcode</label>
		<input type="text" name="zipcode" id="zipcode" class="form-control">
	</div>
	<div class="form-group mt-3 mb-1" style="max-width: 40em">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" class="form-control">
	</div>
	<div class="form-group mb-1" style="max-width: 40em">
		<label for="password">Password</label>
		<input type="text" name="password" id="password" class="form-control">
	</div>
	<div class="form-group mb-3" style="max-width: 40em">
		<label for="password2">Confirm Password</label>
		<input type="text" name="password2" id="password2" class="form-control">
	</div>
	<button type="submit" class="btn btn-info mr-3">Submit</button>
	<a class="btn btn-outline-secondary" href="<?php echo site_url();?>posts">Cancel</a>
</form>
