window.onload = function() {

  setTimeout(function(){
    var modal = document.getElementById('myModal').style.display="block";
  }, 1000);

    var closeBox = document.getElementById('close');

    closeBox.addEventListener('mousedown', function(){
      document.getElementById('myModal').style.display="none";
    });
};
