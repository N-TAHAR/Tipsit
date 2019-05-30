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
  })
}


function redirect(){
  window.location.href = "login.php";
}

