<h2><?= $title; ?></h2>
<div class="row">
	<div class="col-md-6">
		<?php echo validation_errors(); ?>
		<?= form_open('categories/create'); ?>
			<div class="form-group">
				<input type="text" name="category_name" placeholder="Enter Category Name" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
		</form>
	</div>	
</div>
