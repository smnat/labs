<?php
echo "Лабораторная работа №4. Объем воды, собравшейся на крыше.";
//Т.к. в задании не сказано, что пазов может быть несколько, считаем только объем лужи в первом пазе

$roof = array(2,5,1,2,3,4,7,7,6);

$len = count($roof); //длина последовательности
$coordinate1=0;
$coordinate2=0;
$keycoord1=0;
$keycoord2=0;
//Находим максимальный элемент, он будет координатой 1
for($i=1;$i<$len-1;$i++)
{
	if($roof[$i]>$coordinate1) 
	{
		$coordinate1=$roof[$i];
		$keycoord1=$i;
	}
}
//Находим еще один максимальный элемент, он будет координатой 2
for($i=1;$i<$len-1;$i++)
{
	if($i<>$keycoord1)
		if(($roof[$i]>$coordinate2) && (abs($keycoord1-$i)>1))
		{
			$coordinate2=$roof[$i];
			$keycoord2=$i;
		}
}

//$a-прилегающая сторона для поиска угла
if ($keycoord1>$keycoord2)
	$a=abs($keycoord1-$keycoord2)-1;
else
	$a=abs($keycoord1-$keycoord2)+1;

//Подсчет объема воды в пазе
$sum=0;

	if ($keycoord1>$keycoord2)
	for($i=$keycoord2+1;$i<=$keycoord1-1;$i++)	
		$sum=$sum+($coordinate2-$roof[$i]);		
else
	for($i=$keycoord1+1;$i<=$keycoord2-1;$i++)
		$sum=$sum+$roof[$i];	
echo "<br>Объем собравшейся воды=".$sum;

if($keycoord1>$keycoord2)
//$b-противоположная сторона для поиска угла
	$b=$roof[$keycoord1-1];
else
	$b=$roof[$keycoord1+1];
$corner=$a*(90/($a+$b));
echo "<br>Угол наклона крыши=".$corner;		
			
?>