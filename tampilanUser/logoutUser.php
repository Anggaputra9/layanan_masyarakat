<?php
session_start();
session_unset();
session_destroy();
?>
<script type="text/javascript">
    alert('logout berhasil.');
    location.href = "../login.php"
</script>
    