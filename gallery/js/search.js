Element.prototype.Search = function(){
  var gallery = document.getElementById('gallery');
  var search = this;
  var input = this.children[0];

//  gallery.filterPhotos(query);



  this.init = function(){

    input.addEventListener('focus',function(){
      this.value = '';
    });

    input.addEventListener('keyup',function(ev){

        if(ev.keyCode === 13) {
          var query = input.value;
          gallery.filterPhotos(query);
        }
    });
  };


 this.init();


 };
