Element.prototype.container = function(){

      var sidebar = this,
      wrapper = container,
      position = 0,

      hamburger = document.createElement('div');

  this.createButton = function(){

    hamburger.classList.add('hamburger');

    hamburger.addEventListener('mousedown',function(){
      if(position > (width * (sidebar.length - 1)) * -1){
        position = position - width;
        wrapper.style.marginLeft = position + "px";
      }
    });

    this.init = function(){
      sidebar.createButtons();
    };
      this.init();
  };
