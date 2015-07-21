var arr = ['monkey', '</br>', '</br>', 'banana', 'brain', 'zombie', 'prom']
shuffle(arr);
console.log(arr);

var writePoem = function(){

  var poem = document.getElementById('poem-text');
  var words = shuffle(arr);

  poem.innerHTML = words;

};

 var btn = document.getElementById('btn');
 btn.addEventListener('click', function(writePoem){
   document.getElementById('poem-text').style.display="block";

 });

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;

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

writePoem();
