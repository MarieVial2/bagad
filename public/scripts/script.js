
// var currentPath = window.location.pathname;

// $(document).ready(function() {
//   $('.menu-item div a').each(function() {
//      var href = $(this).attr('href');
//      if(currentPath.indexOf(href) != -1) {
//         // add active class
//         $(this).addClass('active');
//      }
//   });
// });

// var navItems = document.querySelectorAll(".menu-item");
// for (var i = 0; i < navItems.length; i++) {
//    navItems[i].addEventListener("click", function() {
//       this.classList.add("active");
//    });
// }

let hautPage = document.getElementById("haut-page");

window.addEventListener('scroll', function () {
    if (window.scrollY > 400) {
        hautPage.classList.remove("invisible");
    } else {
        hautPage.classList.add("invisible");
    }
})