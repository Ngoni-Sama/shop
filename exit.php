<?php
// Открытие сессии PHP
session_start();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>PHP-сессия - удаление</title>
   </head>
<body>
<?php

// удаляем все переменные сессии PHP
session_unset();
print_r($_SESSION);
// удаляем сессию PHP
session_destroy();
echo "<br><br>Сессия PHP и все переменные сессии были успешно удалены!<br><br>";
?>
</body>
</html>