<?php

include("../header.php");

if(!isset($_GET["id"]))
{
    echo "<script> window.location.href='index.php';</script>";
}

$pdata=mysqli_query($con,"select * from product_master where id=".$_GET["id"]."");
if(!$pdata)
{
    echo "<script> window.location.href='index.php';</script>";
}

$pdata=mysqli_fetch_assoc($pdata);



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
if(isset($_GET["d"]) && isset($_GET["fid"]))
{
    try{
        if($_GET["d"]==1)
        {
            $rs=mysqli_query($con,"delete from product_field_master where id=".$_GET["fid"]."");
            if($rs)
            {
                UserMessage("Field Deleted Successfully","success");
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


//Add new field Code
if(isset($_GET["addbtn"]))
{
        try{

            $rs=mysqli_query($con,"insert into product_field_master(p_id,f_name,f_value)
             values(".$pdata["id"].",'".$_GET["fname"]."',
             '".$_GET["fvalue"]."')");
            if($rs)
            {
                    UserMessage("Field added Successfully","success");         
    echo "<script> window.location.href='fields.php?id=".$pdata["id"]."';</script>";
            }
        }catch(Exception $e)
        {
            UserMessage("Error Occured. Connect with the administrator","danger");
        }
}



?>

<!-- Content -->
<div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="page-header-title">Product - <?php echo $pdata["ptitle"];?> </h1>
          </div>
          <!-- End Col -->

          <div class="col-auto">
            <a class="btn btn-danger" href="javascript:;" data-bs-toggle="modal" data-bs-target="#CareerAddModal">
              <i class="bi-person-plus-fill me-1"></i> Add Fields
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
          <h4 class="modal-title" id="accountAddAddressModalLabel">New Field</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- End Header -->

        <!-- Body -->
        <div class="modal-body">
          <!-- Form -->
          <form action="./fields.php" method="GET">
            <!-- Form -->
            <div class="row mb-4">
              <label for="locationLabel" class="col-sm-3 col-form-label form-label">Field Name</label>
              <div class="col-sm-9">
    
              <input type="text" hidden class="form-control" name="id" value="<?php echo $pdata["id"];?>" id="fname" placeholder="field name" aria-label="Job Title">
                <input type="text" class="form-control" name="fname" id="fname" placeholder="field name" aria-label="Job Title">
              </div>
            </div>
            <!-- End Form -->

             <!-- Form -->
             <div class="row mb-4">
              <label for="locationLabel" class="col-sm-3 col-form-label form-label">Field Value</label>
              <div class="col-sm-9">
    
                <input type="text" class="form-control" name="fvalue" id="fvalue" placeholder="Field value" aria-label="Field value">
              </div>
            </div>
            <!-- End Form -->



            <div class="d-flex justify-content-end gap-sm-3">
              <button type="button" class="btn btn-white me-2 me-sm-0" data-dismiss="modal">Close</button>
              <button type="submit" name="addbtn" class="btn btn-outline-success">Add Field</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
        <!-- End Body -->
      </div>
    </div>
  </div>



       <!-- Card -->
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
            <!-- End Dropdown -->
          </div>
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom position-relative">
          <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
                   "columnDefs": [{
                      "targets": [0, 3],
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
                 }'   >
            <thead class="thead-light">
              <tr>
                <th class="table-column-pe-0">
                 ID 
                </th>
                <th class="table-column-ps-0">Field Name</th>
                <th>Field Value </th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $c=1;
                    $rs=mysqli_query($con,"select * from product_field_master where p_id=".$pdata["id"].";");
                    while($data=mysqli_fetch_assoc($rs))
                    {
                       echo '
                       <tr>
                       <td class="table-column-pe-0">
                         '.$c.'
                       </td>
                       <td class="table-column-ps-0">
                         <a class="d-flex align-items-center" href="#">
                           <div class="ms-3">
                             <span class="d-block h5 text-inherit mb-0">
                                    '.$data["f_name"].'
                           </div>
                         </a>
                       </td>
                       <td>
                         <span class="d-block h5 mb-0">'.$data["f_value"].'</span>
                       </td>
                       <td>
                       <a  class="btn btn-outline-danger btn-sm" href="fields.php?id='.$pdata["id"].'&fid='.$data["id"].'&d=1" >
                           <i class="bi-trash me-1"></i> Delete 
                         </a>
                       </td>
                     </tr>
                       
                       '; 
                       $c++;
                    }
                
                ?>

            </tbody>
          </table>
        </div>
        <!-- End Table -->

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



    
    </div>
    <!-- End Content -->   

  <?php
  include("../footer.php");
  
  ?>