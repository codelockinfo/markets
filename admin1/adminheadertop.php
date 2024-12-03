
    <div class="container-fluid">
      <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-0 w-100 z-index-2 mt-2">
          <div class="container-fluid">
            <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-0" id="navbar">
              <div class="ms-md-auto pe-md-0 d-flex align-items-center">
                <div class="input-group back-btn d-xl-none d-block">
                  <a href="javascript:history.back()">
                        <i class="fas fa-arrow-left text-sm ms-1 text-white" aria-hidden="true"></i>
                  </a>
                </div>
                <div class="input-group d-xl-none d-block ms-2 me-2">
                  <a href="<?php echo SITE_ADMIN_URL ?>index.php">
                        <i class="fa fa-home text-sm ms-1 text-white" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <ul class="navbar-nav justify-content-end">
                <li class="nav-item d-flex align-items-center">
                  <a href="<?php echo SITE_ADMIN_URL ?>profile.php" class="nav-link text-white font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Profile</span>
                  </a>
                </li>
                <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                  <a href="#" class="nav-link text-white p-0">
                    <a href="#" class="nav-link text-body p-0" id="iconNavbarSidenav">
                      <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                      </div>
                    </a>
                  </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                    <li class="mb-2">
                      <a class="dropdown-item border-radius-md" href="#">
                        <div class="d-flex py-1">
                          <div class="my-auto">
                            <img src="<?php echo main_url('admin1/assets/img/team-2.jpg'); ?>" alt="team-2" class="avatar avatar-sm me-3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                              <span class="font-weight-bold">New Message</span> From Laur
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                              <i class="fa fa-clock me-1"></i>
                              13 Minutes Ago
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li class="mb-2">
                      <a class="dropdown-item border-radius-md" href="#">
                        <div class="d-flex py-1">
                          <div class="my-auto">
                            <img src="<?php echo main_url('admin1/assets/img/small-logos/logo-spotify.svg'); ?>" alt="logo-spotify" class="avatar avatar-sm bg-gradient-dark me-3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="text-sm font-weight-normal mb-1">
                              <span class="font-weight-bold">New Album</span> By Travis Scott
                            </h6>
                            <p class="text-xs text-secondary mb-0">
                              <i class="fa fa-clock me-1"></i>
                              1 Day
                            </p>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item border-radius-md" href="#">
                        <div class="d-flex py-1">
                          <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <title>Credit-Card</title>
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                  <g transform="translate(1716.000000, 291.000000)">
                                    <g transform="translate(453.000000, 454.000000)">
                                      <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                      <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </svg>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                                Payment Successfully Completed
                                12px
                              </h6>
                              <p class="text-xs text-secondary mb-0">
                                <i class="fa fa-clock me-1"></i>
                                2 Days
                              </p>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="page-header min-height-150  border-radius-xl mt-4">
        <span class="mask bg-gradient-info opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6">
        <div class="row gx-4">
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo isset($title) ? $title : "Undefind" ?>
              </h5>
            </div>
          </div>
            <div class="col-auto col-lg-0 col-md-0 my-sm-auto ms-sm-auto me-sm-0 mx-auto">
              <div class="nav-wrapper position-relative end-0">
                <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active " href="<?php echo SITE_ADMIN_URL.isset($link) ? $link : "Undefind" ?>" role="tab" aria-selected="true">
                      
                      <?php if(isset($link) && $link != ''){ ?> 
                        <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(603.000000, 0.000000)">
                                  <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                  </path>
                                  <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                                  <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      <?php } ?>
                      <span class="ms-1"><?php echo isset($button_text) ? $button_text : "Undefind";?> </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
        </div>
      </div>
     
      <div class="user_msgactive"></div>
    </div>
  <script>
    $(document).ready(function () {
      userData("user_massge");
    });
  </script>