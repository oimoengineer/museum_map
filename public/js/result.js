// GoogleMap API用の initMap関数を作成
function initMap() {
  map = document.getElementById("map");
  let artizon = {lat: 35.67905925545413, lng:139.7716643841635};

  opt = {
    zoom: 13,
    center: artizon,
  };
  // 地図のインスタンスを作成
  mapObj = new google.maps.Map(map, opt);

}