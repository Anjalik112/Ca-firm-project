<?php
include("../config.php");
if(!isset($_SESSION["lg_id"]))
{
  header("location:../index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Yantra LLP</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/img/yantra/favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

  <!-- CSS Front Template -->

  <link rel="preload" href="../assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="../assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  <style data-hs-appearance-onload-styles>
    *
    {
      transition: unset !important;
    }

    body
    {
      opacity: 0;
    }
  </style>

  <script>
            window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.css","assets/css/docs.css","assets/vendor/icon-set/style.css","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
            window.hs_config.gulpRGBA = (p1) => {
  const options = p1.split(',')
  const hex = options[0].toString()
  const transparent = options[1].toString()

  var c;
  if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
    c= hex.substring(1).split('');
    if(c.length== 3){
      c= [c[0], c[0], c[1], c[1], c[2], c[2]];
    }
    c= '0x'+c.join('');
    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
  }
  throw new Error('Bad Hex');
}
            window.hs_config.gulpDarken = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = -parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            window.hs_config.gulpLighten = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            </script>
</head>

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl   footer-offset">

  <script src="../assets/js/hs.theme-appearance.js"></script>

  <script src="../assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

  <!-- ========== HEADER ========== -->

  <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
      <!-- Logo -->
      <a class="navbar-brand" href="#" aria-label="Yantra">
        <img class="navbar-brand-logo" src="..\assets\img\yantra\RuchaYantraLLPLogo.png" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo" src="..\assets\img\yantra\RuchaYantraLLPLogo.png" alt="Logo" data-hs-theme-appearance="dark">
        <img class="navbar-brand-logo-mini" src="..\assets\img\yantra\yantralogo.png" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo-mini"  src="..\assets\img\yantra\yantralogo.png"  alt="Logo" data-hs-theme-appearance="dark">
      </a>
      <!-- End Logo -->

      <div class="navbar-nav-wrap-content-start">
        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->
      </div>

      <div class="navbar-nav-wrap-content-end">
        <!-- Navbar -->
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <!-- Notification -->
            <div class="dropdown">
              <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <i class="bi-bell"></i>
                <span class="btn-status btn-sm-status btn-status-danger"></span>
              </button>

              <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                <div class="card">
                  <!-- Header -->
                  <div class="card-header card-header-content-between">
                    <h4 class="card-title mb-0">Notifications</h4>
                  </div>
                  <!-- End Header -->

                  <!-- Nav -->
                  <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#notificationNavOne" id="notificationNavOne-tab" data-bs-toggle="tab" data-bs-target="#notificationNavOne" role="tab" aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                    </li>
                  </ul>
                  <!-- End Nav -->
                  <!-- Body -->
                  <div class="card-body-height">
                    <!-- Tab Content -->
                    <div class="tab-content" id="notificationTabContent">
                      <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                        <!-- List Group -->
                        <ul class="list-group list-group-flush navbar-card-list-group">
                          <!-- Item -->
                          <li class="list-group-item form-check-select">
                            
                              <!-- End Col -->
                              <?php
                              $bcount=mysqli_query($con,"SELECT COUNT(id) FROM buy_master where status=1");
                              $ccount=mysqli_query($con,"SELECT COUNT(id) FROM contact_master where status=1");
                               $bcount=mysqli_fetch_row($bcount);
                               $ccount=mysqli_fetch_row($ccount);
                               $bcount[0]=3;
                               $ccount[0]=3;
                               if($bcount[0]>0)
                               {
                                  echo '
                                  <div class="row">
                                  <div class="col ms-n2">
                                  <a href="../contact/">
                                <h5 class="mb-1">Buy Request</h5>
                                <p class="text-body fs-5">'.$bcount[0].' new request <span class="badge bg-danger">New</span></p>
                                </a>
                                </div>

                              </div>

                                  ';
                               }
                               if($ccount[0]>0)
                               {
                                    echo '
                                    <div class="row">

                              <div class="col ms-n2">
                              <a href="../contact/contactreq.php">
                              <h5 class="mb-1">Contact Request</h5>
                              <p class="text-body fs-5">'.$ccount[0].' new request <span class="badge bg-danger">New</span></p>
                              </a>
                            </div>
                            </div>
                                    ';
                               }
                                                          
                              ?>
                              
                              <!-- End Col -->

                              <!-- End Col -->
                            
                            <!-- End Row -->
                          </li>
                          <!-- End Item -->

                        </ul>
                        <!-- End List Group -->
                      </div>

                     
                    </div>
                    <!-- End Tab Content -->
                  </div>
                  <!-- End Body -->
                </div>
              </div>
            </div>
            <!-- End Notification -->
          </li>

         

          <li class="nav-item">
            <!-- Account -->
            <div class="dropdown">
              <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <div class="avatar avatar-sm avatar-circle">
                  <img class="avatar-img" src="../assets/img/yantra/profileimg.jpg" alt="Image Description">
                  <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
              </a>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
              

              

                <a class="dropdown-item" href="../signout.php">Sign out</a>
              </div>
            </div>
            <!-- End Account -->
          </li>
        </ul>
        <!-- End Navbar -->
      </div>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <!-- Navbar Vertical -->

  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->

        <a class="navbar-brand" href="#" aria-label="Front">
          <img class="navbar-brand-logo" src="..\assets\img\yantra\RuchaYantraLLPLogo.png" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="..\assets\img\yantra\RuchaYantraLLPLogo.png" alt="Logo" data-hs-theme-appearance="dark">
          <img class="navbar-brand-logo-mini" src="..\assets\img\yantra\yantralogo.png" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo-mini" src="..\assets\img\yantra\yantralogo.png" alt="Logo" data-hs-theme-appearance="dark">
        </a>

        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->

        <!-- Content -->
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
            <!-- Collapse -->
            
            <div class="nav-item">
              <a class="nav-link " href="../dashboard/index.php" data-placement="left">
                <i class="bi-house-door nav-icon"></i>
                <span class="nav-link-title">Dashboard</span>
              </a>
            </div>
            
            <span class="dropdown-header mt-4">Yantra </span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-basket nav-icon"></i>
                  <span class="nav-link-title">Product</span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link " href="../product/index.php">Overview</a>
                  
                </div>
                

                
              </div>
              <!-- End Collapse -->


              <span class="dropdown-header mt-4">CRM</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu2">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu2" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu2" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu2">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">Customer</span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenu2" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link " href="../contact/index.php">Buy request</a>
                  <a class="nav-link " href="../contact/contactreq.php">Contact request</a>
                </div>
              </div>
              <!-- End Collapse -->


              
              <span class="dropdown-header mt-4">Career</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu1">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu1" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu1" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu1">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">Roles</span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenu1" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu1">
                  <a class="nav-link " href="../career/index.php">Overview</a>
                 
                </div>
              </div>
              <!-- End Collapse -->


              <span class="dropdown-header mt-4">Blog</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu4">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu4" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu4" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu1">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">Blogs</span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenu4" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu4">
                  <a class="nav-link " href="../blog/index.php">Overview</a>
                 
                </div>
              </div>
              <!-- End Collapse -->













          </div>

        </div>
        <!-- End Content -->

        <!-- Footer -->
        <div class="navbar-vertical-footer">
          <ul class="navbar-vertical-footer-list">
            <li class="navbar-vertical-footer-list-item">
              <!-- Style Switcher -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                </button>

                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                  <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                    <i class="bi-moon-stars me-2"></i>
                    <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                  </a>
                  <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                    <i class="bi-brightness-high me-2"></i>
                    <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                  </a>
                  <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                    <i class="bi-moon me-2"></i>
                    <span class="text-truncate" title="Dark">Dark</span>
                  </a>
                </div>
              </div>

              <!-- End Style Switcher -->
            </li>

          </ul>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>

  
  <main id="content" role="main" class="main">