<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    session_start();
    if(!isset($_SESSION['login_id'])){
      header('location:login.php');
    }
    include('./db_conn.php');
  ?>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Welcome to University of Greenwich Quality Assurance</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="./favicon.ico">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/font/bootstrap-icons.css">

  <link rel="stylesheet" href="./assets/vendor/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="./assets/vendor/tom-select/dist/css/tom-select.bootstrap5.css">
  <link rel="stylesheet" href="./assets/vendor/quill/dist/quill.snow.css">

  <!-- CSS Front Template -->

  <link rel="preload" href="./assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="./assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  <!-- Select2 Template -->
  <link href="./assets/css/select2.min.css" rel="stylesheet">

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

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

  <script src="./assets/js/hs.theme-appearance.js"></script>

  <script src="./assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js"></script>

  <!-- ========== HEADER ========== -->

  <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
      <!-- Logo -->
      <a class="navbar-brand" href="./index.html" aria-label="Front">
        <img class="navbar-brand-logo" src="./assets/svg/logos/logo.svg" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo" src="./assets/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
        <img class="navbar-brand-logo-mini" src="./assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
        <img class="navbar-brand-logo-mini" src="./assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
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
          <li class="nav-item">
            <!-- Account -->
            <div class="dropdown">
              <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                <div class="avatar avatar-sm avatar-circle">
                  <img class="avatar-img" src="./assets/img/160x160/img1.jpg" alt="Image Description">
                  <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                </div>
              </a>

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                <div class="dropdown-item-text">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-sm avatar-circle">
                      <img class="avatar-img" src="./assets/img/160x160/img1.jpg" alt="Image Description">
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-0"><?= $_SESSION['login_username'] ?></h5>
                      <p class="card-text text-body"><?= $_SESSION['login_email'] ?></p>
                    </div>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Profile &amp; account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="ajax.php?action=logout">Sign out</a>
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
  
  <!-- Navbar Vertical -->

  <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->

        <a class="navbar-brand" href="./index.html" aria-label="Front">
          <img class="navbar-brand-logo" src="./assets/img/logos/main-logo.jpg" style="max-width: 50px !important;min-width: 50px !important;" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="./assets/img/logos/main-logo.jpg" style="max-width: 50px !important;min-width: 50px !important;" alt="Logo" data-hs-theme-appearance="dark">
          <img class="navbar-brand-logo-mini" src="./assets/img/logos/main-logo.jpg" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo-mini" src="./assets/img/logos/main-logo.jpg" alt="Logo" data-hs-theme-appearance="dark">
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

            <span class="dropdown-header">Pages</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <?php
              $links = array(
                array('/cw_ewsd5/index.php', 'Dashboards', 'bi-house-door'),
                array('/cw_ewsd5/users.php', 'Users', 'bi-person'),
                array('/cw_ewsd5/categories.php', 'Category & Tags', 'bi-folder2-open'),
                array('/cw_ewsd5/topics.php', 'Discussion', 'bi-receipt')
              );
              foreach ($links as $link) {
            ?>
                <div class="nav-item">
                  <a class="nav-link mt-2 <?php echo ($link[0] == $_SERVER['REQUEST_URI']) ? 'active' : ''; ?>" href="<?php echo $link[0]; ?>" data-placement="left">
                    <i class="<?php echo $link[2]; ?> nav-icon"></i>
                    <span class="nav-link-title"><?php echo $link[1]; ?></span>
                  </a>
                </div>
            <?php
              }
            ?>

            <!-- <div class="nav-item">
              <a class="nav-link mt-2 active" href="./index.php" data-placement="left">
                <i class="bi-house-door nav-icon"></i>
                <span class="nav-link-title">Dashboards</span>
              </a>
            </div>

            <div class="nav-item">
              <a class="nav-link mt-2 " href="./users.php" data-placement="left">
                <i class="bi-person nav-icon"></i>
                <span class="nav-link-title">Users</span>
              </a>
            </div>

            <div class="nav-item">
              <a class="nav-link mt-2 " href="./categories.php" data-placement="left">
                <i class="bi-folder2-open nav-icon"></i>
                <span class="nav-link-title">Category & Tags</span>
              </a>
            </div>

            <div class="nav-item">
              <a class="nav-link mt-2 " href="./topics.php" data-placement="left">
                <i class="bi-receipt nav-icon"></i>
                <span class="nav-link-title">Discussion</span>
              </a>
            </div> -->

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

  <!-- End Navbar Vertical -->