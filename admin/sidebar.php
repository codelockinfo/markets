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
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>analytics">
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
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>banner-form" >Banner</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>famousmarket-form">Famous markets</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>textilecategories-form">Browse by textile</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>offer-form">Offers</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>paragraph-form">Paragraph</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>all-video">video</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>faqs-form">FAQ</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>topbar">Topbar</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>custmize-product">Products</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>user">Users</a>
                <a class="custom1 nav-link" href="<?php echo SITE_ADMIN_URL ?>contactus">Contact Us</a>
              </div>
            </div>  
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>profile">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 512 512.002" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M210.352 246.633c33.882 0 63.222-12.153 87.195-36.13 23.973-23.972 36.125-53.304 36.125-87.19 0-33.876-12.152-63.211-36.129-87.192C273.566 12.152 244.23 0 210.352 0c-33.887 0-63.22 12.152-87.192 36.125s-36.129 53.309-36.129 87.188c0 33.886 12.156 63.222 36.133 87.195 23.977 23.969 53.313 36.125 87.188 36.125zM426.129 393.703c-.692-9.976-2.09-20.86-4.149-32.351-2.078-11.579-4.753-22.524-7.957-32.528-3.308-10.34-7.808-20.55-13.37-30.336-5.774-10.156-12.555-19-20.165-26.277-7.957-7.613-17.699-13.734-28.965-18.2-11.226-4.44-23.668-6.69-36.976-6.69-5.227 0-10.281 2.144-20.043 8.5a2711.03 2711.03 0 0 1-20.879 13.46c-6.707 4.274-15.793 8.278-27.016 11.903-10.949 3.543-22.066 5.34-33.039 5.34-10.972 0-22.086-1.797-33.047-5.34-11.21-3.622-20.296-7.625-26.996-11.899-7.77-4.965-14.8-9.496-20.898-13.469-9.75-6.355-14.809-8.5-20.035-8.5-13.313 0-25.75 2.254-36.973 6.7-11.258 4.457-21.004 10.578-28.969 18.199-7.605 7.281-14.39 16.12-20.156 26.273-5.558 9.785-10.058 19.992-13.371 30.34-3.2 10.004-5.875 20.945-7.953 32.524-2.059 11.476-3.457 22.363-4.149 32.363A438.821 438.821 0 0 0 0 423.949c0 26.727 8.496 48.363 25.25 64.32 16.547 15.747 38.441 23.735 65.066 23.735h246.532c26.625 0 48.511-7.984 65.062-23.734 16.758-15.946 25.254-37.586 25.254-64.325-.004-10.316-.351-20.492-1.035-30.242zm0 0" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>product-list">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1.2700000000000007,0,0,1.2700000000000007,-3.2400000000000038,-3.2275086736679164)"><path d="M10.48 11.15a4.285 4.285 0 0 0 .77.24v9.52a2.64 2.64 0 0 1-.47-.17l-6-2.67A3 3 0 0 1 3 15.33V8.67a2.955 2.955 0 0 1 .11-.79zm4.34-2.23L6.67 5.09l-1.89.84a2.909 2.909 0 0 0-.91.63l7.21 3.21a2.268 2.268 0 0 0 1.84 0zm5.31-2.36a2.909 2.909 0 0 0-.91-.63l-6-2.67a2.966 2.966 0 0 0-2.44 0L8.49 4.28l8.15 3.83zm.76 1.32-3.51 1.56v2.45a.75.75 0 1 1-1.5 0V10.1l-2.36 1.05a5.275 5.275 0 0 1-.77.24v9.52a2.64 2.64 0 0 0 .47-.17l6-2.67A3 3 0 0 0 21 15.33V8.67a2.955 2.955 0 0 0-.11-.79z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>customer-list">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1.25,0,0,1.25,-4,-4.196249961853027)"><path d="M11.429 16a5.715 5.715 0 1 0-5.715-5.714A5.72 5.72 0 0 0 11.429 16zM18.905 20.721A10.434 10.434 0 0 0 1 28a1 1 0 0 0 1 1h18.86a1 1 0 0 0 1-1 10.067 10.067 0 0 0-.485-3.124 10.36 10.36 0 0 0-2.47-4.155z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path><circle cx="23.5" cy="12.25" r="4.25" fill="#3a4270" opacity="1" data-original="#000000" class=""></circle><path d="M23.5 17.67a7.482 7.482 0 0 0-3.806 1.057c.217.194.436.385.641.595a12.388 12.388 0 0 1 2.952 4.966 11.488 11.488 0 0 1 .437 1.882H30a1 1 0 0 0 1-1 7.508 7.508 0 0 0-7.5-7.5z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Customers</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>gallery">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
             <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g transform="matrix(1.04,0,0,1.04,-0.48004330737516376,-0.5199999618530278)"><path d="M6.25 19.5a3.744 3.744 0 0 1-3.542-2.551l-.035-.115A3.648 3.648 0 0 1 2.5 15.75V8.932L.074 17.03a2.271 2.271 0 0 0 1.592 2.755l15.463 4.141c.193.05.386.074.576.074.996 0 1.906-.661 2.161-1.635l.901-2.865zM9 9c1.103 0 2-.897 2-2s-.897-2-2-2-2 .897-2 2 .897 2 2 2z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path><path d="M21.5 2h-15A2.503 2.503 0 0 0 4 4.5v11C4 16.878 5.122 18 6.5 18h15c1.378 0 2.5-1.122 2.5-2.5v-11C24 3.122 22.878 2 21.5 2zm-15 2h15a.5.5 0 0 1 .5.5v7.099l-3.159-3.686a1.791 1.791 0 0 0-1.341-.615 1.749 1.749 0 0 0-1.336.631l-3.714 4.458-1.21-1.207a1.755 1.755 0 0 0-2.48 0L6 13.939V4.5a.5.5 0 0 1 .5-.5z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Gallery</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>video-list">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="24" x="0" y="0" viewBox="0 0 467.968 467.968" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M264.704 96.512H51.2c-28.16 0-51.2 23.04-51.2 51.2v172.544c0 28.16 23.04 51.2 51.2 51.2h213.504c28.16 0 51.2-23.04 51.2-51.2V147.712c0-28.672-23.04-51.2-51.2-51.2zM430.08 124.672c-3.072.512-6.144 2.048-8.704 3.584l-79.872 46.08V293.12l80.384 46.08c14.848 8.704 33.28 3.584 41.984-11.264 2.56-4.608 4.096-9.728 4.096-15.36V154.368c0-18.944-17.92-34.304-37.888-29.696z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Videos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>blog-list">
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
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>analytics">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0" viewBox="0 0 384 384" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M10.668 234.668h42.664c5.89 0 10.668 4.773 10.668 10.664V352c0 5.89-4.777 10.668-10.668 10.668H10.668C4.778 362.668 0 357.891 0 352V245.332c0-5.89 4.777-10.664 10.668-10.664zM117.332 149.332H160c5.89 0 10.668 4.777 10.668 10.668v192c0 5.89-4.777 10.668-10.668 10.668h-42.668c-5.89 0-10.664-4.777-10.664-10.668V160c0-5.89 4.773-10.668 10.664-10.668zM224 192h42.668c5.89 0 10.664 4.777 10.664 10.668V352c0 5.89-4.773 10.668-10.664 10.668H224c-5.89 0-10.668-4.777-10.668-10.668V202.668c0-5.89 4.777-10.668 10.668-10.668zM330.668 128h42.664c5.89 0 10.668 4.777 10.668 10.668V352c0 5.89-4.777 10.668-10.668 10.668h-42.664c-5.89 0-10.668-4.777-10.668-10.668V138.668c0-5.89 4.777-10.668 10.668-10.668zm0 0" fill="#3a4270" opacity="1" data-original="#000000" class=""></path><path d="M352 0c-17.664.02-31.98 14.336-32 32 .043 3.484.66 6.938 1.828 10.219L268.43 73.96a31.728 31.728 0 0 0-51.082 6.84L170.25 57.473c.23-1.371.367-2.754.418-4.141a32 32 0 0 0-54.621-22.695 31.99 31.99 0 0 0-6.938 34.894l-61.093 45.594A31.63 31.63 0 0 0 32 106.668c-17.672 0-32 14.324-32 32 0 17.672 14.328 32 32 32s32-14.328 32-32a31.755 31.755 0 0 0-2.145-11.25l61.704-46.05c12.07 6.73 27.125 4.757 37.05-4.86l53.559 26.527c3.57 15.903 18.535 26.574 34.734 24.77 16.2-1.805 28.45-15.504 28.43-31.805 0-.813-.18-1.578-.238-2.375l58.078-34.527A31.681 31.681 0 0 0 352 64c17.672 0 32-14.328 32-32S369.672 0 352 0zm0 0" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Analytics</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>invoice-list">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M19 1H5a1 1 0 0 0-.65.25A4 4 0 0 1 7 4.6 1.75 1.75 0 0 1 7 5v17a1 1 0 0 0 .58.91 1 1 0 0 0 1.07-.15l2.85-2.44 2.85 2.44a1 1 0 0 0 1.3 0l2.85-2.44 2.85 2.44A1 1 0 0 0 22 23a1.06 1.06 0 0 0 .42-.09A1 1 0 0 0 23 22V5a4 4 0 0 0-4-4zm-1 14h-6a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm0-4h-6a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm0-4h-6a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM5 5v8H2a1 1 0 0 1-1-1V4.6A2 2 0 0 1 5 5z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
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
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path d="M16 1a15 15 0 1 0 15 15A15.018 15.018 0 0 0 16 1zm-1 7a1 1 0 0 1 2 0v7a1 1 0 0 1-2 0zm1 17a9.014 9.014 0 0 1-9-9 8.92 8.92 0 0 1 3.38-7.02 1 1 0 1 1 1.24 1.56 7 7 0 1 0 8.76 0 1 1 0 0 1 1.24-1.56A8.92 8.92 0 0 1 25 16a9.014 9.014 0 0 1-9 9z" fill="#3a4270" opacity="1" data-original="#000000" class="hovered-path"></path></g></svg>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo SITE_ADMIN_URL ?>plans">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M172.55 391.902c-.13-.64-.32-1.27-.57-1.88-.25-.6-.56-1.18-.92-1.72a9.57 9.57 0 0 0-1.24-1.52 9.57 9.57 0 0 0-1.52-1.24 9.87 9.87 0 0 0-1.73-.92c-.6-.25-1.23-.45-1.87-.57a9.847 9.847 0 0 0-3.9 0c-.64.12-1.27.32-1.88.57-.6.25-1.18.56-1.72.92-.55.36-1.06.78-1.52 1.24-.46.46-.88.97-1.24 1.52-.37.54-.67 1.12-.92 1.72a9.69 9.69 0 0 0-.57 1.88c-.13.64-.2 1.3-.2 1.95 0 .65.07 1.31.2 1.95.12.64.32 1.27.57 1.87.25.61.55 1.19.92 1.73.36.55.78 1.06 1.24 1.52.46.46.97.88 1.52 1.24.54.361 1.12.671 1.72.921.61.25 1.24.45 1.88.57.64.13 1.3.2 1.95.2.65 0 1.31-.07 1.95-.2.64-.12 1.27-.32 1.87-.57.61-.25 1.19-.561 1.73-.921a9.57 9.57 0 0 0 1.52-1.24c.46-.46.88-.97 1.24-1.52.36-.54.67-1.12.92-1.73a10.098 10.098 0 0 0 .77-3.82c0-.65-.07-1.31-.2-1.95z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path><path d="M459.993 394.982a9.705 9.705 0 0 0-.121-.297c-9.204-21.537-30.79-29.497-56.336-20.772l-69.668 19.266c-4.028-12.198-14.075-22.578-28.281-27.85a11.876 11.876 0 0 0-.265-.094l-76.581-25.992c-6.374-8.239-26.34-29.321-63.723-29.321-26.125 0-49.236 17.922-62.458 37.457H10c-5.523 0-10 4.477-10 10v126.077c0 5.523 4.477 10 10 10h59.457c5.523 0 10-4.477 10-10v-8.634h27.883c5.523 0 10-4.477 10-10v-2.878c16.254 1.418 21.6 4.501 36.528 13.109 11.48 6.62 28.831 16.625 60.077 30.674.145.065.292.127.439.185 5.997 2.359 17.72 6.065 32.173 6.065 10.06 0 21.445-1.797 33.131-7.094l153.991-55.136c.274-.098.544-.208.808-.33 14.717-6.771 36.648-25.854 25.506-54.435zM59.457 473.455H20V367.378h39.457v106.077zm37.883-18.634H79.457v-87.443H97.34v87.443zm329.156-23.747-153.922 55.111a12.33 12.33 0 0 0-.854.348c-21.437 9.852-41.814 3.954-49.8.849-30.182-13.581-46.291-22.87-58.061-29.657-16.364-9.436-24.249-13.984-46.519-15.823V361.36c9.479-15.536 27.861-31.439 47.679-31.439 33.986 0 48.387 22.105 48.953 22.997a10 10 0 0 0 5.305 4.232l79.475 26.974c12.693 4.764 19.401 15.634 16.318 26.474a19.354 19.354 0 0 1-9.257 11.691 19.367 19.367 0 0 1-14.683 1.758l-89.593-28.392c-5.268-1.669-10.886 1.247-12.554 6.512-1.669 5.265 1.247 10.885 6.512 12.554l89.749 28.441c.095.03.19.059.286.086a39.657 39.657 0 0 0 10.857 1.523c6.638 0 13.203-1.691 19.161-5.011 9.213-5.133 15.875-13.547 18.759-23.692.23-.81.434-1.62.611-2.43l75.083-20.8c10.844-3.704 25.079-5.039 31.417 9.558 6.56 17.137-10.49 26.564-14.922 28.678zM359.06 131.543c-.13-.64-.32-1.27-.58-1.88-.25-.6-.55-1.18-.92-1.72a9.57 9.57 0 0 0-1.24-1.52 9.57 9.57 0 0 0-1.52-1.24c-.54-.36-1.12-.67-1.72-.92a9.81 9.81 0 0 0-1.87-.57 9.898 9.898 0 0 0-3.91 0c-.64.12-1.27.32-1.87.57-.61.25-1.19.56-1.73.92-.55.36-1.06.78-1.52 1.24-.46.46-.88.97-1.24 1.52-.36.54-.67 1.12-.92 1.72a9.69 9.69 0 0 0-.57 1.88c-.13.64-.2 1.3-.2 1.95 0 .65.07 1.31.2 1.95.12.64.32 1.27.57 1.87.25.61.56 1.19.92 1.73.36.55.78 1.06 1.24 1.52.46.46.97.88 1.52 1.24.54.36 1.12.67 1.73.92.6.25 1.23.44 1.87.57s1.3.2 1.95.2c.65 0 1.31-.07 1.96-.2.63-.13 1.26-.32 1.87-.57.6-.25 1.18-.56 1.72-.92a9.57 9.57 0 0 0 1.52-1.24c.46-.46.88-.97 1.24-1.52.37-.54.67-1.12.92-1.73.26-.6.45-1.23.58-1.87.13-.64.19-1.3.19-1.95 0-.65-.06-1.31-.19-1.95z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path><path d="M502 33.891h-59.457c-5.523 0-10 4.477-10 10v8.634H404.66c-5.523 0-10 4.477-10 10v2.878c-16.254-1.419-21.6-4.501-36.527-13.109-11.48-6.62-28.831-16.625-60.078-30.674a8.51 8.51 0 0 0-.44-.185c-10.171-4.002-36.828-11.876-65.299 1.027l-40.24 14.408-33.919-33.918c-3.905-3.905-10.237-3.905-14.142 0L32.657 114.309c-3.602 3.603-4.293 9.85 0 14.143l190.287 190.287c3.045 3.046 10.175 3.967 14.143 0l101.665-101.664c2.643.228 5.386.351 8.229.351 26.126 0 49.236-17.922 62.457-37.456H502c5.523 0 10-4.477 10-10V43.891c0-5.523-4.477-10-10-10zm-350.915-9.726 22.792 22.792c-6.775 4.19-14.608 6.432-22.792 6.432-8.185 0-16.017-2.241-22.792-6.432l22.792-22.792zM76.663 144.173 53.871 121.38l22.792-22.792c4.19 6.775 6.432 14.608 6.432 22.792 0 8.184-2.241 16.017-6.432 22.793zm153.353 153.352-22.788-22.788c13.913-8.586 31.661-8.586 45.575 0l-22.787 22.788zm37.195-37.194c-22.098-16.03-52.292-16.03-74.39 0L91.07 158.579c7.809-10.74 12.025-23.641 12.025-37.199 0-13.559-4.215-26.459-12.025-37.199l22.817-22.816c10.74 7.809 23.64 12.025 37.199 12.025 13.559 0 26.459-4.216 37.199-12.025l21.629 21.629a39.465 39.465 0 0 0-13.462 4.592c-7.168 3.994-12.792 9.975-16.294 17.211a56.985 56.985 0 0 0-29.915 15.741c-22.225 22.226-22.225 58.389.001 80.615 11.112 11.112 25.709 16.669 40.307 16.669 14.597 0 29.195-5.556 40.308-16.669 7.23-7.23 12.295-16.116 14.832-25.8l33.764 11.459c-3.801 17.608.092 36.132 10.593 50.682l-22.837 22.837zm-60.798-98.313c.088.032.176.064.265.094l19.996 6.787c-1.51 6.815-4.927 13.081-9.957 18.112-14.428 14.426-37.904 14.428-52.33 0-14.428-14.427-14.428-37.902 0-52.33a36.977 36.977 0 0 1 12.062-8.048c1.846 15.362 12.907 29.055 29.964 35.385zm98.044 61.066a43.739 43.739 0 0 1-6.389-20.796 77.755 77.755 0 0 0 17.636 9.549l-11.247 11.247zm90.202-57.101c-9.478 15.538-27.86 31.441-47.678 31.441-3.708 0-7.183-.264-10.432-.734l-.039-.006c-21.596-3.137-33.213-15.411-37.042-20.271-.204-.3-1.073-1.437-1.202-1.626a9.964 9.964 0 0 0-5.511-4.583l-79.508-26.985c-12.688-4.762-19.395-15.627-16.321-26.463l.006-.021.007-.025a19.355 19.355 0 0 1 9.247-11.656 19.351 19.351 0 0 1 14.683-1.757l89.593 28.391c5.266 1.671 10.886-1.247 12.554-6.512 1.668-5.265-1.247-10.885-6.512-12.554l-71.255-22.58-.622-.622-.019-.019-36.89-36.89 31.708-11.354c.107-.039.239-.088.345-.131l.105-.042a9.59 9.59 0 0 0 .403-.174c21.436-9.852 41.812-3.955 49.799-.849 30.183 13.581 46.293 22.87 58.063 29.657 16.364 9.437 24.249 13.984 46.518 15.823v80.542zm37.884-6.015H414.66V72.525h17.883v87.443zm59.457 0h-39.457V53.891H492v106.077z" fill="#3a4270" opacity="1" data-original="#000000" class=""></path></g></svg>
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
            <a href="<?php echo SITE_ADMIN_URL ?>document" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
          </div>
        </div>
      </div>
      <a class="btn bg-gradient-info mt-3 w-100" href="#">Upgrade to pro</a>
    </div>
  </aside>
  