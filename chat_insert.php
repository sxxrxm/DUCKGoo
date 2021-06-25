<!-- 포카 교환글 디비 연결 -->
<?php
$conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');

$_comment = $_POST['comment'];

if($_comment == ""){
    ?>
    <script>
    alert("공백 입력은 안 돼요!");
    location.href="talk.php";
    </script>
    <?php
}else{
    mysqli_query($conn,"set names utf8;");
    $sql = "insert into chat(comment)
    values('$_comment')";
}




///mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
?>
    <script>
        location.href="talk.php";
    </script>
<?php
} else {
    echo "레코드 추가 실패! : ".mysqli_error($conn);
}
mysqli_close($conn);

?>

