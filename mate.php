<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>덕구</title>
    <script src="js/change_color.js"></script>
    <script src="js/alert.js"></script>
    <link rel="stylesheet" href="css/search.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/modal.css" />
    <link rel="stylesheet" href="css/login-modal.css" />
    <link rel="stylesheet" href="css/banner.css" />
    <link rel="stylesheet" href="css/filter.css" />
    <link rel="stylesheet" href="css/post.css" />
    <link rel="shortcut icon" href="images/header_logo.png" />
  </head>

  <body>
    <div class="container">
      <aside id="aisdeLeft"></aside>
      <section id="section">
        <div class="header">
          <div class="navbar">
            <!-- 로고 -->
            <div class="menu-margin-left">
              <a href="index.html"
                ><img class="logo-image" src="images/logo.png"
              /></a>
            </div>
            <!-- 검색창 메뉴 -->
            <div class="search" id="search-margin">
              <input
                class="search-input"
                onkeyup="enterkey();"
                type="text"
                placeholder="검색어를 입력해주세요."
              />
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
                <img id="img" class="profile-image" src="images/profile.png" />
              </button>
            </div>
          </div>
        </div>
      </section>
      <aside id="aisdeRight"></aside>
    </div>

    <!-- 배너 -->
    <div id="banner">
      <input type="radio" name="rb" id="rb1" checked />
      <input type="radio" name="rb" id="rb2" />
      <input type="radio" name="rb" id="rb3" />
      <input type="radio" name="rb" id="rb4" />
      <ul class="abc">
        <li>
          <div id="banner1">
            <img id="banner" src="images/banner1.png" />
            <button
              id="mate-button"
              onclick="location.href='mate.html'"
            ></button>
          </div>
        </li>
        <li>
          <div id="banner2">
            <img id="banner" src="images/banner2.png" />
            <button
              id="mate-button"
              onclick="location.href='mate.html'"
            ></button>
          </div>
        </li>
        <li>
          <div id="banner3">
            <img id="banner" src="images/banner3.png" />
            <button
              id="mate-button"
              onclick="location.href='mate.html'"
            ></button>
          </div>
        </li>
        <li>
          <div id="banner4">
            <img id="banner" src="images/banner4.png" />
            <button
              id="mate-button"
              onclick="location.href='mate.html'"
            ></button>
          </div>
        </li>
      </ul>
      <p class="rb">
        <label id="noma" for="rb1"></label>
        <label for="rb2"></label>
        <label for="rb3"></label>
        <label for="rb4"></label>
      </p>
    </div>
    <div id="mate">
      <select
        class="select-gender"
        name="gender"
        onchange="genderChange(this)"
        required
      >
        <option value="male" selected>남자 아이돌</option>
        <option value="female">여자 아이돌</option>
      </select>

      <select class="select-group" name="group" id="group" required>
        <option value="BTS">BTS</option>
        <option value="TXT">TXT</option>
        <option value="SHINee">SHINee</option>
        <option value="EXO">EXO</option>
        <option value="NCT 127">NCT 127</option>
        <option value="NCT DREAM">NCT DREAM</option>
        <option value="SEVENTEEN">SEVENTEEN</option>
        <option value="THE BOYZ">THE BOYZ</option>
        <option value="Stray Kids">Stray Kids</option>
        <option value="기타">기타</option>
      </select>

      <select class="select-type" name="type" id="type" required>
        <option value="birthcafe">생일카페</option>
        <option value="concert">콘서트</option>
        <option value="exhibit">전시회</option>
        <option value="etc">기타</option>
      </select>

      <select class="select-gender" name="gender" id="gender" required>
        <option value="female">여성</option>
        <option value="male">남성</option>
        <option value="none">상관 없음</option>
      </select>

      <p class="result">검색 결과 323건</p>
    </div>

     <!-- 게시글 -->
     <?php
      $conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');
      $sql = "select mate_img, title, content, hashtag from mate";

      mysqli_query($conn,"set names utf8;");
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
            
      for($i = 0 ; $i < $num ; $i++) {
        $re = mysqli_fetch_array($result);
    ?>

    <div class="clear">
      <div id="post">
        <div class="post-content">
          <a href="./mate-detail.php?title=<?=urlencode($re[1])?>">
      
            <img class="mate-img" src="<?=$re[0]?>" />
            <p class="title" name="ent_title"><?=$re[1]?></p>
            <p class="content">
              <?=$re[2]?>
            </p>
            <p class="hashtag"><?=$re[3]?></p>
          </a>
        </div>
      <?php
        }
      ?>
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
      function genderChange(e) {
        var male = [
          "BTS",
          "TXT",
          "SHINee",
          "EXO",
          "NCT 127",
          "NCT DREAM",
          "SEVENTEEN",
          "THE BOYZ",
          "Stray Kids",
          "기타",
        ];
        var female = [
          "BLACKPINK",
          "TWICE",
          "ITZY",
          "(G)I-DLE",
          "OH MY GIRL",
          "Red Velvet",
          "IU",
          "기타",
        ];
        var target = document.getElementById("group");

        if (e.value == "male") var d = male;
        else if (e.value == "female") var d = female;

        target.options.length = 0;

        for (x in d) {
          var opt = document.createElement("option");
          opt.value = d[x];
          opt.innerHTML = d[x];
          target.appendChild(opt);
        }
      }
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
