<html>
    <head>
        <title>
            <?php echo($title); ?>
        </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8"/>
		<meta name="keywords" content="Coding,MNIT,DBMS" />
		<script type="application/x-javascript">
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<link href="<?php echo CSS_PATH.'darkbox.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'bootstrap.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'style.css'; ?>" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo CSS_PATH.'font-awesome.css'; ?>" rel="stylesheet">
		<link href="<?php echo CSS_PATH.'w3.css'; ?>" rel="stylesheet">
        <link rel="icon" type="image/jpeg" href="/favicon/logo.jpg">
    </head>
    <body>
		<div class="header" id="home" style="position: sticky;z-index: 5; width: 100%;height: auto;">
			<div class="banner_header_top_wthree">
				<div class="agileits-logo">
					<h1 style="margin-right:17%;"><a href="<?php echo(generate_link('todo', 'home')); ?>"><i class="fa" aria-hidden="true"></i> <?php echo($header); ?></a></h1>
				</div>
				<?php if($header =='Test' && $marks != -1 ) {?>
					<input class="w3-button w3-blue w3-hover-cyan w3-ripple w3-round w3-large w3-right" id="test_marks"  value='Marks in Last Test: <?php echo $marks;  ?>'>
				<?php }?>
		</div>
	</div>