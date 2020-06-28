<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

function connect(){
    $conn = mysqli_connect("localhost", "root", "", "shop");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $conn->set_charset("utf8");
    return $conn;
    writeJSON();
}

function init(){
    //вывожу список товаров
    $conn = connect();
    $sql = "SELECT id, name FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = array();
        while($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}

function selectOneGoods() {
    $conn = connect();
    $id = $_POST['gid'];
    $sql = "SELECT * FROM goods WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); 
        echo json_encode($row);
    } else {
        echo "0";
    }
    mysqli_close($conn);
}



function updateGoods() {
    $conn = connect();
    $id = $_POST['id'];
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $order = $_POST['gorder'];
    $img = $_POST['gimg'];
    $weight = $_POST['gweight'];
    $made = $_POST['gmade'];
    $expiration = $_POST['gexp'];
    $type = $_POST['gtype'];

    $sql = "UPDATE goods SET name='$name', cost='$cost', description='$descr', ord='$order', img='$img', weight='$weight', made='$made', expiration='$expiration', type='$type' WHERE id='$id'";
   if (mysqli_query($conn, $sql)) {
      echo "Record update successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    writeJSON();
}


function newGoods() {
    $conn = connect();
    
    $name = $_POST['gname'];
    $cost = $_POST['gcost'];
    $descr = $_POST['gdescr'];
    $order = $_POST['gorder'];
    $img = $_POST['gimg'];
    $weight = $_POST['gweight'];
    $made = $_POST['gmade'];
    $expiration = $_POST['gexp'];
    $type = $_POST['gtype'];

    $sql = "INSERT INTO goods (name, cost, description, ord, img, weight, made, expiration, type)
                    VALUES('$name', '$cost', '$descr', '$order', '$img', '$weight', '$made', '$expiration', '$type')";
   if (mysqli_query($conn, $sql)) {
      echo "Record add successfully";
    } else {
        echo "Error add record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    writeJSON();
}

function deleteGoods() {
    $conn = connect();
    $id = $_POST['id'];

    $sql = "DELETE FROM goods WHERE id='$id' ";

    if ($conn->query($sql) === TRUE) {
        echo("запись удалена");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    mysqli_close($conn);
    writeJSON();
}

function writeJSON() {
    $conn = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
         $out = array();
         while($row=mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
       } 
        $a = file_put_contents('../goods.json', json_encode($out));
        echo " write+" . $a;
    } else {
        echo "0";
    }
    mysqli_close($conn);
   
}

function loadGoods() {
    $conn = connect();
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
         $out = array();
         while($row=mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
       } 
         echo json_encode($out);
         
    } else {
        echo "0";
    }
    mysqli_close($conn);
   
}

function search() {
    $conn = connect();
    $name = $_POST['name'];
    $sql = "SELECT * FROM goods WHERE LOWER( name ) LIKE  '%$name%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
         $out = array();
         while($row=mysqli_fetch_assoc($result)) {
            $out[$row["name"]] = $row;
       } 
         echo json_encode($out);
         
    } else {
        echo "0";
    }
    mysqli_close($conn);
   
}

$one_ord = 0;
function buyGoods() {
    $conn = connect();
    session_start();
    $cust_id = $_SESSION['id_user'];
    $one_ord = $_POST['one_ord'];
    $goods_id = $_POST['goods_id'];
    $volume = $_POST['volume'];

        if ($one_ord==0) {
            $_SESSION['date_of_ord'] = date('Y-m-d H:i:s');
            $date_of_ord =  $_SESSION['date_of_ord'];
            $sql = "INSERT INTO orders (cust_id, date_of_ord, status_of_ord) VALUES ('$cust_id', '$date_of_ord', '1')";
            $result = mysqli_query($conn, $sql);
        }

        $date_of_ord =  $_SESSION['date_of_ord'];
        $sql = "SELECT id from orders WHERE date_of_ord = '$date_of_ord' AND cust_id = '$cust_id'";
        $result = mysqli_query($conn, $sql);
        if (!$result) echo "Сбой при вставке данных: $sql<br>" .
            $conn->error . "<br><br>";
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $ord_id = $row['id'];

        $sql = "INSERT INTO purchases (ord_id, goods_id, volume) VALUES ('$ord_id', '$goods_id', '$volume')";
        $result = mysqli_query($conn, $sql);
        if (!$result) echo "Сбой при вставке данных: $sql<br>" .
            $conn->error . "<br><br>";


    echo "id Товара = " . $goods_id . ". Количество = " . $volume;
    echo "<br>id Пользователя " . $_SESSION['id_user'];
    echo "<br>one_ord = " . $one_ord;
   
}