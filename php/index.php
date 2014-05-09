<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');
?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    
    <title>Chat</title>
    
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/chat.js" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
    
		var name='';
        // вводим никнейм
		function getNickname() {
			name = document.getElementById('username').value;
			//задаем имя по умолчанию
			if (!name || name === '')
				name = "Guest" + Math.floor(Math.random() * (1000)) + 1;
			// убираем запрещенные символы
			name = name.replace(/(<([^>]+)>)/ig,"");
			$("#name-area").html("You are: <span>" + name + "</span>");
			var hide = document.getElementById('nicknameForm');
			hide.style.display = 'none';
		}    	
    	
    	// стартуем чат
        var chat =  new Chat();
    	$(function() {
    		 chat.getState();
		
			// наблюдаем за полем ввода             
			$("#sendie").keydown(function(event) {  
                
				var key = event.which;  
                //все клавиши 
                
				if (key >= 33) {
                    
					var maxLength = $(this).attr("maxlength");  
                    var length = this.value.length;  
                     
                     // не разрешаем, если длина > максимальной
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // посылаем
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } 
					else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    		    }
            });
        });
    </script>

</head>

<body class="first" onload="setInterval('chat.update()', 1000)">

    <div id="page-wrap">
    
        <h2>Welcome to jQuery/PHP Chat</h2>
        <input type="button" id="style" value="Изменить стиль">
		<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$('#style').click(function(){
				
				$('body').each(function(){
					if ($(this).hasClass('first'))
						{
							$('body').removeClass('first').addClass('second');
						}
					else
						{
							$('body').removeClass('second').addClass('first');
						}					
				});				
				
				$('#chat-wrap').each(function(){
					if ($(this).hasClass('first'))
						{
							$('#chat-wrap').removeClass('first').addClass('second');
						}
					else
						{
							$('#chat-wrap').removeClass('second').addClass('first');
						}					
				});
				
				$('#send-message-area p').each(function(){
					if ($(this).hasClass('first'))
						{
							$('#send-message-area p').removeClass('first').addClass('second');
						}
					else
						{
							$('#send-message-area p').removeClass('second').addClass('first');
						}					
				});
				
				$('#name-area').each(function(){
					if ($(this).hasClass('first'))
						{
							$('#name-area').removeClass('first').addClass('second');
						}
					else
						{
							$('#name-area').removeClass('second').addClass('first');
						}					
				});
			});
		});
		</script>
		
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