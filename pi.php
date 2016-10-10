<?php 

$text = "Какой-то текст";
 
// открываем файл, если файл не существует,
//делается попытка создать его
$fp = fopen("file.txt", "w");
 
// записываем в файл текст
fwrite($fp, $text);
 
print(fread($fp,filesize($fp)));

// закрываем
fclose($fp);

$fp = fopen("file.txt", "r");
print(fread($fp,filesize("file.txt")));
// закрываем
fclose($fp);


phpinfo();