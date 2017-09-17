<?php
echo "Лабораторная работа 6. Составление анаграмм.
<br>Николаева Наталья";
function Anagram($word)
{ 
	$data = file_get_contents("words.txt"); //read the file
	$convert = explode("\n", $data); //create array separate by new line
	for ($i=0;$i<count($convert);$i++)  
	{
		$lenText = strlen($convert[$i]);
		$lenWord = strlen($word);
		$charsText = count_chars($convert[$i],1); //кол-во вхождений символов в слове из текста
		$charsWord = count_chars($word,1); //кол-во вхождений символов в заданном слове
		$arr = [$charsText, $charsWord]; 
		$res = call_user_func_array('array_diff_assoc', $arr);
		//Проверяем совпадает ли количество вхождений символов и количество букв в сравниваемых словах	
		if(!$res && $lenText == $lenWord) 
		echo $convert[$i]."<br>";		
	}
} 

$myword = 'abdonna';
echo "<br>Поиск анаграмм для слова ".$myword."<br>";
Anagram($myword); 


?>