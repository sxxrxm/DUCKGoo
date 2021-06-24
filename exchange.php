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
    <link rel="stylesheet" href="css/post.css" />
    <link rel="stylesheet" href="css/filter.css" />
    <link rel="stylesheet" href="css/footer.css">
  
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
              <li class="menu"><a href="mate.php">MATE</a></li>
              <li class="menu">
                <a href="exchange.php" id="click">EXCHANGE</a>
              </li>
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

    <!-- 필터링 -->
    <div id="card-exchange">
      <select
        class="select-gender"
        name="gender"
        onchange="genderChange(this)"
        required
      >
        <option value="male" selected>남자 아이돌</option>
        <option value="female">여자 아이돌</option>
      </select>

      <select
        class="select-group"
        name="group"
        id="group"
        onchange="groupChange(this)"
        required
      >
        <option value="none" selected disabled>그룹을 선택해주세요</option>
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

      <select class="select-member" name="member" id="member" required>
        <!-- <option value="jin">진</option>
            <option value="v">뷔</option>
            <option value="jung">정국</option>
            <option value="sugar">슈가</option>
            <option value="rm">RM</option>
            <option value="j-hope">제이홉</option> -->
      </select>

      <select class="select-member" name="member1" id="member1" required>
        <!-- <option value="jin">진</option>
        <option value="v">뷔</option>
        <option value="jung">정국</option>
        <option value="sugar">슈가</option>
        <option value="rm">RM</option>
        <option value="j-hope">제이홉</option> -->
      </select>

      <p class="result">검색 결과 323건</p>
    </div>

    <!-- 게시글 -->
    <?php
      $conn = mysqli_connect('localhost', 'duckgoo', 'OFnWiNlXhBE4JYzS', 'duckgoo');
      $sql = "select card_img, title, content, hashtag from card";

      mysqli_query($conn,"set names utf8;");
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
            
      for($i = 0 ; $i < $num ; $i++) {
        $re = mysqli_fetch_array($result);
    ?>
    <div class="clear">
      <div id="post">
        <div class="post-content">
          <a href="./exchange-detail.php?title=<?=urlencode($re[1])?>">
      
            <img class="poca-img" src="<?=$re[0]?>" />
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

    <script>
      function genderChange(e) {
        var male = [
          "그룹을 선택해주세요",
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
          "그룹을 선택해주세요",
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
        var target1 = document.getElementById("member");
        var target2 = document.getElementById("member1");

        if (e.value == "male") var d = male;
        else if (e.value == "female") var d = female;

        target.options.length = 0;
        target1.options.length = 0;
        target2.options.length = 0;

        for (x in d) {
          var opt = document.createElement("option");
          opt.value = d[x];
          opt.innerHTML = d[x];
          target.appendChild(opt);
        }
      }

      function groupChange(e) {
        var BTS = ["진", "뷔", "정국", "슈가", "RM", "제이홉"];
        var TXT = ["연준", "수빈", "휴닝카이", "범규", "태현"];
        var SHINee = ["민호", "키", "태민", "온유", "종현"];
        var EXO = [
          "시우민",
          "수호",
          "백현",
          "찬열",
          "디오",
          "카이",
          "세훈",
          "레이",
        ];
        var NCT127 = [
          "재현",
          "쟈니",
          "도영",
          "해찬",
          "유타",
          "태용",
          "태일",
          "윈윈",
          "정우",
          "마크",
        ];
        var NCTDREAM = ["마크", "런쥔", "제노", "해찬", "재민", "천러", "지성"];
        var SEVENTEEN = [
          "에스쿱스",
          "정한",
          "조슈아",
          "준",
          "호시",
          "원우",
          "우지",
          "도겸",
          "민규",
          "디에잇",
          "승관",
          "버논",
          "디노",
        ];
        var THEBOYZ = [
          "상연",
          "제이콥",
          "영훈",
          "현재",
          "주연",
          "케빈",
          "뉴",
          "큐",
          "주학년",
          "선우",
          "에릭",
        ];
        var StrayKids = [
          "방찬",
          "리노",
          "창빈",
          "현진",
          "한",
          "필릭스",
          "승민",
          "아이엔",
        ];

        var BLACKPINK = ["제니", "리사", "로제", "지수"];
        var TWICE = [
          "나연",
          "정연",
          "모모",
          "사나",
          "지효",
          "미나",
          "다현",
          "채영",
          "쯔위",
        ];
        var ITZY = ["예지", "리아", "류진", "채령", "유나"];
        var GIDLE = ["미연", "민니", "수진", "소연", "우기", "슈화"];
        var OHMYGIRL = ["효정", "미미", "유아", "승희", "지호", "비니", "아린"];
        var RedVelvet = ["아이린", "슬기", "웬디", "조이", "예리"];
        var IU = ["아이유"];

        var target = document.getElementById("member");
        var target1 = document.getElementById("member1");

        if (e.value == "BTS") var d = BTS;
        else if (e.value == "TXT") var d = TXT;
        else if (e.value == "SHINee") var d = SHINee;
        else if (e.value == "EXO") var d = EXO;
        else if (e.value == "NCT 127") var d = NCT127;
        else if (e.value == "NCT DREAM") var d = NCTDREAM;
        else if (e.value == "SEVENTEEN") var d = SEVENTEEN;
        else if (e.value == "THE BOYZ") var d = THEBOYZ;
        else if (e.value == "Stray Kids") var d = StrayKids;
        else if (e.value == "BLACKPINK") var d = BLACKPINK;
        else if (e.value == "TWICE") var d = TWICE;
        else if (e.value == "ITZY") var d = ITZY;
        else if (e.value == "(G)I-DLE") var d = GIDLE;
        else if (e.value == "OH MY GIRL") var d = OHMYGIRL;
        else if (e.value == "Red Velvet") var d = RedVelvet;
        else if (e.value == "IU") var d = IU;

        target.options.length = 0;
        target1.options.length = 0;

        for (x in d) {
          var opt = document.createElement("option");
          opt.value = d[x];
          opt.innerHTML = d[x];
          target.appendChild(opt);
        }

        for (x in d) {
          var opt = document.createElement("option");
          opt.value = d[x];
          opt.innerHTML = d[x];
          target1.appendChild(opt);
        }
      }
    </script>

    <!-- <div class="foot">
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
    </div> -->
    
    <!-- 로그인 전 모달창
    <div class="login-modal">
      <div class="login-modal-content">
        <p class="login-modal-title-text">로그인을 해주세요.</p>
        <p class="login-modal-text">
          본인 인증 상의 문제로 카카오톡<br />
          로그인만 지원하는 점 양해 부탁드립니다.
        </p>
        <button id="login-button" onclick="kakaoLogin()">
          카카오계정으로 로그인
        </button>
      </div>
    </div> -->

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
