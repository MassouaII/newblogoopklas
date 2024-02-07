<?php

$str= "A replacement of a string containing an a";
$count = 0;
$replacement="";

for ($i=0; $i<strlen($str); $i++){
    if($str[$i] == 'a') {
        $count++;
        if($count == 5) {
            $replacement .= 'x';
        } else {
            $replacement .= $str[$i];
        }
    } else {
        $replacement .= $str[$i];
    }
}


$file = fopen("log.txt", "r");
echo fread($file, filesize("log.txt"));
fclose($file);

// Open file
$file = fopen("log.txt","r");

// Read file
while(!feof($file)) {
    echo fgets($file). "<br>";
}

// Close file
fclose($file);

$text = "Contact me at test@example.com or another@email.com";

preg_match_all("/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/", $text, $matches);

print_r($matches[0]);
?>