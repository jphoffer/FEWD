Element.prototype.Nav = function(){

  var nav = this;
      btn = document.createElement('div'),
      container = document.getElementById('container');

  this.toggleNav = function(){
    if(container.style.right === "0px"){
      container.style.right = "13.75em";
    }
    else{
      container.style.right = "0px";
    }
  };

  this.createButton = function(){

    btn.classList.add('hamburger');
    btn.addEventListener('mousedown',nav.toggleNav);
    container.appendChild(btn);

  };

  this.init = function(){

    nav.createButton();

  };

  this.init();
};
