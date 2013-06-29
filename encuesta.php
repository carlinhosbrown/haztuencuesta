<?php 
    include('conectar_bd.php'); 
    $ipencuesta = $_SERVER['REMOTE_ADDR']; 
    $sql = mysql_query("SELECT * FROM encuestas_ip WHERE ip_voto LIKE '".$ipencuesta."'") or die(mysql_error()); 
    $votadas = mysql_fetch_array($sql); 
    if(mysql_num_rows($sql) == 0) { 
        $sql_enc = mysql_query("SELECT * FROM encuestas ORDER BY id_encuesta DESC LIMIT 0,1") or die(mysql_error()); 
        while($row = mysql_fetch_array($sql_enc)) { 
            $id_encuesta = $row['id_encuesta']; 
            $pregunta = $row['pregunta']; 
?> 
            <div style="text-align: center;"><strong><?=$pregunta?></strong></div> 
            <form method="post" action="votar_encuesta.php"> 
            <?php 
                $opt = mysql_query("SELECT * FROM respuestas_encuesta WHERE id_encuesta='".$id_encuesta."'") or die(mysql_error()); 
                while($row2 = mysql_fetch_array($opt)) { 
                    $id_respuesta = $row2['id_respuesta']; 
                    $respuesta = $row2['respuesta']; 
                    $num_votos = $row2['num_votos']; 
            ?> 
                <input type="radio" name="respuesta" value="<?=$id_respuesta?>" /> <?=$respuesta?><br /> 
            <?php 
                } 
            ?> 
                <div style="text-align: center; padding: 10px;"><input type="submit" name="votar" value="Votar" /></div> 
            </form> 
<?php 
        } 
    }else { 
        $enc = mysql_query("SELECT * FROM encuestas ORDER BY id_encuesta DESC LIMIT 0,1") or die(mysql_error()); 
        while($datos = mysql_fetch_array($enc)) { 
            $id_encuesta = $datos['id_encuesta']; 
            $pregunta = $datos['pregunta']; 
?> 
            <div style="text-align: center;"><strong><?=$pregunta?></strong></div> 
<?php 
            $rs = mysql_query("SELECT sum(num_votos) FROM respuestas_encuesta WHERE id_encuesta='".$id_encuesta."'"); 
            $tot = mysql_result($rs,0); 
            $opt = mysql_query("SELECT * FROM respuestas_encuesta WHERE id_encuesta='".$id_encuesta."'") or die(mysql_error()); 
            while($dat2 = mysql_fetch_array($opt)) { 
                $id_respuesta = $dat2['id_respuesta']; 
                $respuesta = $dat2['respuesta']; 
                $num_votos = $dat2['num_votos']; 
                $ptos = $num_votos * 100; 
                $porcentaje = @round($ptos/$tot,0); 
?> 
                        <strong><?=$respuesta?></strong> - <?=$num_votos?> votos - <?=$porcentaje?>% 
                        <div style="width: <?=$porcentaje?>%; height: 10px; background: #009900;"></div> 
<?php 
            } 
?> 
                    <div style="text-align: center; font-size: 11px;">Votos totales: <strong><?=$tot?></strong></div> 
<?php 
        } 
    } 
?>
