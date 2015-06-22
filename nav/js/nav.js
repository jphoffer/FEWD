Element.prototype.Hamburger = function(hamburgerMenu){

  var hamburger = this;
  var menu = hamburgerMenu;

  this.showing = false;

  this.slideOut = function() {
    menu.style.marginLeft = "0";
    hamburger.style.left = "250px";
    hamburger.showing = true;
  };

  this.slideIn = function() {
    menu.style.marginLeft = "-250px";
    hamburger.style.left = "0";
    hamburger.showing = false;
  };

  hamburger.addEventListener('mousedown',function(){
    if (hamburger.showing) {
      hamburger.slideIn();
    } else {
      hamburger.slideOut();
    }
  });

  this.resizeMenu = function() {
    var body = document.body,
        html = document.documentElement;

    var height = Math.max( body.scrollHeight, body.offsetHeight,
        html.clientHeight, html.scrollHeight, html.offsetHeight );

    menu.style.height = height + "px";
  };

  this.init = function(){
    hamburger.resizeMenu();
  };

  this.init();

};
