<?php

session_start();
// 2. Unset all the session variables

unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
unset($_SESSION["user_lastname"]);
unset($_SESSION["manager_name"]);
unset($_SESSION["manager_lastname"]);


?>
<script type="text/javascript">
    window.location = "index.php";
</script>
