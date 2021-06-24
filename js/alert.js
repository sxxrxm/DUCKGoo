function nologout() {
  alert("원활한 전시를 위해 로그아웃은 불가능합니다!");
}

function ready() {
  alert("현재 덕구는 데모 버전으로, 본 기능은 개발 중입니다!");
}

function enterkey() {
  if (window.event.keyCode == 13) {
    // 엔터키가 눌렸을 때 실행할 내용
    ready();
  }
}
