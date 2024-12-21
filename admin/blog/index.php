<?php

include("../header.php");


function UserMessage($msg,$type)
{
    echo '
<!-- Toast -->
<div id="liveToast" class="position-fixed toast show" role="alert" aria-live="assertive" aria-atomic="true" style="top: 20px; right: 20px; z-index: 1000;">
  <div class="toast-header">
    <div class="d-flex align-items-center flex-grow-1">
      <div class="flex-shrink-0">
        <img class="avatar avatar-sm avatar-circle" src="../assets/img/yantra/yantralogo.png" alt="Image description">
      </div>
      <div class="flex-grow-1 ms-3">
        <h5 class="mb-0 text-'.$type.'">'.$msg.'</h5>
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

//Delete Role
if(isset($_GET["dc"]))
{
    try{
        if($_GET["dc"]==1)
        {
            $rs=mysqli_query($con,"update blog_master set status=0 where id=".$_GET["id"]."");
           
            if($rs)
            {
                UserMessage("Blog Deleted Successfully","success");
                echo "<script>window.location='./'</script>";
            }
            else
            {
                UserMessage("Something went wrong. Try again","danger");
            }
        }
    }catch(Exception $e)
    {

        UserMessage("Something went wrong. Try again","danger");
    }
}


//Add new Blog Code
if(isset($_POST["addbtn"]))
{
        try{
            include("../util/photoupload.php");
            $up=new PhotoUpload("file","blog","../images/blog/");

          if ($up->save()) {

              // Insert data into database
                $title = $_POST["btitle"];
                $title=str_replace("'","\'",$title);
                $desc = $_POST["bdesc"];
                $desc=str_replace("'","\'",$desc);
                $imgUrl = $up->getPath(); // Complete URL of the image 
                $imgUrl=str_replace("../","",$imgUrl);
                $status = 1;
                $query="insert into blog_master(btitle, bdesc, img, bdate, status) values('".$title."', '".$desc."', '".$imgUrl."', NOW(), ".$status.")";
                $rs = mysqli_query($con, $query);
 
                
                if ($rs) {
                    UserMessage("Blog added Successfully", "success");
                } else {
                    UserMessage("Error Occurred. Connect with the administrator", "danger");
                }

            } 
            else {
                UserMessage("Sorry, there was an error uploading your file", "danger");
            }
          
          }catch(Exception $e) {
        UserMessage("Error Occurred. Connect with the administrator :".$e->getMessage()." ", "danger");
    }
}



?>

<!-- Content -->
<div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="page-header-title">Blog </h1>
          </div>
          <!-- End Col -->

          <div class="col-auto">
            <a class="btn btn-danger" href="javascript:;" data-bs-toggle="modal" data-bs-target="#CareerAddModal">
              <i class="bi-person-plus-fill me-1"></i> Write Blog
            </a>
          </div>
          <!-- End Col -->
        </div>
        <!-- End Row -->
      </div>
      <!-- End Page Header -->

     
<!-- Add Address Modal -->
<div class="modal fade" id="CareerAddModal" tabindex="-1" aria-labelledby="accountAddAddressModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <!-- Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="accountAddAddressModalLabel">New blog</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="modal-body">
          <!-- Form -->
          <form action="./index.php" method="POST" enctype="multipart/form-data">
    <div class="row mb-4">
        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Blog Title</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="btitle" id="btitle" placeholder="Blog title" aria-label="Job Title">
        </div>
    </div>
    <div class="row mb-4">
        <label for="locationLabel" class="col-sm-3 col-form-label form-label">Blog Description</label>
        <div class="col-sm-9">
            <textarea class="form-control" name="bdesc" id="bdesc" placeholder="Detail description" aria-label="Detail job description" rows="8"></textarea>
        </div>
    </div>
    <div class="mb-3">
        <label for="validationValidFileInput1">Upload your photo</label>
        <input type="file" id="validationValidFileInput1" class="form-control" name="file">
    </div>
    <div class="d-flex justify-content-end gap-sm-3">
        <button type="submit" name="addbtn" class="btn btn-outline-success">Add Blog</button>
    </div>
</form>
        </div>
      </div>
    </div>
  </div>
       <div class="card">
        <!-- Header -->
        <div class="card-header card-header-content-md-between">
          <div class="mb-2 mb-md-0">
            <form>
              <!-- Search -->
              <div class="input-group input-group-merge input-group-flush">
                <div class="input-group-prepend input-group-text">
                  <i class="bi-search"></i>
                </div>
                <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
              </div>
              <!-- End Search -->
            </form>
          </div>

          <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">

            <!-- Dropdown -->
            <div class="dropdown">
              <button type="button" class="btn btn-white btn-sm dropdown-toggle w-100" id="usersExportDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi-download me-2"></i> Export
              </button>

              <div class="dropdown-menu dropdown-menu-sm-end" aria-labelledby="usersExportDropdown">
                
                <span class="dropdown-header">Download options</span>
                <a id="export-excel" class="dropdown-item" href="javascript:;">
                  <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/brands/excel-icon.svg" alt="Image Description">
                  Excel
                </a>
             
                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                  <img class="avatar avatar-xss avatar-4x3 me-2" src="../assets/svg/brands/pdf-icon.svg" alt="Image Description">
                  PDF
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive datatable-custom position-relative">
    <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
        "columnDefs": [{
            "targets": [0, 4],
            "orderable": false
        }],
        "order": [],
        "info": {
            "totalQty": "#datatableWithPaginationInfoTotalQty"
        },
        "search": "#datatableSearch",
        "entries": "#datatableEntries",
        "pageLength": 15,
        "isResponsive": false,
        "isShowPaging": false,
        "pagination": "datatablePagination"
    }'>
        <thead class="thead-light">
            <tr>
                <th class="table-column-pe-0">ID</th>
                <th class="table-column-ps-0">Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $c = 1;
            $rs = mysqli_query($con, "SELECT * FROM blog_master WHERE status = 1 ORDER BY id DESC;");
            while ($data = mysqli_fetch_assoc($rs)) {
                echo '
                <tr>
                    <td class="table-column-pe-0">' . $c . '</td>
                    <td class="table-column-ps-0">
                        <a class="d-flex align-items-center" href="#">
                            <div class="ms-3">
                                <span class="d-block h5 text-inherit mb-0">' . $data["btitle"] . '</span>
                            </div>
                        </a>
                    </td>
                    <td>' . $data["bdesc"] . '</td>
                    <td>' . $data["bdate"] . '</td>
                    <td><a href="'.$data["img"].'" target="_blank" rel="noopener noreferrer">Image Link</a></td>
                    <td>
                    <button type="button" onclick="warningFunc(\''.$data["id"].'\')" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi-trash me-1"></i> Delete 
                  </button>

                    </td>
                </tr>';

                $c++;
            }
            ?>
        </tbody>
    </table>
