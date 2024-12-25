<?php

include("../header.php");

if(isset($_GET["id"]))
{
  $rs=mysqli_query($con,"update contact_master set status=0 where id=".$_GET["id"]."");
  if($rs)
  {
    echo "<script>alert('Customer closed successfully'); window.location.href='contactreq.php';</script>";
  }
  else
  {
    echo "<script>alert('Error in closing customer'); window.location.href='contactreq.php';</script>";
  }

}
?>

<!-- Content -->
<div class="content container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="page-header-title">Contact Enquiry</h1>
          </div>
          <!-- End Col -->        
        </div>
        <!-- End Row -->
      </div>
      <!-- End Page Header -->

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
                      "targets": [0, 6],
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
                 No
                </th>
                <th class="table-column-ps-0">Name</th>
                <th>Email Id</th>
                <th>Phone No</th>
                <th>Date-Time</th>
                <th>Message</th>
                <th>Action</th>
               
              </tr>
            </thead>

            <tbody>
                <?php
                $c=1;
                //There the query will change to join as we have to display the product name also.
                $rs=mysqli_query($con,"select * from contact_master order by status desc");
                while($data=mysqli_fetch_assoc($rs))
                {
                    echo '
                    <tr>
                <td class="table-column-pe-0">
                  '.$c.'
                </td>
                <td class="table-column-ps-0">
                  <a class="d-flex align-items-center" href="#"  data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                    <div class="ms-3">
                      <span class="d-block h5 text-inherit mb-0">'.$data["f_name"].' '.$data['l_name'].'                    
                    </div>
                  </a>
                </td>
                <td>
                  <span class="d-block h5 mb-0">'.$data['email_id'].'</span>
                </td>
                <td>'.$data["phone_no"].'</td>
                <td>'.$data["req_date_time"].'</td>
                <td style="width:30%; word-wrap: break-word; white-space:pre-wrap;">'.$data["msg"].'</td>
                <td>
                  ';
                  if($data["status"]==1)
                  {
                    echo '
                    <a class="btn btn-outline-success btn-sm" href="contactreq.php?id='.$data["id"].'" >
                    <i class="bi-trush me-1"></i> Close Customer
                  </a>
    
                    ';
                  }
                  else
                  {
                    
                    echo '
                    <button type="button" class="btn btn-danger btn-sm" >
                    <i class="bi-trush me-1"></i> Closed 
                  </button>
    
                    ';
                  }
                

                echo '
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
    <!-- End Content -->   

  <?php
  include("../footer.php");
  
  ?>