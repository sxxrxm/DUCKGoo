<!-- 인상깊은 구절 디비 연결 -->
<?php
$conn = mysqli_connect('localhost', 'root', '100412', 'duckgoo');

$_title = $_POST['title'];
$_gender = $_POST['gender'];
$_idol = $_POST['group'];
$_own = $_POST['own'];
$_exch = $_POST['exch'];
$_deliver = $_POST['delivery'];
$_state = $_POST['condition'];
$_file = $_POST['file'];
$_content = $_POST['content'];

$sql = "insert into card(title, gender, idol, own, exch, deliver, state, card_img, content)
values('$_title', '$_gender', '$_idol', '$_own', '$_exch', '$_deliver', '$_state', '$_file', '$_content')";

mysqli_query($conn, $sql);
?>
<script>
    alert("포토카드 교환글이 등록되었습니다!");
    location.href="index.html";
</script>
