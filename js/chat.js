var instanse = false;
var state;
var file;

function Chat () {
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
}

//получаем состояние чата
function getStateOfChat(){
	if(!instanse){
		instanse = true;
		$.ajax({							//множество пар ключ/значение, которые генерируют запрос ajax
			type: "POST",
			url: "process.php",
			data: {  
				'function': 'getState',
				'file': file
			},
			dataType: "json",				//текстовый формат обмена данными, основанный на JavaScript
			
			success: function(data){
				state = data.state;
				instanse = false;
			},
		});
	}	 
}

//обновляем чат
function updateChat(){
	if(!instanse){
		instanse = true;
	    $.ajax({
			type: "POST",
			url: "process.php",
			data: {  
				'function': 'update',
				'state': state,
				'file': file
			},
			dataType: "json",
			success: function(data){
				if(data.text){
					for (var i = 0; i < data.text.length; i++) {
                        $('#chatReadArea').append($("<p>"+ data.text[i] +"</p>"));
                    }								  
				}
				$("#chatReadArea").scrollTop = $("#chatReadArea").scrollHeight;
				instanse = false;
				state = data.state;
			   },
		});
	}
}

//отправляем сообщение
function sendChat(message, nickname)
{       
    updateChat();
    $.ajax({
		type: "POST",
		url: "process.php",
		data: {  
			'function': 'send',
			'message': message,
			'nickname': nickname,
			'file': file
		},
		dataType: "json",
		success: function(data){
			updateChat();
		},
	});
}