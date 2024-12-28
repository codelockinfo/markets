<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 my-3 fixed-start ms-3 border-end-xxl" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="<?php echo CLS_SITE_URL; ?>" target="_blank">
        <!-- <span class="ms-1 font-weight-bold">Market Search</span> -->
        <img src="<?php echo SITE_ADMIN_URL ?>/assets/img/admin_logo.png" />
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto navigation" id="sidenav-collapse-main">
      <ul class="navbar-nav overflow-x-hidden">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>analytics"  target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>
        <?php if ($_SESSION['current_user']['role'] == 0) { ?>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="516" height="516" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><circle cx="20.5" cy="6.5" r="1.5" fill="#3a4270" opacity="1" data-original="#000000" class=""></circle><path d="M16.5 8h-13a1.5 1.5 0 0 1 0-3h13a1.5 1.5 0 0 1 0 3zM16.5 14h-13a1.5 1.5 0 0 1 0-3h13a1.5 1.5 0 0 1 0 3zM10.5 20h-7a1.5 1.5 0 0 1 0-3h7a1.5 1.5 0 0 1 0 3z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
                </div>
              </a>
            </li>
            <div class="sidenav1 dropdown">
              <button class="dropdown-btn text-dark nav-link-text dropdown-toggle">
                Customize 
              </button>
              <div class="dropdown-container">
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>banner-form"  target="_blank">Banner</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>famousmarket-form"target="_blank">Famous markets</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>textilecategories-form" target="_blank">Browse by textile</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>offer-form" target="_blank">Offers</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>paragraph-form"target="_blank">Paragraph</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>all-video" target="_blank">video</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>faqs-form" target="_blank">FAQ</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>topbar"  target="_blank">Topbar</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>custmize-product" target="_blank">Products</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>user"target="_blank">Users</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>contactus"  target="_blank">Contact Us</a>
              </div>
            </div>  
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>profile"  target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512.002" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M210.352 246.633c33.882 0 63.222-12.153 87.195-36.13 23.973-23.972 36.125-53.304 36.125-87.19 0-33.876-12.152-63.211-36.129-87.192C273.566 12.152 244.23 0 210.352 0c-33.887 0-63.22 12.152-87.192 36.125s-36.129 53.309-36.129 87.188c0 33.886 12.156 63.222 36.133 87.195 23.977 23.969 53.313 36.125 87.188 36.125zM426.129 393.703c-.692-9.976-2.09-20.86-4.149-32.351-2.078-11.579-4.753-22.524-7.957-32.528-3.308-10.34-7.808-20.55-13.37-30.336-5.774-10.156-12.555-19-20.165-26.277-7.957-7.613-17.699-13.734-28.965-18.2-11.226-4.44-23.668-6.69-36.976-6.69-5.227 0-10.281 2.144-20.043 8.5a2711.03 2711.03 0 0 1-20.879 13.46c-6.707 4.274-15.793 8.278-27.016 11.903-10.949 3.543-22.066 5.34-33.039 5.34-10.972 0-22.086-1.797-33.047-5.34-11.21-3.622-20.296-7.625-26.996-11.899-7.77-4.965-14.8-9.496-20.898-13.469-9.75-6.355-14.809-8.5-20.035-8.5-13.313 0-25.75 2.254-36.973 6.7-11.258 4.457-21.004 10.578-28.969 18.199-7.605 7.281-14.39 16.12-20.156 26.273-5.558 9.785-10.058 19.992-13.371 30.34-3.2 10.004-5.875 20.945-7.953 32.524-2.059 11.476-3.457 22.363-4.149 32.363A438.821 438.821 0 0 0 0 423.949c0 26.727 8.496 48.363 25.25 64.32 16.547 15.747 38.441 23.735 65.066 23.735h246.532c26.625 0 48.511-7.984 65.062-23.734 16.758-15.946 25.254-37.586 25.254-64.325-.004-10.316-.351-20.492-1.035-30.242zm0 0" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>product-list" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1.2700000000000007,0,0,1.2700000000000007,-3.2400000000000038,-3.2275086736679164)"><path d="M10.48 11.15a4.285 4.285 0 0 0 .77.24v9.52a2.64 2.64 0 0 1-.47-.17l-6-2.67A3 3 0 0 1 3 15.33V8.67a2.955 2.955 0 0 1 .11-.79zm4.34-2.23L6.67 5.09l-1.89.84a2.909 2.909 0 0 0-.91.63l7.21 3.21a2.268 2.268 0 0 0 1.84 0zm5.31-2.36a2.909 2.909 0 0 0-.91-.63l-6-2.67a2.966 2.966 0 0 0-2.44 0L8.49 4.28l8.15 3.83zm.76 1.32-3.51 1.56v2.45a.75.75 0 1 1-1.5 0V10.1l-2.36 1.05a5.275 5.275 0 0 1-.77.24v9.52a2.64 2.64 0 0 0 .47-.17l6-2.67A3 3 0 0 0 21 15.33V8.67a2.955 2.955 0 0 0-.11-.79z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>customer-list" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1.25,0,0,1.25,-4,-4.196249961853027)"><path d="M11.429 16a5.715 5.715 0 1 0-5.715-5.714A5.72 5.72 0 0 0 11.429 16zM18.905 20.721A10.434 10.434 0 0 0 1 28a1 1 0 0 0 1 1h18.86a1 1 0 0 0 1-1 10.067 10.067 0 0 0-.485-3.124 10.36 10.36 0 0 0-2.47-4.155z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path><circle cx="23.5" cy="12.25" r="4.25" fill="#3a4270" opacity="1" data-original="#000000" class=""></circle><path d="M23.5 17.67a7.482 7.482 0 0 0-3.806 1.057c.217.194.436.385.641.595a12.388 12.388 0 0 1 2.952 4.966 11.488 11.488 0 0 1 .437 1.882H30a1 1 0 0 0 1-1 7.508 7.508 0 0 0-7.5-7.5z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Customers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>gallery" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1.04,0,0,1.04,-0.48004330737516376,-0.5199999618530278)"><path d="M6.25 19.5a3.744 3.744 0 0 1-3.542-2.551l-.035-.115A3.648 3.648 0 0 1 2.5 15.75V8.932L.074 17.03a2.271 2.271 0 0 0 1.592 2.755l15.463 4.141c.193.05.386.074.576.074.996 0 1.906-.661 2.161-1.635l.901-2.865zM9 9c1.103 0 2-.897 2-2s-.897-2-2-2-2 .897-2 2 .897 2 2 2z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path><path d="M21.5 2h-15A2.503 2.503 0 0 0 4 4.5v11C4 16.878 5.122 18 6.5 18h15c1.378 0 2.5-1.122 2.5-2.5v-11C24 3.122 22.878 2 21.5 2zm-15 2h15a.5.5 0 0 1 .5.5v7.099l-3.159-3.686a1.791 1.791 0 0 0-1.341-.615 1.749 1.749 0 0 0-1.336.631l-3.714 4.458-1.21-1.207a1.755 1.755 0 0 0-2.48 0L6 13.939V4.5a.5.5 0 0 1 .5-.5z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Gallery</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>video-list" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#3a4270" fill-rule="evenodd" d="M4 1a3 3 0 0 0-3 3v11a3 3 0 0 0 3 3h1v3.586a1.414 1.414 0 0 0 2.414 1L12 18h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3zm5.5 5.5A1.5 1.5 0 0 0 8 8v3a1.5 1.5 0 0 0 1.5 1.5h4.183c.727 0 1.317-.59 1.317-1.317l1.243.746A.5.5 0 0 0 17 11.5v-4a.5.5 0 0 0-.757-.429L15 7.817c0-.727-.59-1.317-1.317-1.317z" clip-rule="evenodd" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Videos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>blog-list" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>settings</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(304.000000, 151.000000)">
                        <polygon class="color-background opacity-6" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                        <path class="color-background opacity-6" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"></path>
                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Blogs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>analytics" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Analytics</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>invoice-list" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Invoice</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>logout">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>plans" target="_blank">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>document</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(154.000000, 300.000000)">
                        <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                        <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Plans</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
        <div class="full-background" style="background-image: url('../admin/assets/img/curved-images/white-curved.jpg')"></div>
        <div class="card-body text-start p-3 w-100">
          <div class="docs-info">
            <h6 class="text-white up mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold">Please check our docs</p>
            <a href="<?php echo SITE_ADMIN_URL ?>document" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
          </div>
        </div>
      </div>
      <a class="btn bg-gradient-info mt-3 w-100" href="#">Upgrade to pro</a>
    </div>
  </aside>
  