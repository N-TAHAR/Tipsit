function ajax(postId) {
  $.ajax({
    type: "POST",
    url: "clap.php",
    data: {postId: postId},
  })
  .done(function (bulbNumberObject) {
    let bulbNumber = bulbNumberObject.bulbNumber;
    console.log(bulbNumber);
    tip = document.getElementById(postId);
    tip.querySelector('.bulbNumber').innerHTML = parseInt(tip.querySelector('.bulbNumber').innerHTML) + 1;
  })
}