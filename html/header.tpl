<!DOCTYPE html>
<html>
<head>
<title><? echo $title?></title>
<? foreach($css as $it_css){?>
<link href="<? echo $it_css?>" rel="stylesheet">
<? }?>

<? foreach($js as $it_js){?>
	<script src="<? echo $it_js;?>"></script>
<? }?>

</head>
<body>
<header>
	<div class="line_for_logo"></div>
	<nav class="navbar">
		<div class="container">
			<div class="logo col-md-6 col-sm-12">
				<a href="<? echo loc?>" title="На главную">
					<img src="img/logo.png">
				</a>
			</div>
			<div class="main_menu col-md-6 col-lg-6 visible-md visible-lg">
				<ul>
					<li>
						<a href="#" style="color:#e0e0e0;">ТОВАРЫ</a>
					</li>
					<li>
						<a href="#" style="color:#e0e0e0;">УСЛУГИ</a>
					</li>
					<li>
						<a href="#" style="color:#e0e0e0;">ФОРУМ</a>
					</li>
					<li>
						<a href="#" style="color:#e0e0e0;">КОРЗИНА</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="clear"></div>
	<div class="main_menu_mobile col-xs-12 col-sm-12 visible-xs visible-sm">
		<ul>
			<li>
				<a href="#" style="color:#e0e0e0;">ТОВАРЫ</a>
			</li>
			<li>
				<a href="#" style="color:#e0e0e0;">УСЛУГИ</a>
			</li>
			<li>
				<a href="#" style="color:#e0e0e0;">ФОРУМ</a>
			</li>
			<li>
				<a href="#" style="color:#e0e0e0;">КОРЗИНА</a>
			</li>
		</ul>
	</div>
	<div class="bread_crumbs">
		<div class="container">
			<ul>
			<? for($i = 0; $i < count($bread_crumbs); $i++)
			{
				if($i < (count($bread_crumbs) - 1))
				{
			?>
				<li><a href="<? echo $bread_crumbs[$i]['href']?>"><? echo $bread_crumbs[$i]['name']?> > </a></li>
			<?
				} else {
				?>
				<li><? echo $bread_crumbs[$i]['name']?></li>
				<?
				}
			}
			?>
			</ul>
		</div>
	</div>
</header>
