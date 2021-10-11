// GoogleMap API用の initMap関数を作成
function initMap() {
  map = document.getElementById("map");

  opt = {
    zoom: 13
  };
  // 地図のインスタンスを作成
  mapObj = new google.maps.Map(map, opt);

}