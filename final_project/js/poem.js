var arr = ['monkey', '</br>', '</br>', 'banana', 'brain', 'wander', 'cell', 'prom', 'fatal', 'mourning']


var writePoem = function(){
  var poem = document.getElementById('poem-text');
  var words = shuffle(arr);
  poem.innerHTML = words.join(' ');


};

  Math.floor((Math.random() * 3) + 1);


 var btn = document.getElementById('btn');
 btn.addEventListener('mousedown',writePoem);



 // Shuffle that shit
function shuffle(array) {
  var currentIndex = Math.floor((Math.random() * 3) + 1), temporaryValue, randomIndex ;
  console.log(currentIndex);
  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}
