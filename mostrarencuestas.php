<?php
include ("conectar_bd.php");
   
$tabla="encuestas";   //NOMBRE DE LA TABLA A MOSTRAR
$result = mysql_query("select * from $tabla"); 
echo "<table bgcolor=\"#DDDDDD\" align=center style=\"border:2px outset black\">";
for ($i = 0; $i < mysql_num_fields($result); $i++)
    { 
    print "<th>".mysql_field_name($result, $i)."</th>\n"; 
    } 
while ($registro = mysql_fetch_row($result))
    {
    echo "<tr>";
    foreach($registro  as $clave)
        {
        echo "<td bgcolor=\"#BBBBBB\"style=\"border:2px groove black\" align=\"center\">",$clave,"</td>";
        }
    }
echo "</tr></table>";

?> 
