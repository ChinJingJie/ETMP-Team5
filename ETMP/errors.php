<<<<<<< HEAD
<?php if (count($errors) > 0): ?>
	<div class ="error">
		<?php foreach ($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
=======
<?php if (count($errors) > 0): ?>
	<div class ="error">
		<?php foreach ($errors as $error): ?>
			<p style="color: red;"><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
>>>>>>> ca0545b31f0535b68d2a3c59779c48ba1f9a9a9b
<?php endif ?>