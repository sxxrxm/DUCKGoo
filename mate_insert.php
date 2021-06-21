<!-- 인상깊은 구절 디비 연결 -->
<?php
$conn = mysqli_connect('localhost', 'root', '100412', 'duckgoo');

$_title = $_POST['title'];
$_gender = $_POST['gender'];
$_idol = $_POST['group'];
$_own = $_POST['own'];
$_exch = $_POST['exch'];
$_deliver = $_GET['delivery'];
$_state = $_POST['condition'];
$_content = $_POST['content'];

$sql = "insert into card(title, gender, idol, own, exch, deliver, state, content)
values('$_title', '$_gender', '$_idol', '$_own', '$_exch', '$_deliver', '$_state', '$_content')";

mysqli_query($conn, $sql);
?>
<script>
    alert("인상깊은 구절 등록이 완료되었습니다!");
    location.href="index.html";
</script>
