var cardMatch = function(){
  var container = document.getElementById('container');
};

//match function happens here
var compare = function(){
  for(var i = 0; i< arr.length; i++) {
    var matched = false;

  arr.forEach(function(tag){
          if(tag === query){ //check if a tag = query
            container.children[i].style.display = 'front'; //if match show li
            matched = true;
          }
        });

        if(matched === false){
          container.children[i].style.display = 'back';
        }

}
//call transition?

//create card happens here
this.makeCard = function() {
  var card = document.createElement('card');
  section.classList.add('')
}

//randomize card happens here -- this is done
var arr = ['heart', 'spade', 'club', 'diamond','heart', 'spade', 'club', 'diamond','heart', 'spade', 'club', 'diamond','heart', 'spade', 'club', 'diamond'];
  shuffle(arr);
  console.log(arr);

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


//call functions and run them
