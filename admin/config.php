<?php
session_start();
$db="causeway";
$user="root";
$pwd="Sujit@5566";
$server="localhost";
$port=3306;
$con="";
try{
$con=mysqli_connect($server,$user,$pwd,$db,$port);
}
catch(Exception $e)
{
DBErrorMessage();
}
if(mysqli_connect_errno())
{
    DBErrorMessage();


}


function DBErrorMessage()
{
    echo '
<!-- Toast -->
<div id="liveToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
  <div class="toast-header">
    <div class="d-flex align-items-center flex-grow-1">
      <div class="flex-shrink-0">
        <img class="avatar avatar-sm avatar-circle" src="./assets/img/yantra/yantralogo.png" alt="Image description">
      </div>
      <div class="flex-grow-1 ms-3">
        <h5 class="mb-0 text-danger">Server Connection Error</h5>
      </div>
      <div class="text-end">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
 
</div>
<!-- End Toast -->

    ';

}


function UserErrorMessage()
{
    echo '
<!-- Toast -->
<div id="liveToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
  <div class="toast-header">
    <div class="d-flex align-items-center flex-grow-1">
      <div class="flex-shrink-0">
        <img class="avatar avatar-sm avatar-circle" src="./assets/img/yantra/yantralogo.png" alt="Image description">
      </div>
      <div class="flex-grow-1 ms-3">
        <h5 class="mb-0 text-danger">Something went wrong.. please try again</h5>
      </div>
      <div class="text-end">
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
 
</div>
<!-- End Toast -->

    ';
    session_unset();
    session_destroy();

}



?>