function scrollup() {
  var scroll = document.querySelector(".scroll-up");
  if (this.scrollY >= 200) scroll.classList.add("show-scroll");
  else scroll.classList.remove("show-scroll");
}
window.addEventListener("scroll", scrollup);

// animation
window.addEventListener("load", function () {
  AOS.init();
});

// test
const $body = $("body");
const $header = $(".page-header");
const $navCollapse = $(".navbar-collapse");
const scrollClass = "scroll";

$(window).on("scroll", () => {
  if (this.matchMedia("(min-width: 992px)").matches) {
    const scrollY = $(this).scrollTop();
    scrollY > 0 ? $body.addClass(scrollClass) : $body.removeClass(scrollClass);
  } else {
    $body.removeClass(scrollClass);
  }
});
// btn previouse-next
$(document).ready(function () {
  var $pageItem = $(".pagination li");

  $pageItem.click(function () {
    $pageItem.removeClass("active");
    $(this).addClass("active");
  });
});

// backend
$(".sidebar-dropdown > a").click(function () {
  $(".sidebar-submenu").slideUp(200);
  if ($(this).parent().hasClass("active")) {
    $(".sidebar-dropdown").removeClass("active");
    $(this).parent().removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this).next(".sidebar-submenu").slideDown(200);
    $(this).parent().addClass("active");
  }
});

$("#close-sidebar").click(function () {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function () {
  $(".page-wrapper").addClass("toggled");
});
// --------Editbtn-------
