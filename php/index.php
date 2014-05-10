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

</head>

<body class="first" onload="chat.update()">

    <div id="page-wrap">
    
        <h2>Welcome to jQuery/PHP Chat</h2>
        <input type="button" id="style" value="Изменить стиль">
		<script type="text/javascript" src="../js/styleChange.js" charset="utf-8"></script>
		
		<span id="name-area" class="first"></span>
		
		<form id="nicknameForm">
			<input type="text" name="username" id="username" placeholder="Введите имя">
			<input type="button" onclick='getNickname()' value="Ok">
		</form>           
        
		<div id="chat-wrap" class="first">
			<div id="chat-area">
			</div>
		</div>
        
        <form id="send-message-area">
            <p class="first"> Введите сообщение: </p>
            <textarea id="sendie" maxlength = '1000' ></textarea>
        </form>
    
    </div>

</body>

</html>