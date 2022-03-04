<?

require "functions.php";


?>

<meta charset="UTF8">
<script type="text/javascript" src="/js/functions.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<link rel="icon" href="favicon.svg">
<link rel="stylesheet" href="/css/styles.css">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<header>
	<a href="/homepage.php"><button style="
	height: 30px;
	width: 188px; 
	font-size: 30px; 
	font-family: georgia;
	color: #000000!important; 
	position: fixed;
	top: 2px; 
	left: 10px;
	cursor: pointer;
	">Education.ru</button></a>


    <!-- search bar -->
    <div>
	<input type="text" class="search" style=" 
	position: fixed; 
	top: 10px; 
	left: 220px;
	"></input>

	<button class="headitem"; style="
	background-image: url(/media/search.svg); 
	position: fixed; 
	top: 6px; 
	left: calc(40% + 216px);
	" onclick="found($('.search').val())"></button>
	</div> <!-- search bar end -->


    <!-- account-related "buttons" -->
    <? if ($user['status'] == 'authorized') { ?>
    <a href="http://education.local"><button class="headitem" onclick="logout()" style="
	background-image: url(/media/exit.svg);
	float:  right;
	margin-right: 6px;
	"></button></a>

	<a href="support.php"><button class="headbtn" style="
	float:  right;
	margin-right: 8px;
	">Форум</button></a>

	<a href="profile.php"><button class="headbtn" style="
	float:  right;
	">Группы</button></a>
 <?}  else { ?>

	<a href="login.php"><button class="headitem" style="
	background-image: url(/media/enter.svg);
	float: right;
	"></button></a>
<? } ?>
	
</header>

<ul class="finder">

	<?
	$maters = mysqli_query($con,"SELECT * FROM `materials`");
	while($mat = mysqli_fetch_assoc($maters)) {
		echo '<li>'.$mat['name'].'</li>';
	}
	?>
	
</ul>

<script type="text/javascript" src="/js/procedures.js"></script>
<style type="text/css">
	.headbtn{
	font-size: 18px;
	width: 88px;
	padding: 1px;
	height: 32px;
	border-radius: 4px;
	color: #000;
	border: 1px solid #000;
	background-color: transparent;
	box-sizing: border-box;
	}
	.headbtn:hover{
	cursor: pointer;
	background-color: #8080a0;
}
</style>
