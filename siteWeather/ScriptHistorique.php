<?php
include("include/user.php");

    $sql = "SELECT * FROM `temperature` WHERE 1";
    $i=0;

    ?>

    <table>
    <tr>
        <th>Id</th>
        <th>Température(en °C)</th>
        <th>Température(en °F)</th>
        <th>Date</th>
    </tr>

    <?php
    foreach($db->query($sql) as $row){
        ?>
        <tr>
            <td><?php
            print $row['id'] . "\t \n";?></td>
            <td><?php
            print $row['tempC'] . "\t \n";?></td>
            <td><?php
            print $row['tempF'] . "\t \n";?></td>
            <td><?php
            print $row['date'] . "\t \n";?></td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </table>
    <?php
    
    if($i==0 || $i==1){
        echo "Il y a ".$i." température enregistrée.";
    }else{
        echo "Il y a ".$i." températures enregistrées.";
    }
?>