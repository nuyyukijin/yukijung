<?php
$access_token = 'wa9rvcyzEixjY5J/uRG3TJ5e0QfANVZzJ1MTdWWuqxgj3PDMkdXlZyQqez1LOufvokBmAu4MKeLOO7gQ9uyiR93zs8gkqFc1St3t6cwstnD+OwGqBhcGsfspcMTiJW0nI2NIOGNZYCFjzdig/AQ61QdB04t89/1O/w1cDnyilFU=hOKDUKtWqywjF8u0K4NdBLGcfTxb97BBlalAp1I0PCZ1M6+7U40Mmmpqc8f5EcjNLzdEU2A7W/G0o2vbxoLffjITIUJUv/CL6JP6aYsYtdra/azB9PpjEU++HSwFu/CoTBkhxH/VTZBYpWzu34gITwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>