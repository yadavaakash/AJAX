<?php
    require './connection/connection.php';

    if(isset($_GET['state'])){
        $state = $_GET["state"];

        $q = mysqli_query($connection,"select * from tbl_city where stateid='{$state}' ");

        echo  " City : <select name='city'>";
            while($cdata = mysqli_fetch_array($q)){

                echo "<option value='{$cdata['cityid']}'>{$cdata['city_name']}</option>";

            }
        echo "</select>";

    }

?>