</div>




        <!-- Footer -->
        <div class="card-footer">
          <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
            <div class="col-sm mb-2 mb-sm-0">
              <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                <span class="me-2">Showing:</span>

                <!-- Select -->
                <div class="tom-select-custom">
                  <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{
                            "searchInDropdown": false,
                            "hideSearch": true
                          }'>
                    <option value="10">10</option>
                    <option value="15" selected>15</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <!-- End Select -->

                <span class="text-secondary me-2">of</span>

                <!-- Pagination Quantity -->
                <span id="datatableWithPaginationInfoTotalQty"></span>
              </div>
            </div>
            <!-- End Col -->

            <div class="col-sm-auto">
              <div class="d-flex justify-content-center justify-content-sm-end">
                <!-- Pagination -->
                <nav id="datatablePagination" aria-label="Activity pagination"></nav>
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Footer -->
      </div>
      <!-- End Card -->
    



      </div>
     
    </div>
  </div>
</div>
<!-- End Modal -->

<script>
function warningFunc(id)
{
    var message=document.getElementById("wmessage");
    message.innerHTML='Are you sure to delete the this blog ?';
    var dbtn=document.getElementById("wdeletebtn");
    dbtn.setAttribute('href','./index.php?dc=1&id='+id);
}
</script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Job Posting?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="wmessage">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="#" id="wdeletebtn">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->




    
    </div>
    <!-- End Content -->   

  <?php
  include("../footer.php");
  
  ?>