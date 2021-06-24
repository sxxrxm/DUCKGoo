<?php
    $conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');
    $sql = "select card_img from card where idx =" . $_GET['idx'];
    $result = mysqli_query($conn, $sql);
    $re = mysqli_fetch_array($result);
    //print_r($re[0]);
    Header("Content-type: image/jpeg");
    echo $re[0];
?>