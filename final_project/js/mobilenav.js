Element.prototype.Nav = function(){

  var nav = this;
      navItems = nav.children[0].children,
      sections = document.getElementsByTagName('section'),
      btn = document.createElement('div'),
      container = document.getElementById('container');

      console.log(sections);

  this.toggleNav = function(){
    console.log(container.style.left)
    if(container.style.left === "0px"){
      container.style.left = "220px";
    }
    else{
      container.style.left = "0px";
    }
  };

  this.createButton = function(){

    btn.classList.add('hamburger');
      console.log("btn created")
    btn.addEventListener('mousedown',nav.toggleNav);

    container.appendChild(btn);

  };


  // hide all sections
  this.hideSections = function(){

    for(var i=0; i<sections.length; i++) {
      sections[i].style.opacity = '0';
      sections[i].style.zIndex = '0';
      sections[i].style.display = 'none';
    }

  };

  // show a section
  this.showSection = function(id){
    this.hideSections();
    document.getElementById(id).style.display = 'block';
    document.getElementById(id).style.opacity = '1.0';
    document.getElementById(id).style.zIndex = '50';


  };

  this.init = function(){

    nav.createButton();

    // loop through all li and addEventListener
    for(var i=0; i<navItems.length; i++) {
        navItems[i].addEventListener('click', function(ev){

          var id = ev.target.dataset.section;
          nav.showSection(id);
          nav.toggleNav();

        });

    }

  };

  this.init();
};
