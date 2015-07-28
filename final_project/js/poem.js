var arr = ['<p>The entire history of human desire takes about seventy minutes to tell.</p><p>Unfortunately, we don&#8217;t have that kind of time.</p>','How do I love thee? Let me count the ways', 'Shall I compare thee to a summer&#8217;s day', 'Once upon a midnight dreary, while I pondered weak and weary', '<p>But I have promises to keep,</p><p>And miles to go before I sleep,</p>', '<p>In Xanadu did Kubla Khan</p>', 'Do not go gentle into that good night', 'A narrow fellow in the grass', '<p>Because I could not stop for death</p><p>He kindly stopped for me</p>', 'I wandered lonely as a cloud', 'At twenty I tried to die', 'And they stuck me together with glue.', '<p>Into the mouth of Hell</p><p>Rode the six hundred.</p>', 'I saw the best minds of my generation destroyed by madness, starving hysterical naked,', 'And that has made all the difference.', 'and this is the wonder that’s keeping the stars apart', 'O Captain! my Captain! our fearful trip is done', 'Of Man&#8217;s first disobedience, and the fruit', 'Of dog eat dog, of mighty crush the weak.', 'Blood on the leaves and blood at the root,', 'You smug-faced crowds with kindling eye', 'You will be alone always and then you will die.', 'Get out as early as you can,', 'Then you see what&#8217;s written on his hard drive.', '<p>They don&#8217;t make it</p><p>the beautiful die in flame- </p><p>sucide pills, rat poison, rope what</p><p>ever.</p>', 'The eagle never lost so much time as when he submitted to learn of the crow', '</br>', '</br>', '</br>', '</br>', '</br>', '</br>','</br>', '</br>', '</br>', '</br>', '</br>', '</br>']

var titleArr = ['In Praise of', 'An Ode to', 'Eulogy for', 'wanderlust', 'defenestration', 'whispers', 'glee', 'sorrow']

var writePoem = function(){
  var poem = document.getElementById('poem-text');
  var words = shuffle(arr);
  poem.innerHTML = words.join(' ');
  writeTitle();

};

var writeTitle = function(){
  var title = document.getElementById('poem-title');
  var titles = arrange(titleArr);
  title.innerHTML = titles.join(' ');
};

 var btn = document.getElementById('btn');
 btn.addEventListener('click',writePoem);

//title shuffle
function arrange(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  var otherArray = [];
  // While there remain elements to shuffle...
  var x = Math.floor((Math.random() * 3) +1);

  while (x > 0) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = titleArr[currentIndex];
    titleArr[currentIndex] = titleArr[randomIndex];
    otherArray.push(titleArr[currentIndex]);
    titleArr[randomIndex] = temporaryValue;

    x--;

  };

  return otherArray;
};

 // poem text shuffle
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;
  var myArray = [];
  // While there remain elements to shuffle...
  var i = Math.floor((Math.random() * currentIndex) +1);

  while (i > 0) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    myArray.push(array[currentIndex]);
    array[randomIndex] = temporaryValue;

    i--;

  };

  return myArray;
};
