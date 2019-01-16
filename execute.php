		<?php
		//file necessari ad inviare foto, doc e audio
		require 'class-http-request.php';
		require 'functions.php';
		
		//$api="487428045:AAFHYEqqftrK7xJvW8_9anPiodBw0HHuWkE";
		$api ='487428045:AAGt0XWbiW9lvBfwBQ9iZ64E9A0s0-UBZuM';

		
		
		//prendo quello che mi è arrivato e lo salvo nella variabile content
		$content = file_get_contents("php://input");
		//decodifico quello che mi è arrivato
		$update = json_decode($content, true);
		//se non sono riuscito a decodificarlo mi fermo
		if(!$update)
		{
		  exit;
		}
		//echo "ciao";
        //altrimenti proseguo e vado a leggere il messaggio salvandolo nella variabile 
		//message
		$message = isset($update['message']) ? $update['message'] : "";
		//facciamo la stessa cosa anche per l'id del mess.
		$messageId = isset($message['message_id']) ? $message['message_id'] : "";
		//l'id della chat che servirà al nostro bot per sapere a chi risponder
		$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
		//il nome dell'utente che ha scritto
		$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
		//il cognome
		$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
		//lo username
		$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
		//la data
		$date = isset($message['date']) ? $message['date'] : "";
		//ed il testo del messaggio
		$text = isset($message['text']) ? $message['text'] : "";
        //eliminiamo gli spazi con trim e convertiamo in minuscolo con la funz strtolower
		
		$text = trim($text);
		$text = strtolower($text);
        
		//$text = json_encode($message);
		 //costruiamo la risposta del nostro bot
		 //l'header è sempre uguale ed indica che sarà un messaggio con codifica
		 //JSON
		header("Content-Type: application/json");
		//i parametri sono cosa voglio mandare indietro al mio utente
		$parameters = array('chat_id' => $chatId, "text" => $text);
		if ($text=="data"||$text=="/data"){
			
			$text = "La data odierna è ".date("d.m.y");
			$parameters = array('chat_id' => $chatId, "text" => $text);             
			
		}
		if ($text=="ciao"||$text=="/ciao"){
			$text = "Benvenuto sul bot dell' 8 marzo";
			
			$parameters = array('chat_id' => $chatId, "text" => $text);             
		}
		if($text=="foto"||$text=="/foto"){
			$foto[0]="foto.png";
			$foto[1]="foto1.png";
			$foto[2]="foto2.png";
			$i = rand(0,2);
			//sendFoto($chatId,$foto[$num],false,"La mia Foto", $api);
			sendFoto($chatId,$foto[$i],false,"La mia Foto", $api);
		}

		if($text=='barz'||$text=='/barz'){
			$barz[0]="Un cavallo va dal benzinaio e chiede: il fieno per favore! ";
			$barz[1]="Qual è il colmo per un tuffatore? Fare un buco nell'acqua.";
			$barz[2]="Chi la fa la vende, chi la compra non la USA, chi la usa non la vede, cosa è???? La tomba. ";
			$barz[3]="Qual è il colmo per un giardiniere? Piantare la fidanzata.";
			
			$i = rand(0,3); 
			
			$parameters = array('chat_id' => $chatId, "text" => $barz[$i]);
		}


		if($text=="audio"){
			sendAudio($chatId,"audio.mp3",false,"Il mio Audio", $api);
			
		}
		if($text=="jingle"){
			sendAudio($chatId,"jingle.mp3",false,"Jingle bells rock", $api);
		}

		if($text=="testo"){
			sendDocument($chatId,"testo.pdf",false,"Il mio documento", $api);
			
		}
		if($text=="doc"){
			sendDocument($chatId,"testo.pdf",false,"Il mio documento", $api);
		}

		if($text=="barze"){
			$barze[0] = "Qual è la città preferita dai ragni? Mosca!";
			$barze[1] = "Che cos'è una zebra? Un cavallo evaso dal carcere!";
			$barze[2] = "Un alunno chiede alla maestra: “Maestra, posso essere punito per qualcosa che non ho fatto?”. E la maestra: “Certo che no! Perché me lo chiedi?”. Allora l'alunno risponde: “Perché non ho fatto i compiti!”.";
			$num = rand(0,2);
			$parameters = array('chat_id' => $chatId, "text" => $barze[$num]);
			
		}
		
		
		
		
		
		//aggiungo il comando di invio
		//e lo invio
		
		$parameters["method"] = "sendMessage";
        echo json_encode($parameters);
		
		
		
		
		
		
		?>
		
		
		
		
		
		

		
		
		
