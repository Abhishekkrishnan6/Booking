<div class="container-fluid bg-white mt-5">
  <div class="row">
    <div class="col-lg-4 p-4">
      <h3 class="h-font fw-bold fs-3 mb-2">BOOKINGS</h3>
      <p>
        weugweuhjfgvwe wugrw wuyr uyfwr
        iukfiyfuy
        udcutfyt uyfuy registerModal
      </p>
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Links</h5>
      <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
      <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
      <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
      <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a><br>
      <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a><br>


    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Follow Us</h5>

      <?php
      if ($contact_r['tw'] != '') {
        echo <<<data
 <a href="$contact_r[tw]" class="d-inline-block text-dark text-decoration-none ">
  <i class="bi bi-twitter me-1"></i> Twitter
    </a> <br>
data;
      }
      ?>
      <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
        <i class="bi bi-instagram me-1"></i> Instagram
      </a> <br>
      <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
        <i class="bi bi-facebook me-1"></i> Facebook
      </a> <br>


    </div>
  </div>
</div>








<h6 class="text-center bg-dark text-white p-3 m-0">Design and Developed BY Abhishek </h6>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

function alert(type, msg,postion='body') {
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
    <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
    <strong class="me-3">${msg}</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    `;
     if(postion=='body'){
    document.body.append(element);
     element.classList.add('custom-alert');
     }
     else{
       document.getElementById(postion).appendChild(element);

     }
     setTimeout(remAlert,3000);
  }
  function remAlert(){
    document.getElementsByClassName('alert')[0].remove();
  }



  function setActive() {
    let navbar = document.getElementById('nav-bar');
    let a_tags = navbar.getElementsByTagName('a');


    for (i = 0; i < a_tags.length; i++) {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];
      if (document.location.href.indexOf(file_name) >= 0) {
        a_tags[i].classList.add('active');
      }

    }
  }


  let register_form = document.getElementById('register-form');
  register_form.addEventListener('submit', (e)=>{
e.preventDefault();
let data = new FormData();
data.append('name',register_form.elements['name'].value);
data.append('email',register_form.elements['email'].value);
data.append('phonenum',register_form.elements['phonenum'].value);
data.append('profile',register_form.elements['profile'].files[0]);
data.append('address',register_form.elements['address'].value);
data.append('pincode',register_form.elements['pincode'].value);
data.append('dob',register_form.elements['dob'].value);
data.append('pass',register_form.elements['pass'].value);
data.append('cpass',register_form.elements['cpass'].value);
//data.append('profile',register_form.elements['profile'].files[0]);
data.append('register','');


var myModal =document.getElementById('registerModal');
var modal = bootstrap.Modal.getInstance(myModal);
modal.hide();
let xhr = new XMLHttpRequest();
  xhr.open("POST","ajax/login_register.php",true);
xhr.onload = function(){
if(this.responseText == 'pass_missmatch'){
  alert('error',"password missmatch");
}
else if(this.responseText == 'email_already'){
  alert('error',"email is already regester");
}
else if(this.responseText == 'phone_already'){
  alert('error',"phone number is already used");
}




else if(this.responseText == 'inv_img'){
  alert('error',"only formated image is allowed");
}


else if(this.responseText == 'upd_failed'){
  alert('error',"upload failed size greater than 2 mb");
}
else if(this.responseText == 'mail_failed'){
  alert('error'," failed to send mail ");
}
else if(this.responseText == 'ins_failed'){
  alert('error',"registration failed");
}
else{

alert('success',"registration successful");
register_form.reset();

}

  }
  xhr.send(data);

});
  setActive();

</script>