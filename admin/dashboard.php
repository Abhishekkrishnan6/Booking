<?php

require('inc/essentials.php');
adminLogin();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
    <?php

require('inc/links.php');



?>
    </head>
  <body class="bg-light">
<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between">
<h3 class="mb-0 h-font">Admin panel </h3>	
<a href="logout.php" class="btn btn-light btn-sm">Log out</a>
</div>



<div class="col-lg-2 bg-dark border-top border-3 border-secondary">
<nav class="navbar navbar-expand-lg navbar-dark "> 
  <div class="container-fluid flex-lg-column align-items-stretch"> 
    <h4 class="mt-2 text-light">ADMIN PANEL</h4>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-cont></button>
    <span class="navbar-toggler-con"></span>
</button>
<div class="collapse navar-collapse flex-column align-items-stretch mt-2" id="adminDropdown"> 
 
<ul class ="nav nav-pills flex-column"> 
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a> 
  </i>
<li class= "nav-item"> 
  <a class= "nav-link" href="#">Link</a> 
</li> 
<li class="nav-item"> 
  <a class="nav-link" href="#">Link</a> 
</li> 
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> 
</i>
</ul>


</div>

</div>

</nav>
</div>





<?php

require('inc/scripts.php');



?>



</body>
</html>