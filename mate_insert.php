<!-- 덕메 구하기 디비 연결 -->
<?php
$conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');

$_title = $_POST['title'];
$_age = $_POST['age'];
$_gender = $_POST['gender'];
$_idol = $_POST['group'];
$_category = $_POST['category'];
$_round = $_POST['round'];
$_date = $_POST['date'];
$_place = $_POST['place'];
$_file = $_POST['file'];
$_content = $_POST['content'];
$_hashtag = $_POST['hashtag'];

mysqli_query($conn,"set names utf8;");
$sql = "insert into mate(title, age, gender, idol, category, round, date, place, mate_img, content, hashtag)
values('$_title', '$_age','$_gender', '$_idol', '$_catagory', '$_round', '$_date', '$_place', '$_file', '$_content', '$_hashtag')";

///mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
?>
    <script>
        alert("덕메 구하기 글이 등록되었습니다!");
        location.href="mate.php";
    </script>
<?php
} else {
    echo "레코드 추가 실패! : ".mysqli_error($conn);
}
mysqli_close($conn);

?>

