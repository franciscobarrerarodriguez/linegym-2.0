$(document).ready(main);
// 1 Cerrado
// 0 Abierto
var count = 1;

function main() {

  $('#menuButton').click(function() {
    if(count == 1){
      count = 0;
      opened();
      $('#lineGym-menu').animate({
        left: '-270px'
      });
    }else if (count == 0) {
      count = 1;
      closed();
      $('#lineGym-menu').animate({
        left: '0'
      });
    }
  });

  $('#all').click(function(){
    if(count == 0){
      count = 1;
      closed();
      $('#lineGym-menu').animate({
        left: '0'
      });
    }
  });

}

function closeMenu(){
  if (count == 0) {
    count = 1;
    closed();
    $('#lineGym-menu').animate({
      left: '0'
    });
  }
}

function opened() {
  document.getElementById('menuIcon').className = null;
  document.getElementById('menuIcon').classList.add('fa');
  document.getElementById('menuIcon').classList.add('fa-arrow-right');
}

function closed(){
  document.getElementById('menuIcon').className = null;
  document.getElementById('menuIcon').classList.add('fa');
  document.getElementById('menuIcon').classList.add('fa-bars');
}
