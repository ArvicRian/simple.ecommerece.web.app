<?php
session_start();

if(session_destroy())
{
    echo'<script>
    setTimeout(function () {
       window.location.href= "../login/login.form.php";
    }, 1000);
    </script>';
}
?>