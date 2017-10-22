<?php
echo "Лабораторная работа №4. Объем воды, собравшейся на крыше.<br>
Николаева Наталья";

//$roof = array(2,5,1,2,3,4,7,7,6);
$roof = array(3,6,8,1,2,4,5,8,7,5,4,3,7,5,4,6);
echo "<br><b>Заданная последовательность: </b>";
foreach ($roof as $r) 
	echo $r." ";

$len = count($roof); //длина последовательности
$ls=0; //номер последовательности, наклоненной в левую сторону 
$rs=0; //номер последовательности, наклоненной в правую сторону
$lj=0; //номер левой последовательности
$rj=0; //номер правой последовательности
$prevValue=$roof[0][0];    //предыдущее последнее значение, чтобы записать в следующую последовательность
$a=0;
$sequence=0; //объем воды в отдельном пазе
$numberSlot=1; //номер паза

for($i=0;$i<$len-1;$i++)
{
	//Поиск последовательностей, наклоненных в левую сторону
	if ($roof[$i]<$roof[$i+1])
	{	
		if (($lj<>0) &&(count($leftSequence[$ls])>2))
		{
			//Присваеваем последний элемент предыдущей последовательности
			$leftSequence[$ls][$lj] = $roof[$i+1]; 
			$rs++;
			$ls++;
		}
		$lj=0;
		if (($rj==0) && ($i<>0))
		{
			$rightSequence[$rs][$rj] = $prevValue;
			$rightSequence[$rs][$rj+1] = $roof[$i];
			$rj++;
		}
		else
		{
			$rightSequence[$rs][$rj] = $roof[$i];
			$rightSequence[$rs][$rj+1] = $roof[$i+1];
		}
		$prevValue = $roof[$i+1];
		$rj++;
	}
	else 
	//Поиск последовательностей, наклоненных в правую сторону	
	if ($roof[$i]>$roof[$i+1])
	{
		$rj=0;
		if (($lj==0) && ($i<>0))
		{
			$leftSequence[$ls][$lj] = $roof[$i];
			$leftSequence[$ls][$lj+1] = $roof[$i+1];
			$lj++;
		}
		else
			$leftSequence[$ls][$lj] = $roof[$i+1];
		$lj++;
	}	
}

for ($j=0;$j<count($leftSequence);$j++)
{
	$countValue=count($leftSequence[$j]);
	if ($countValue>2)
	{
		$lastValue = ($leftSequence[$j][$countValue-1]);
		for($l=1;$l<$countValue;$l++)
			$sequence+=$lastValue-$leftSequence[$j][$l];
		echo "<br>Объем воды в пазе $numberSlot=".$sequence;

		$a=$leftSequence[$j][0]-$leftSequence[$j][$countValue-2]; //сторона треугольника a
		$b=$countValue-2; //сторона треугольника b
		$corner=$a*(90/($a+$b)); //прилегающий угол
		echo "<br>Угол наклона паза $numberSlot=".$corner."&deg;";
		$sequence=0;
		$numberSlot++;
	}
}

for ($r=0;$r<count($rightSequence);$r++)
{
	$countValue=count($rightSequence[$r]);
	if ($countValue>2)
	{
		$lastValue = ($rightSequence[$r][$countValue-1]);
		for($l=1;$l<$countValue-1;$l++)
			$sequence+=$rightSequence[$r][0]-$rightSequence[$r][$l];
		echo "<br>Объем воды в пазе $numberSlot=".$sequence;
		$a=$lastValue-$rightSequence[$r][1];
		$b=$countValue-2;
		$corner=$a*(90/($a+$b));
		echo "<br>Угол наклона паза $numberSlot=".$corner."&deg;";
		$sequence=0;
		$numberSlot++;
	}
}


$multiple = 30;
$width=$len*$multiple+$multiple*2;
$height=max($roof)*$multiple;
$img = ImageCreateTrueColor($width, $height);
$pink = imagecolorallocate($img, 255, 105, 180);
$fgColor = array(255, 255, 255);
$fg = imagecolorallocate($img, $fgColor[0], $fgColor[1], $fgColor[2]);
$m=0;
for($i=0;$i<$len;$i++)
{
   ImageLine($img, $multiple, $height-$multiple, $width-$multiple, $height-$multiple, 255); //x
   ImageLine($img, $multiple, $multiple, $multiple, $height-$multiple, 255); //y 
   ImageRectangle($img,$multiple+$m, $height-$multiple, 60+$m, $height-$multiple-($roof[$i]*20), $pink);  
   $m+=30;
}
ImagePng($img,"images/graphic.png");
echo "<br><img src='images/graphic.png'>";
?>