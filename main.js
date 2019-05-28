$(".clap").click(function() {
  $.ajax({
    type: "POST",
    url: "clap.php",
  })
});