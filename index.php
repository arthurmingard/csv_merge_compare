<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Arthur Mingard (info@arthurmingard.com)">
	<meta name="copyright" content="">
	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet/less" href="less/ui_master.less">
	<script src='js/jquery.2.0.0.js'></script>
	<script src='js/jquery_ui/ui/jquery-ui.js'></script>
	<script src='js/dropzone.js'></script>
	<script type='text/javascript' src='js/less.1.3.3.min.js'></script>
	<script src='js/csv.solved.driver.js'></script>
</head>
	<body>
		<div class='split_panel'>
			<div class='drop_zone'>
				<div id='source' name='dzone' class='circular drop_target left'>
					<div class='circular drop_target left inner'>
						<p>Drop <b>Original</b> File here</p>
					</div>
					<div id='source-preview' class='preview'></div>
					<div class='progress circular'></div>
				</div>
				<div class='filename rounded left'>No file name</div>
			</div>
		</div>
		<div class='split_panel'>
			<div class='drop_zone'>
				<div id='contrast' name='dzone' class='circular drop_target right'>
					<div class='circular drop_target right inner'>
						<p>Drop <b>Compare</b> File here</p>
					</div>
					<div id='contrast-preview' class='preview'></div>
					<div class='progress circular'></div>
				</div>
				<div class='filename rounded right'>No file name</div>
			</div>
		</div>
		<div class='pane' id='options'>
			 <input type="button" class='select' id='merge' value="Merge"/>
			 <input type="button" class='select' id='duplicate' value="Duplicates"/>
			 <input type="button" class='select' id='drop' value="Dropped"/>
		</div>
		<div class='results pane' id="results_pane">
		</div>
	</body>
</html>