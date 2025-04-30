<?php

include("../header.php");

function UserMessage($msg, $type)
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
                    <h5 class="mb-0 text-' . $type . '">' . $msg . '</h5>
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

// Add new Product Code
if (isset($_POST["addbtn"])) {
    try {
        include("../util/photoupload.php");
        $up = new PhotoUpload("file", "product", "../images/product/");

        if ($up->save()) {
            // Retrieve and sanitize input values
            $title = mysqli_real_escape_string($con, $_POST["ptitle"]);
            $desc = mysqli_real_escape_string($con, $_POST["pdesc"]);
            $price = floatval($_POST["price"]); // Convert price to a decimal
            $category = mysqli_real_escape_string($con, $_POST["category"]);

            // Get image path and prepare for insertion
            $imgUrl = $up->getPath(); // Complete URL of the image
            $imgUrl = str_replace("../", "", $imgUrl); // Remove relative path
            $status = 1; // Active status

            // Insert query
            $query = "INSERT INTO product_master(ptitle, pdesc, price, category, img, pdate, status) 
                      VALUES ('$title', '$desc', $price, '$category', '$imgUrl', NOW(), $status)";

            // Execute the query
            $rs = mysqli_query($con, $query);

            if ($rs) {
                UserMessage("Product added successfully", "success");
            } else {
                UserMessage("Error occurred: " . mysqli_error($con), "danger");
            }
        } else {
            UserMessage("Sorry, there was an error uploading your file", "danger");
        }
    } catch (Exception $e) {
        UserMessage("Error occurred. Connect with the administrator: " . $e->getMessage(), "danger");
    }
}



//edit product
if (isset($_POST["editbtn"])) {
    try {
        include("../util/photoupload.php");
        $up = new PhotoUpload("edit_file", "product", "../images/product/");

        if ($up->save()) {

            // Retrieve and sanitize input values
            $title = mysqli_real_escape_string($con, $_POST["edit_ptitle"]);
            $desc = mysqli_real_escape_string($con, $_POST["edit_pdesc"]);
            $category = mysqli_real_escape_string($con, $_POST["edit_pcategory"]);
            $status = 1; // Assuming you want the product to remain active

            // Get the image path and remove the relative path prefix
            $imgUrl = $up->getPath(); // Complete URL of the image 
            $imgUrl = str_replace("../", "", $imgUrl); // Remove relative path prefix

            // Prepare the update query
            $query = "UPDATE product_master 
                      SET ptitle = '$title', pdesc = '$desc', category = '$category', img = '$imgUrl', pdate = NOW(), status = $status 
                      WHERE id = " . intval($_POST["product_id"]);

            // Execute the query
            $rs = mysqli_query($con, $query);

            if ($rs) {
                UserMessage("Product updated successfully", "success");
            } else {
                UserMessage("Error occurred: " . mysqli_error($con), "danger");
            }
        } else {
            UserMessage("Sorry, there was an error uploading your file", "danger");
        }
    } catch (Exception $e) {
        UserMessage("Error occurred. Connect with the administrator: " . $e->getMessage(), "danger");
    }
}



//delete product
if(isset($_GET["id"]) && isset($_GET["d"]) && $_GET["d"]==1)
{

    mysqli_query($con,"delete from product_master where id=".$_GET["id"]."");
    mysqli_query($con,"delete from product_field_master where p_id=".$_GET["id"]."");
    echo "<script>window.location.href='index.php';</script>";
}




// // Handle product edits
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_ptitle"]) && isset($_POST["product_id"])) {
//     $product_id = $_POST["product_id"];
//     $edit_ptitle = $_POST["edit_ptitle"];
//     // Similarly, get other edited fields here

//     // Update the product in the database
//     $query = "UPDATE product_master SET ptitle = '$edit_ptitle' WHERE id = $product_id";
//     $result = mysqli_query($con, $query);

//     if ($result) {
//         UserMessage("Product updated Successfully", "success");
//     } else {
//         UserMessage("Error Occurred. Connect with the administrator", "danger");
//     }
// }


?>

<!-- Content -->
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Product List</h1>
            </div>
            <!-- End Col -->

            <div class="col-auto">
                <a class="btn btn-danger" href="javascript:;" data-bs-toggle="modal" data-bs-target="#ProductAddModal">
                    <i class="bi-person-plus-fill me-1"></i> New Product
                </a>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
    <!-- End Page Header -->

    <!-- Add Product Modal -->
    <div class="modal fade" id="ProductAddModal" tabindex="-1" aria-labelledby="ProductAddModalLabel" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ProductAddModalLabel">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form action="./index.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="ptitle" class="form-label">Product Title</label>
                        <input type="text" class="form-control" id="ptitle" name="ptitle" placeholder="Product Title" required>
                    </div>
                    <div class="mb-3">
                        <label for="pdesc" class="form-label">Product Description</label>
                        <textarea class="form-control" id="pdesc" name="pdesc" placeholder="Product Description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Product Price" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Product Category</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Choose category</option>
                            <option value="agriculture">Agriculture</option>
                            <option value="enterprise">Enterprise</option>
                            <option value="defence">Defence</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="file" name="img" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="pdate" class="form-label">Date</label>
                        <input type="datetime-local" class="form-control" id="pdate" name="pdate" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="">Choose status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div> -->
                    <button type="submit" class="btn btn-primary" name="addbtn">Add Product</button>
                </form>
                <!-- End Form -->
            </div>
        </div>
    </div>
    </div>

    <!-- End Add Product Modal -->

    <!-- Edit Product Modals -->
    <!-- Edit Product Modals -->
    <?php

