<?php

header('Content-Type: text/html; charset=utf-8');

    $function = $_POST['function'];  //Ассоциативный массив данных, переданных скрипту через HTTP метод POST.
    
    $log = array();
    
    switch($function) {
    
    	case('getState'):
			if(file_exists('chat.txt')){
				$lines = file('chat.txt');
        	}
            $log['state'] = count($lines); 
        	break;	
    	
    	case('update'):
        	$state = $_POST['state'];
        	if(file_exists('chat.txt')){
        	   $lines = file('chat.txt');
			}
        	
			$count =  count($lines);
        	if($state == $count){
				$log['state'] = $state;
        		$log['text'] = false;        		 
        	}
        	else{
        		$text= array();
        		$log['state'] = $state + count($lines) - $state;
        		foreach ($lines as $line_num => $line)
                    {
						if($line_num >= $state){
                        $text[] =  $line = str_replace("\n", "", $line);
        				}
                    }
					$log['text'] = $text; 
        	}
        	break;
    	 
    	case('send'):
			$nickname = htmlentities(strip_tags($_POST['nickname']), ENT_QUOTES , "UTF-8"); // добавил два параметра сюда, главный из которых - третий: он выставляет кодировку, если этого не сделать, то пхп решает, что основная - windows-1251, что и генерит крякозябры) 
			$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			$message = htmlentities(strip_tags($_POST['message']), ENT_QUOTES , "UTF-8"); // заменил htmlspecialhars на htmlentities с такими же двумя параметрами. 
			if(($message) != "\n"){
				if(preg_match($reg_exUrl, $message, $url)) {
					$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message); //обрабатывает ссылки
				}	 
				fwrite(fopen('chat.txt', 'a'), "<span>". $nickname . "</span>" . $message); 
			}
			break;    	
    }
    
    echo json_encode($log); //Возвращает JSON-представление данных

?>