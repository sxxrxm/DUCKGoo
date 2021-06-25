<!-- 포카 교환글 디비 연결 -->
<?php
$conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');

$_comment = $_POST['comment'];

mysqli_query($conn,"set names utf8;");
$sql = "insert into chat(comment)
values('$_comment')";

///mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
?>
    <script>
        alert("포토카드 교환글이 등록되었습니다!");
        frm.comment.value = '';
        location.href="talk.html";
    </script>
<?php
} else {
    echo "레코드 추가 실패! : ".mysqli_error($conn);
}
mysqli_close($conn);

?>

