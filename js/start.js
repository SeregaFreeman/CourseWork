// вводим никнейм
function getNickname() {
	var name = $("#nicknameInput").val();
	if (!name || name == '') //задаем имя по умолчанию
		name = "Guest" + Math.floor(Math.random() * (1000)) + 1;
	name = name.replace(/(<([^>]+)>)/ig,""); // убираем запрещенные символы
	$("#nameArea").html("You are: <span>" + name + "</span>");
	$("#nicknameForm").css("display", "none");
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
                event.preventDefault();  //позволяет предотвратить выполнение стандартного действия
            }  
        }  
    });
    
	// наблюдаем за нажатием enter
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