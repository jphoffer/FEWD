Element.prototype.Contact = function() {

  var contact = this,
      form = document.getElementById('c_form'),
      submit = document.getElementById('contact-submit'),
      wrapper = document.getElementById('form-wrapper');


  this.send = function() {
    //collect info and send via email
    var link = 'mailto:jpagehoffer@gmail.com?subject=Message from '+
                form.children[0].value+
                '&body='+
                form.children[3].value;
    window.location.href = link;
    wrapper.innerHTML = '<div class="center"><h1>Thanks</h1></div>';
    //leave feedback for user that form was submitted

  };

  this.init = function(){
// add an eventlisten on the button which sends form
    submit.addEventListener('click',function(ev){
      ev.preventDefault();
      contact.send();
    });
  };

this.init();

};
