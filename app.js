// page navigation toggler
$(document).ready(function() {
  $('.menu-icon, .menu').click(function() {
    $('.navigation').toggleClass('show');
  })
});
// Menu icon burger effect
const menuBtn = document.querySelector(".menu-btn-burger");
let menuOpen = false;
menuBtn.addEventListener("click", function () {
  if (!menuOpen) {
    menuBtn.classList.add("open");
    menuOpen = true;
  } else {
    menuBtn.classList.remove("open");
    menuOpen = false;
  }
});
//faq 
$(document).ready(function () {
  $(".first").click(function () {
    $(".first-answer").slideToggle("slow");
    $(".second-answer").hide();
    $(".third-answer").hide();
    $(".fourth-answer").hide();
  });
  $(".second").click(function () {
    $(".second-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".third-answer").hide();
    $(".fourth-answer").hide();
  });
  $(".third").click(function () {
    $(".third-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".second-answer").hide();
    $(".fourth-answer").hide();
  });
  $(".fourth").click(function () {
    $(".fourth-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".second-answer").hide();
    $(".third-answer").hide();
  });
/*   $(".fifth").click(function () {
    $(".fifth-answer").slideToggle("slow");
    $(".first-answer").hide();
    $(".second-answer").hide();
    $(".third-answer").hide();
    $(".fourth-answer").hide();
  }); */
});

