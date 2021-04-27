/* profile 버튼 클릭 시 버튼 이미지 바뀌는 함수 */
function toggleImg() {
  document.getElementById("img").src = "images/click_profile.png";
}

/* 해당 창 클릭시 텍스트 색깔 변경 */
window.onload = function() {
  var click = document.getElementById("click");
  click.style.color = "#0044ef";
}