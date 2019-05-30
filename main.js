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

//bulb
var posts = document.querySelectorAll('.post')
posts.forEach(post => {
  var ampoule = post.querySelector('.ampoule');
  var flechehautgauche = post.querySelector('.partie2');
  var flechehautdroite = post.querySelector('.partie4');
  var bashautdroite = post.querySelector('.partie3');
  var bashautgauche = post.querySelector('.partie5');
  var addition = post.querySelector('.addition');
  var ampoulenoire = post.querySelector('.ampoulenoire');
  var ampoulesombre = post.querySelector('.ampoulesombre')
  var count = 0;
  var white2 = post.querySelector('.partie2white');
  var white3 = post.querySelector('.partie3white');
  var white4 = post.querySelector('.partie4white');
  var white5 = post.querySelector('.partie5white');
  ampoule.addEventListener('click', function () {
  count = count + 1; 
  addition.innerHTML = count;
  if (count < 10) {
    flechehautgauche.classList.add('add');
    flechehautdroite.classList.add('add');
    bashautdroite.classList.add('add');
    bashautgauche.classList.add('add');
    addition.classList.add('add');
    ampoulenoire.classList.add('add');
    setTimeout(function(){ 
    flechehautgauche.classList.remove('add');
    flechehautdroite.classList.remove('add');
    bashautdroite.classList.remove('add');
    bashautgauche.classList.remove('add');
    addition.classList.remove('add');
    ampoulenoire.classList.remove('add');
    }
    , 300);
  }
  else {
  ampoulesombre.classList.add('add');
  addition.classList.remove('add');
  addition.classList.add('center');
  white2.classList.add('add');
  white3.classList.add('add');
  white4.classList.add('add');
  white5.classList.add('add');
  setTimeout(function(){ 
    white2.classList.remove('add');
    white3.classList.remove('add');
    white4.classList.remove('add');
    white5.classList.remove('add');
    addition.classList.remove('center');
  }, 300);
  
}}); 
});

