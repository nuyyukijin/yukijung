﻿<?php
$access_token = 'wa9rvcyzEixjY5J/uRG3TJ5e0QfANVZzJ1MTdWWuqxgj3PDMkdXlZyQqez1LOufvokBmAu4MKeLOO7gQ9uyiR93zs8gkqFc1St3t6cwstnD+OwGqBhcGsfspcMTiJW0nI2NIOGNZYCFjzdig/AQ61QdB04t89/1O/w1cDnyilFU=hOKDUKtWqywjF8u0K4NdBLGcfTxb97BBlalAp1I0PCZ1M6+7U40Mmmpqc8f5EcjNLzdEU2A7W/G0o2vbxoLffjITIUJUv/CL6JP6aYsYtdra/azB9PpjEU++HSwFu/CoTBkhxH/VTZBYpWzu34gITwdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			if($text == 'สวัสดีครัชคนสวย'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'จ้าา'
				];
			}
			else if($text == 'คิดถึงจัง'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'บ้าหราา'
				];
			}
			else if($text == 'สวยๆแบบนี้มีแฟนยัง'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'เหงาจัง'
				];
			}
			else if($text == 'รักนะ'){
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ร๊ากก'
				];
			}
		
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
