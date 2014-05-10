$(document).ready(function(){
	$('#style').click(function(){
		
		$('body').each(function(){
			if ($(this).hasClass('first')){
				$('body').removeClass('first').addClass('second');
			}
			else{
				$('body').removeClass('second').addClass('first');
			}					
		});				
				
		$('#chat-wrap').each(function(){
			if ($(this).hasClass('first')){
				$('#chat-wrap').removeClass('first').addClass('second');
			}
			else{
				$('#chat-wrap').removeClass('second').addClass('first');
			}					
		});
				
		$('#send-message-area p').each(function(){
			if ($(this).hasClass('first')){
				$('#send-message-area p').removeClass('first').addClass('second');
			}
			else{
				$('#send-message-area p').removeClass('second').addClass('first');
			}					
		});
				
		$('#name-area').each(function(){
			if ($(this).hasClass('first')){
				$('#name-area').removeClass('first').addClass('second');
			}
			else{
				$('#name-area').removeClass('second').addClass('first');
			}					
		});
	});
});