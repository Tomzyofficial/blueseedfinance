//btc, cashapp, usdt, button handlers
$(document).ready(function(){
  $("#btn-btc").click(function () {
    $("#btn-btc").hide(500);
  })
  $("#btn-cashapp").click(function(){
    $("#btn-cashapp").hide(500);
  })
  $("#btn-usdt").click(function(){
    $("#btn-usdt").hide(500);
  });
});

// when the deposit button is clicked 
document.addEventListener('DOMContentLoaded', () => {
  const depositButton = document.getElementById('deposit');
  depositButton.onclick = function() {
    depositButton.innerHTML = 'Processing...';
  
  };
})
