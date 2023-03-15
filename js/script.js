// // Load pages via AJAX when a link is clicked
// $(document).on("click", "a[data-ajax]", function(event) {
//   event.preventDefault();
  
//   // Get the URL of the page to load
//   var url = $(this).attr("href");
  
//   // Load the page via AJAX
//   $.ajax({
//     url: url,
//     dataType: "html",
//     success: function(data) {
//       // Replace the current page with the loaded content
//       var $content = $(data).filter("#content");
//       $("#content").html($content.html());
      
//       // Update the URL and title of the page
//       history.pushState(null, null, url);
//       document.title = $content.find("title").text();
      
//       // Play the background music again
//       var bgMusic = document.getElementById("bg-music");
//       bgMusic.currentTime = bgMusicTime;
//       bgMusic.play();
//     }
//   });
// });

// // Pause the background music when the user navigates away
// $(window).on("beforeunload", function() {
//   var bgMusic = document.getElementById("bg-music");
//   bgMusic.pause();
// });

// // Resume the background music when the new page is loaded
// $(window).on("popstate", function(event) {
//   var bgMusic = document.getElementById("bg-music");
//   bgMusic.currentTime = bgMusicTime;
//   bgMusic.play();
// });



var bgMusic = document.getElementById("bg-music");
  var bgMusicTime = 0;

  // Сохраняем текущее время проигрывания музыки в переменную bgMusicTime
  bgMusic.addEventListener("timeupdate", function() {
    bgMusicTime = bgMusic.currentTime;
  });

  // Восстанавливаем время проигрывания музыки при перезагрузке страницы
  window.addEventListener("load", function() {
    bgMusic.currentTime = bgMusicTime;
  });

// Keep track of the current time of the background music
var bgMusicTime = 0;

// Load pages via AJAX when a link is clicked
$(document).on("click", "a[data-ajax]", function(event) {
  event.preventDefault();

  // Get the URL of the page to load
  var url = $(this).attr("href");

  // Load the page via AJAX
  $.ajax({
    url: url,
    dataType: "html",
    success: function(data) {
      // Replace the current page with the loaded content
      var $main = $(data).filter("#main");
      $("#main").html($main.html());

      // Update the URL and title of the page
      history.pushState(null, null, url);
      document.title = $main.find("title").text();

      // Play the background music again from the saved time
      var bgMusic = document.getElementById("bg-music");
      bgMusic.currentTime = bgMusicTime;
      bgMusic.play();
    }
  });
});

// Pause the background music when the user navigates away
$(window).on("beforeunload", function() {
  var bgMusic = document.getElementById("bg-music");
  bgMusicTime = bgMusic.currentTime;
  bgMusic.pause();
});

// Resume the background music when the new page is loaded
$(window).on("popstate", function(event) {
  var bgMusic = document.getElementById("bg-music");
  bgMusic.currentTime = bgMusicTime;
  bgMusic.play();
});