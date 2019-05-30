var posts = document.querySelectorAll('.post')

function ajax(postId) {
  $.ajax({
    type: "POST",
    url: "clap.php",
    data: {postId: postId},
  })
  .done(function (bulbNumberObject) {
    //changer le nombre de likes totaux
    tip = document.getElementById(postId);
    tip.querySelector('.bulbNumber').innerHTML = parseInt(tip.querySelector('.bulbNumber').innerHTML) + 1;
<<<<<<< HEAD
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
=======

    //animation du like de l'user en prenant en compte son nombre total de like sur le post
    let bulbNumber = bulbNumberObject.bulbNumber;
    let flechehautgauche = tip.querySelector('.partie2');
    let flechehautdroite = tip.querySelector('.partie4');
    let bashautdroite = tip.querySelector('.partie3');
    let bashautgauche = tip.querySelector('.partie5');
    let addition = tip.querySelector('.addition');
    let ampoulenoire = tip.querySelector('.ampoulenoire');
    let ampoulesombre = tip.querySelector('.ampoulesombre')
    let white2 = tip.querySelector('.partie2white');
    let white3 = tip.querySelector('.partie3white');
    let white4 = tip.querySelector('.partie4white');
    let white5 = tip.querySelector('.partie5white');
    addition.innerHTML = bulbNumber;
    if (bulbNumber < 10) {
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
>>>>>>> ea9d701333273fbb81e420529623ae1c03bf11aa
    addition.classList.remove('add');
    addition.classList.add('center');
    white2.classList.add('add');
    white3.classList.add('add');
    white4.classList.add('add');
    white5.classList.add('add');
    setTimeout(function() { 
      white2.classList.remove('add');
      white3.classList.remove('add');
      white4.classList.remove('add');
      white5.classList.remove('add');
      addition.classList.remove('center');
    }, 300);
    }
<<<<<<< HEAD
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

=======
  })
}
>>>>>>> ea9d701333273fbb81e420529623ae1c03bf11aa
