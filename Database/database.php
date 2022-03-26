<?php
 $con = mysqli_connect('localhost', 'root', 'ipbcdfs3bQCBXwD9') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($con, 'system' ) or die(mysqli_error($con));
?>      