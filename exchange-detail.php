<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>덕구</title>
  <script src="js/change_color.js"></script>
  <script src="js/alert.js"></script>
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/login-modal.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/detail.css">
  <link rel="shortcut icon" href="images/header_logo.png">
</head>

<body>
  <div class="container">
    <aside id="aisdeLeft"></aside>
    <section id="section">
      <div class="header">
        <div class="navbar">
          <!-- 로고 -->
          <div class="menu-margin-left">
            <a href="index.html"><img class="logo-image" src="images/logo.png"></a>
          </div>
          <!-- 검색창 메뉴 -->
          <div class="search" id="search-margin">
            <input class="search-input" onkeyup="enterkey();" type="text" placeholder="검색어를 입력해주세요.">
          </div>
          <!-- 텍스트 메뉴 -->
          <div class="tab">
            <li class="menu"><a href="mate.html" id="click">MATE</a></li>
            <li class="menu"><a href="exchange.php">EXCHANGE</a></li>
            <li class="menu"><a href="talk.html">TALK</a></li>
          </div>
          <!-- 프로필 메뉴 -->
          <div class="menu-margin-right">
            <button class="trigger" onclick="toggleImg()" id="profile-button">
              <img id="img" class="profile-image" src="images/profile.png">
            </button>
          </div>
        </div>
      </div>
    </section>
    <aside id="aisdeRight"></aside>
  </div>

  <div class="detail-container">
    <!-- 왼쪽 영역 -->
    <div id="detailLeft">
    </div>
    오른쪽 영역
    <div id="detailRight">
      <?php
          $title = $_POST['ent_title'];
          $conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');
          $sql = "select title, card_img, own, exch, gender, state, deliver, content, hashtag from card where title = '".urldecode($_GET['title'])."'";
      
          mysqli_query($conn,"set names utf8;");
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          $re = mysqli_fetch_array($result);
          //print_r($re);
			?>
      <div class="post">

        <p class="detail-title"><?=$re['title']?></p>

        <p class="detail-date">2021.06.23</p>

        <hr class="line">

        <div class="margin-image">
          
          <img class="card-image" src="<?=$re['card_img']?>">
        </div>

        <div class="clear">
          <div id="member">
            <p class="detail">갖고 있는 멤버</p>
            <p class="member-content"><?=$re['own']?></p>
          </div>
          <div id="member">
            <p class="detail">원하는 멤버</p>
            <p class="member-content"><?=$re['exch']?></p>
          </div>
        </div>

        <div class="clear">
          <p class="detail">교환 대상자 성별</p>
          <p class="content"><?=$re['gender']?></p>
        </div>

        <div class="clear">
          <p class="detail">포토카드 상태</p>
          <p class="content"><?=$re['state']?></p>
        </div>

        <div class="clear">
          <p class="detail">교환 방법</p>
          <p class="content"><?=$re['deliver']?></p>
        </div>

        <div class="clear">
          <p class="detail">내용</p>
          <p class="content-text">
            <?=$re['content']?>            
          </p>
        </div>

        <div class="clear">
          <p class="detail">해시태그</p>
          <p class="hashtag-content"><?=$re['hashtag']?> </p>
        </div>
        
        <div class="clear">
          <button class="chat-button" onclick="location.href='./talk.html'">DM 보내기</button>
        </div>
      </div>
    </div>
  </div>

   <!-- 로그인 후 모달 창 -->
   <div class="modal">
    <div class="modal-content">
      <a href="./profile.html">
        <img class="user-image" src="images/user-image.jpg" />
      </a>
      <p class="modal-name">김지연</p>
      <p class="modal-email">s2019w24@e-mirim.hs.kr</p>
      <button
        id="lookfor-mate-button"
        onclick="location.href='mate-writing.html'"
      >
        덕메 구하기
      </button>
      <button
        id="cardtext-button"
        onclick="location.href='card-writing.html'"
      >
        포카 교환글 작성
      </button>
      <button id="logout-button" onclick="nologout()">로그아웃</button>
    </div>
  </div>

  <!-- 모달 창 JS -->
  <script type="text/javascript">
    var modal = document.querySelector(".login-modal");
    // var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".trigger");

    // 클릭시 모달 창 보이게 하는 함수
    function toggleModal() {
      modal.classList.toggle("show-modal");
    }

    // 모달 창 외 다른 화면 클릭시 자동 꺼짐 & 버튼 색깔 회색으로 돌아옴
    function windowOnClick(event) {
      if (event.target === modal) {
        toggleModal();
        document.getElementById("img").src = "images/profile.png";
      }
    }

    trigger.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);
  </script>
  
</body>
</html>