<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery Auto Populate Box</title>
	<base href="<?php echo substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>" />
	<link href="css/demo.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.autopopulatebox.js" type="text/javascript"></script>
</head>
<body>

<h1>jQuery Auto Populate Box!</h1>

<h3 style="padding-bottom: 20px;">Sample 1</h3>

<div class="input clearfix">
	<label for="tests">Tests</label>
	<select id="tests" name="test">
		<option value="">(select)</option>
		<?php foreach ($tests as $key => $test): ?>
		<option value="<?php echo $key; ?>"> <?php echo $test; ?> </option>
		<?php endforeach; ?>
	</select>
</div>

<div class="input clearfix">
	<label for="categories">Categories</label>
	<select id="categories" name="category">
		<option value="">(select)</option>
	</select>
</div>

<div class="input clearfix">
	<label for="contents">Contents</label>
	<select id="contents" name="content">
		<option value="">(select)</option>
	</select>
</div>
<script>
	jQuery(function($) {
		$('#tests').autoPopulateBox({
			emptyLabel: '(select)',
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',
			change: 'category',
			
			category: {
				target: '#categories',
				change: 'content'
			},
			content: {
				target: '#contents'
			}
		});
	});
</script>
<br /><br />


<h3 style="padding-bottom: 20px;" id="sample2">Sample 2</h3>

<div class="clearfix">
	<div class="multiple">
		<label for="tests2">Tests</label>
		<select id="tests2" name="test2" multiple="multiple">
			<?php foreach ($tests as $key => $test): ?>
			<option value="<?php echo $key; ?>"> <?php echo $test; ?> </option>
			<?php endforeach; ?>
		</select>
	</div>
	
	<div class="multiple">
		<label for="categories2">Categories</label>
		<select id="categories2" name="category" multiple="multiple"></select>
	</div>
	
	<div class="multiple">
		<label for="contents2">Contents</label>
		<select id="contents2" name="content" multiple="multiple"></select>
	</div>
</div>

<script>
	jQuery(function($) {
		$('#tests2').autoPopulateBox({
			url: 'index.php/autopopulate/json/',
			allSeparator: '/',
			change: 'category2',
			
			category2: {
				target: '#categories2',
				change: 'content2'
			},
			content2: {
				target: '#contents2'
			}
		});
	});
</script>

</body>
</html>