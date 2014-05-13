<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/chat.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/start.js" charset="utf-8"></script>
	<script type="text/javascript" src="../js/styleChange.js" charset="utf-8"></script>

</head>

<body class="first" onload="chat.update()">

    <div id="pageWrap">
    
        <h2>Welcome to jQuery/PHP Chat</h2>
		
		<div id="top">		
			<form id="nicknameForm">
				<input type="text" name="username" class="input" id="nicknameInput" placeholder="Введите имя">
				<input type="button" class="input" onclick='getNickname()' value="OK">
			</form>
		
			<p id="nameArea" class="first"></p>
		
			<form id="changeStyleForm">
				<input type="button" class="input" id="changeStyleButton" value="Изменить стиль">
			</form>
		</div>
        
		<div id="chatWrap" class="first">
			<div id="chatReadArea">
			</div>
			<div id="chatWriteArea">
				<form id="sendMessageArea">
					<p class="first"> Введите сообщение: </p>
					<textarea id="sendie" maxlength = '1000'></textarea>
				</form>
			</div>
		</div>       
    
    </div>
	
	<footer>
		<nav>
			<ul class="footer">
				<li><form action=""><button class="first">О сайте</button></form></li>
				<li><form action=""><button class="first">Помощь</button></form></li>
				<li><form action=""><button class="first">Контакты</button></form></li>
			</ul>
		</nav>
	</footer>

</body>

</html>