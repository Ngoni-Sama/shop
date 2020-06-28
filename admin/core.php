<?php

$action = $_POST['action'];

require_once 'function.php';

switch ($action) {
    case 'init':
        init();
        break;
    case "selectOneGoods":
        selectOneGoods();
        break;
    case "updateGoods":
        updateGoods();
        break;
    case "newGoods":
        newGoods();
        break;
    case 'deleteGoods';
        deleteGoods();
        break;
    case "loadGoods":
        loadGoods();
        break;
    case "search":
        search();
        break;
    case "buyGoods":
        buyGoods();
        break;
 }

 /*   case 1:
        echo "i равно 1";
        break;
    case 2:
        echo "i равно 2";
        break;
        */
?>