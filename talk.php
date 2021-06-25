<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>덕구</title>
  <script src="js/change_color.js"></script>
  <script src="js/alert.js"></script>
  <script src="js/chat.js"></script>
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/chat-search.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/login-modal.css">
  <link rel="stylesheet" href="css/banner.css">
  <link rel="stylesheet" href="css/chat.css">
  <link rel="stylesheet" href="css/chatting.css">
  <link rel="stylesheet" href="css/footer.css">
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
          <div class="search">
            <input class="search-input" onkeyup="enterkey();" type="text" placeholder="검색어를 입력해주세요.">
          </div>
          <!-- 텍스트 메뉴 -->
          <div class="tab">
            <li class="menu"><a href="mate.php">MATE</a></li>
            <li class="menu"><a href="exchange.php">EXCHANGE</a></li>
            <li class="menu"><a href="talk.php" id="click">TALK</a></li>
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
  <dl id="list"></dl>

  <!-- 채팅 -->
  <div class="chat-container">
    <!-- 왼쪽 영영 -->
    <div id="chatLeft">
      <!-- 왼쪽 상단 - 타이틀 & 사용자 검색 -->
      <div id="chat-square">
        <p class="chat-title">채팅</p>
        <input class="chat-search" type="text" placeholder="사용자 검색" onkeyup="enterkey();">
      </div>
      <!-- 왼쪽 하단 - 사용자 & 채팅 미리보기 -->
      <div id="chat-profile">
        <div id="chat-square-color">
          <p class="chat-name">덕구</p>
          <?php
      $conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');
      $sql = "select comment from chat where idx = (select max(idx) from chat)";

      mysqli_query($conn,"set names utf8;");
      $max = mysqli_query($conn, $sql);

        $re = mysqli_fetch_array($max);
    ?>
          <p class="chat-content"><?=$re[0]?></p>
          <img class="chat-profile-image" src="images/header_logo.png">
        </div>
      </div>
    </div>
    <!-- 가운데 영역 -->
    <div id="chat">
      <div id="chat-size">
        <!-- 가운데 상단 - 사용자 정보 -->
        <div id="chat-square">
          <img class="chat-profile" src="images/header_logo.png">
          <p class="chatting-name">덕구</p>
          <p class="chatting-content">천러 파이팅. 천러 많이 넣어야지.</p>
          <button id="profile-button" onclick="ready();">
            <img class="chat-profile-details" src="images/profile-details.png">
          </button>
          <button id="profile-button" onclick="ready();">
            <img class="chat-writting" src="images/writting.png">
          </button>
        </div>
    <!-- 채팅 -->
    
    <div id="chatting-square">
    
          <!-- 채팅 내용 -->
          <div class="chatting" id="chatting">
          
            <div class="chat-view">
            <?php
      $conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');
      $sql = "select comment from chat";

      mysqli_query($conn,"set names utf8;");
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
            
      for($i = 0 ; $i < $num ; $i++) {
        $re = mysqli_fetch_array($result);
    ?>
            <li class="clearfix">
                <p class="message my-message">
                <?=$re[0]?>
                </p>
            </li>
            <?php
        }
      ?>
            </div>
            
          </div>
        
        </div>
      
        <!-- 가운데 하단 영역 -->
        <div id="chatting-text-square">
          <form method="POST" action="chat_insert.php" id="frm" name="frm" enctype="multipart/form-data">
          <!-- 이모티콘 버튼 -->
          <button id="profile-button" onclick="ready();">
            <img class="chatting-emoticon-image" src="images/emoticon.png">
          </button>
          <!-- 사진 버튼 -->
          <button id="profile-button" onclick="ready();">
            <img class="chatting-picture-image" src="images/picture.png">
          </button>
            <!-- 채팅 입력창 -->
            <input class="chatting-message" name="comment" type="text" placeholder="내용을 입력하세요.">
            <!-- 보내기 버튼 -->
            <button id="profile-button" onclick="document.frm.submit();">
              <img class="chatting-send-image" src="images/send.png">
            </button>    
          </form>
        </div>
      </div>
    </div>
    <!-- 오른쪽 영억 -->
    <div id="chatRight"></div>
  </div>

  <div class="foot">
    <footer class="footer">
      <a href="index.html"><img class="footer-logo-image" src="images/logo.png"></a>
      <p class="footer-copy-text">© 2021 DUCK GOO OFFICIAL WEB</p>
      <div class="clear">
        <div class="center">
          <p class="footer-tab">
            <li class="footer-menu"><span style="color: #0044ef; cursor: pointer;"
                onclick="location.href='information.html'">개인정보취급 방침</span></li>
            <li class="footer-menu"><img src="images/line.png"></li>
            <li class="footer-menu"><span style="color: #0044ef;">이용약관</span></li>
          </p>
        </div>
      </div>
    </footer>
  </div>

   <!-- 로그인 후 모달 창 -->
   <div class="modal">
    <div class="modal-content">
      <a href="./profile.html">
        <img class="user-image" src="images/header_logo.png" />
      </a>
      <p class="modal-name">덕구</p>
      <p class="modal-email">DUCKGoo@e-mirim.hs.kr</p>
      <button id="lookfor-mate-button" onclick="location.href='mate-writing.html'">
        덕메 구하기
      </button>
      <button id="cardtext-button" onclick="location.href='card-writing.html'">
        포카 교환글 작성
      </button>
      <button id="logout-button" onclick="nologout()">로그아웃</button>
    </div>
  </div>

  <!-- 모달 창 JS -->
  <script type="text/javascript">
    // var modal = document.querySelector(".login-modal");
    var modal = document.querySelector(".modal");
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