<?php
require 'config.php';
?>



<!DOCTYPE html>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="eligcomp.php">Apply For Job</a>
      </li>
      
      
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
</html>



<!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>

 <title>Student Dashboard</title>


 <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
  <div style="width: 400px; background-color: #fff; border-radius: 5px; padding: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);">
    <h2 style="font-size: 1.5rem; font-weight: bold; text-align: center; margin-bottom: 20px;">Upload an updated resume</h2>
    <form action="submit.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="form-group">
        <label for="project_name" style="font-size: 1.1rem; font-weight: bold;">Enter Roll No:</label>
        <input type="text" name="project_name" class="form-control" style="border: 1px solid #ccc; border-radius: 3px; padding: 5px; width: 100%;">
      </div>
      <div class="form-group">
        <label for="pdf_file" style="font-size: 1.1rem; font-weight: bold;">Select PDF file:</label>
        <input type="file" name="pdf_file" accept=".pdf" style="border: 1px solid #ccc; border-radius: 3px; padding: 5px; width: 100%;">
        <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> 
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; border: none; border-radius: 3px; cursor: pointer; width: 100%;">
      </div>
    </form>
  </div>
</div>

</div>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384–9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>

