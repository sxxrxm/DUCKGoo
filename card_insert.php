<!-- 포카 교환글 디비 연결 -->
<?php
$conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');

$_title = $_POST['title'];
$_gender = $_POST['gender'];
$_idol = $_POST['group'];
$_own = $_POST['own'];
$_exch = $_POST['exch'];
$_deliver = $_POST['delivery'];
$_state = $_POST['condition'];
$_file = $_FILES['file'];
$_content = $_POST['content'];

mysqli_query($conn,"set names utf8;");
$sql = "insert into card(title, gender, idol, own, exch, deliver, state, card_img, content)
values('$_title', '$_gender', '$_idol', '$_own', '$_exch', '$_deliver', '$_state', '$_file', '$_content')";

///mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
?>
    <script>
        alert("포토카드 교환글이 등록되었습니다!");
        location.href="index.html";
    </script>
<?php
} else {
    echo "레코드 추가 실패! : ".mysqli_error($conn);
}
mysqli_close($conn);

?>