$rs = mysqli_query($con, "SELECT * FROM product_master WHERE status=1 ORDER BY id DESC;");
while ($data = mysqli_fetch_assoc($rs)) {
?>
    <div class="modal fade" id="editProductModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="editProductModalLabel<?php echo $data['id']; ?>" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel<?php echo $data['id']; ?>">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="./index.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">
                        <div class="mb-3">
                            <label for="edit_ptitle_<?php echo $data['id']; ?>" class="form-label">Product Title</label>
                            <input type="text" class="form-control" id="edit_ptitle_<?php echo $data['id']; ?>" name="edit_ptitle" value="<?php echo $data['ptitle']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_pdesc_<?php echo $data['id']; ?>" class="form-label">Product Description</label>
                            <textarea class="form-control" id="edit_pdesc_<?php echo $data['id']; ?>" name="edit_pdesc" required><?php echo $data['pdesc']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit_category_<?php echo $data['id']; ?>" class="form-label">Product Category</label>
                            <input type="text" class="form-control" id="edit_category_<?php echo $data['id']; ?>" name="edit_category" value="<?php echo $data['category']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_file_<?php echo $data['id']; ?>" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="edit_file_<?php echo $data['id']; ?>" name="edit_file">
                            <small class="form-text text-muted">Leave empty if you don't want to change the image.</small>
                        </div>
                        <button type="submit" class="btn btn-primary" name="editbtn">Save Changes</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<!-- End Edit Product Modals -->

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
                        <input id="datatableSearch" type="search" class="form-control" placeholder="Search products" aria-label="Search products">
                    </div>
                    <!-- End Search -->
                </form>
            </div>

            <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">

                <!-- Export Dropdown -->
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
                <!-- End Export Dropdown -->
            </div>
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom position-relative">
    <table id="datatable" class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table" data-hs-datatables-options='{
        "columnDefs":[{"targets":[0, 6],"orderable":false}],
        "order":[],
        "info":{"totalQty":"#datatableWithPaginationInfoTotalQty"},
        "search":"#datatableSearch",
        "entries":"#datatableEntries",
        "pageLength":15,
        "isResponsive":false,
        "isShowPaging":false,
        "pagination":"datatablePagination"
    }'>
        <thead class="thead-light">
            <tr>
                <th class="table-column-pe-0">ID</th>
                <th class="table-column-ps-0">Product Name</th>
                <!-- <th>Caption</th> -->
                <th>Description</th>
                <th>Category</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch data from the database
            $rs = mysqli_query($con, "SELECT * FROM product_master WHERE status=1 ORDER BY id DESC;");
            $c = 1;
            while ($data = mysqli_fetch_assoc($rs)) {
                echo '
                <tr>
                    <td class="table-column-pe-0">' . $c . '</td>
                    <td class="table-column-ps-0">
                        <a class="d-flex align-items-center" href="fields.php?id=' . $data["id"] . '">
                            <div class="ms-3">
                                <span class="d-block h5 text-inherit mb-0">' . htmlspecialchars($data["ptitle"]) . '</span>
                            </div>
                        </a>
                    </td>
                     <td><span class="d-block h5 mb-0">' . htmlspecialchars($data["pdesc"]) . '</span></td>
                    <td style="width:30%; word-wrap: break-word; white-space: pre-wrap;">' . htmlspecialchars($data["category"]) . '</td>
                    <td><a href="../' . htmlspecialchars($data["img"]) . '" target="_blank" rel="noopener noreferrer">Image Link</a></td>
                    <td>
                        <button type="button" class="btn btn-white btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal' . $data['id'] . '">
                            <i class="bi-pencil-fill me-1"></i> Edit
                        </button>
                        <a class="btn btn-danger btn-sm" href="index.php?id=' . $data["id"] . '&d=1" onclick="return confirm(\'Are you sure you want to delete this product?\');">Delete</a>
                    </td>
                </tr>';
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
                        <div class="tom-select-custom">
                            <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto" autocomplete="off" data-hs-tom-select-options='{"searchInDropdown": false,"hideSearch": true}'>
                                <option value="10">10</option>
                                <option value="15" selected>15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <span class="text-secondary me-2">of</span>
                        <span id="datatableWithPaginationInfoTotalQty"></span>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex justify-content-center justify-content-sm-end">
                        <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer -->
    </div>
    <!-- End Card -->

    <?php
    include("../footer.php");
    ?>
