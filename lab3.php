<?php
echo "������������ ������ �3. ���������� ������� �� �������.";
//�� ��������� ����������� ��������� cp1251, ����� ���� ����������� �������� ������ � �������� �������

function ArraySpiral($array,$size)
{
	echo "<br><b>�������� ������: </b>".$array;
	$size=5; //����� �������
	$curl=round($size/2); //���������� ������
	$s=0; 

	for ($i=1; $i<=$curl; $i++)
	{
		//��������� ������� ������
		for ($row=$i; $row<=$size-$i+1; $row++)
		{
			if ($array[$s])
			{
				$table[$i][$row]=$array[$s];
				$s++;
			}
			else {$table[$i][$row]=" ";}
			
		}
		//��������� ������ �������
		for ($column=$i+1; $column<=$size-$i+1; $column++)
		{	
			if ($array[$s])
			{
				$table[$column][$size-$i+1]=$array[$s];
				$s++;
			}
			else {$table[$column][$size-$i+1] = " ";}
		}
		//��������� ������ ������
		for ($row=$size-$i; $row>=$i; $row--)
		{
			if ($array[$s])
			{
				$table[$size-$i+1][$row]=$array[$s];
				$s++;
			}
			else {$table[$size-$i+1][$row]=" ";}
		}
		//��������� ����� �������
		for ($column=$size-$i; $column>=$i+1; $column--)
		{	
			if ($array[$s])
			{
				$table[$column][$i]=$array[$s];
				$s++;
			}
			else {$table[$column][$i]=" ";}
		}	
	}

	//����� �� �����
	echo "<html>
			<head>
				<meta http-equiv='Content-Type' content='text/html; charset=windows-1251' />
			</head>
			<body>
				<table>";

	for ($row=1; $row<=$size; $row++)
	{
		echo "<tr>";
		for ($cell=1; $cell<=$size; $cell++) 
			echo "<td>".$table[$row][$cell]."</td>";
		echo "</tr>";
	}
	echo "		</table>
			</body>
		  </html>";
 }
 
ArraySpiral('������ ������ ��� ����������',5);
?>