var arr = ['</br>', '</br>', '<p>The entire history of human desire takes about seventy minutes to tell.</p><p>Unfortunately, we don’t have that kind of time.</p>','How do I love thee? Let me count the ways', 'Shall I compare thee to a summers day', 'Once upon a midnight dreary, while I pondered weak and weary', '<p>But I have promises to keep,</p><p>And miles to go before I sleep,</p>', 'In Xanadu did Kubla Khan', 'Do not go gentle into that good night', 'A narrow fellow in the grass', '<p>Because I could not stop for death</p><p>He kindly stopped for me</p>', 'I wandered lonely as a cloud', 'At twenty I tried to die', 'And they stuck me together with glue.', '<p>Into the mouth of Hell</p><p>Rode the six hundred.</p>', 'I saw the best minds of my generation destroyed by madness, starving hysterical naked,', 'And that has made all the difference.', 'and this is the wonder that’s keeping the stars apart', 'O Captain! my Captain! our fearful trip is done', 'Of Mans first disobedience, and the fruit', 'Of dog eat dog, of mighty crush the weak.', 'Blood on the leaves and blood at the root,', 'You smug-faced crowds with kindling eye', 'You will be alone always and then you will die.', 'Get out as early as you can,', 'Then you see whats written on his hard drive', '<p>They dont make it</p><p>the beautiful die in flame- </p><p>sucide pills, rat poison, rope what</p><p>ever.</p>', '</br>', '</br>', '</br>', '</br>', '</br>', '</br>']

var titleArr = ['words', 'rules', 'facsism', 'party monster']

var writePoem = function(){
  var poem = document.getElementById('poem-text');
  var words = shuffle(arr);
  poem.innerHTML = words.join(' ');
  writeTitle();

};

var writeTitle = function(){
  var title = document.getElementById('poem-title');
  var titleWords = titleArr;
  title.innerHTML = titleWords.join(' ');
}


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
