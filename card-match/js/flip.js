var arr = [
  'heart', 'spade', 'club', 'diamond',
  'heart', 'spade', 'club', 'diamond',
  'heart', 'spade', 'club', 'diamond',
  'heart', 'spade', 'club', 'diamond'
];

var firstCardFlipped;

var init = function(table) {
  var shuffledArray = shuffle(arr);
  shuffledArray.forEach(function(suit) {
    var card = makeCard(suit);

    card.addEventListener('click', function() {
      flipAndCompare(card);
    });

    table.appendChild(card);
  });
};

var flipAndCompare = function(card) {
  if (card.classList.contains('flipped')) {
    return;
  }

  flip(card);

  if (firstCardFlipped == null) {
    firstCardFlipped = card;
    return;
  }

  if (getSuit(firstCardFlipped) != getSuit(card)) {
    flip(card);
    setTimeout(function(){
      unFlip(card);
      unFlip(firstCardFlipped);
      firstCardFlipped = null;
    },1000);
  } else {
    firstCardFlipped = null;
  }
};

var flip = function(card){
  card.classList.add('flipped');
}

var unFlip = function(card) {
  card.classList.remove('flipped');
}

var getSuit = function(card) {
  return card.dataset.suit;
}

var makeCard = function(suit) {
  var card = document.createElement('div');
  var front = document.createElement('div');
  var back = document.createElement('div');
  var cardSuit = document.createElement('div');

  card.classList.add('card');
  front.classList.add('front');
  back.classList.add('back');
  cardSuit.classList.add(suit);

  card.appendChild(front);
  card.appendChild(back);
  front.appendChild(cardSuit);

  card.dataset.suit = suit;

  return card;
}

var shuffle = function(array) {
  var currentIndex = array.length,
    temporaryValue, randomIndex;

  while (0 !== currentIndex) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
};


//////////////////////////////////

var cardMatch = function() {};

//match function happens here
var compare = function() {
  for (var i = 0; i < arr.length; i++) {
    var matched = false;

    arr.forEach(function(tag) {
      if (tag === query) { //check if a tag = query
        container.children[i].style.display = 'front'; //if match show li
        matched = true;
      }
    });

    if (matched === false) {
      container.children[i].style.display = 'back';
    }

  }
};



//call functions and run them
init(document.getElementById('card-table'));
