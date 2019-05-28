function ajax(postId, clapNumber) {
  $.ajax({
    type: "POST",
    url: "clap.php",
    data: {postId: postId, clapNumber: clapNumber},
  })
  .done(function (response) {
    console.log(response)
  })
}
