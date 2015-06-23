//Define prototypical Gallery function
Element.prototype.Gallery = function(){
  var gallery = this;
  var ul = gallery.children[0];
  var photos = {};
  // Define global variables

  this.layoutPhotos = function(){
      // add logic for each photo in here
      console.log(photos);
      photos.forEach(function(photo,index){


    this.singlePhoto = function(ev) {

          console.log(ev);
        };

//added in class
this.expandLi = function(){
    li.innerHTML = '<div class="single-photo"><h5>'+
      photo.name+
      '</h5><h6>'+
      photo.user.fullname+
      '</h6></div><div class="stats"><div>'+
      photo.rating+'</div></div>'+
      '</div>';

};


this.createButton = function(){
    btn.classList.add('single-photo');
    btn.addEventListener('mousedown', expandLi);

};

//end of class additions

        console.log(photo);
        var li = document.createElement('li');

        li.style.backgroundImage = 'url("'+photo.image_url+'")';
        li.style.backgroundSize = 'cover';

        li.innerHTML = '<div class="meta"><h5>'+
          photo.name+
          '</h5><h6>'+
          photo.user.fullname+
          '</h6></div><div class="stats"><div>'+
          photo.rating+'</div></div>'+
          '</div>';

          li.addEventListener('click',gallery.singlePhoto);

        ul.appendChild(li);


      });
  };

  this.connect = function(){
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "./models/popular-photos.json", true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            var response = JSON.parse(xhr.responseText);
            photos = response.photos;
            gallery.layoutPhotos();

          // JSON.parse does not evaluate the attacker's scripts via xhr.responseText.

        }
      }
      xhr.send();
  };

  this.init = function(){

    this.connect();

  };


  this.init(); // do tasks on initialization.


};
/* end Gallery */
