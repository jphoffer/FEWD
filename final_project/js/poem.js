var arr = ['monkey', '</br>', '</br>', 'banana', 'brain', 'wander', 'cell', 'prom', 'fatal', 'mourning']


var writePoem = function(){
  var poem = document.getElementById('poem-text');
  var words = shuffle(arr);
  poem.innerHTML = words.join(' ');


};



 var btn = document.getElementById('btn');
 btn.addEventListener('mousedown',writePoem);



 // Shuffle that shit
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;
  //console.log(currentIndex);
  var myArray = [];
  // While there remain elements to shuffle...
  var i = Math.floor((Math.random() * currentIndex) +1);

  while (i > 0) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    console.log(randomIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    myArray.push(array[currentIndex]);
    array[randomIndex] = temporaryValue;
    i--;

  }



  return myArray;
}
