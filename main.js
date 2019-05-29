function ajax(postId) {
  $.ajax({
    type: "POST",
    url: "clap.php",
    data: {postId: postId},
  })
  .done(function () {
    tip = document.getElementById(postId);
    tip.querySelector('.bulbNumber').innerHTML = parseInt(tip.querySelector('.bulbNumber').innerHTML) + 1;
  })
}
