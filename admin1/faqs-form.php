<?php
include 'header.php';
?>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <?php
  include 'adminheader.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4">
        <span class="mask bg-gradient-info opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n5 p-4 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                FAQ's Form
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-6 col-lg-9 col-md-6 mx-auto">
          <div class="card z-index-0 p-3 main-sec">
            <form role="form" class="form main-editor" id="faqinsert" enctype="multipart/form-data" method="POST">
              <label for="faq-question" class="font-weight-normal required">Question</label>
              <div class="mb-3">
                <textarea name="faq_question" id="faq-question" class="w-100 form-control validtext"></textarea>
                <span class="errormsg faq_question"></span>
              </div>
              <label for="body" class="font-weight-normal required">Answer</label>
              <div class="mb-3 editor">
                <textarea id="myeditor" name="myeditor"></textarea>
                <span class="errormsg myeditor"></span>
              </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm faqSave save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info btn-sm formCancel">Cancel</button>
              </div>
              <div class="alert" role="alert" id="success_message" name="success_alert"></div>
            </form>
          </div>
        </div>
        <div class="col-xl-6 col-lg-9 col-md-6 mx-auto">
          <div class="card z-index-0 p-3 main-sec">
            <div class="mb-3 form-check-reverse text-right ">
              <div class="container">
                <div class="btn-group">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <div class="form-check form-switch ps-0">
                      <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion">
              <div class="row mb-3">
                <div class="col-xl-11 accordion-item">
                  <input type="checkbox" id="accordion1">
                  <label for="accordion1" class="accordion-item-title"><span class="icon"></span>What is SEO, and why is it important for online businesses?</label>
                  <div class="accordion-item-desc">
                    SEO, or Search Engine Optimization, is the practice of optimizing a website to improve its visibility on search
                    engines like Google. It involves various techniques to enhance a site's ranking in search results. SEO is crucial
                    for online businesses as it helps drive organic traffic, increases visibility, and ultimately leads to higher
                    conversions.
                  </div>
                </div>
                <div class="col-xl-1">
                  <i class="fa fa-trash cursor-pointer mt-3" aria-hidden="true"></i>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-xl-11 accordion-item">
                  <input type="checkbox" id="accordion2">
                  <label for="accordion2" class="accordion-item-title"><span class="icon"></span>How long does it take to see results from SEO efforts?</label>
                  <div class="accordion-item-desc">
                    The timeline for seeing results from SEO can vary based on several factors, such as the competitiveness of keywords,
                    the current state of the website, and the effectiveness of the SEO strategy. Generally, it may take several weeks to
                    months before noticeable improvements occur. However, long-term commitment to SEO is essential for sustained success.
                  </div>
                </div>
                <div class="col-xl-1">
                  <i class="fa fa-trash cursor-pointer mt-3" aria-hidden="true"></i>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-xl-11 accordion-item">
                  <input type="checkbox" id="accordion3">
                  <label for="accordion3" class="accordion-item-title"><span class="icon"></span>What are the key components of a successful SEO strategy?</label>
                  <div class="accordion-item-desc">
                    A successful SEO strategy involves various components, including keyword research, on-page optimization, quality
                    content creation, link building, technical SEO, and user experience optimization. These elements work together to
                    improve a website's relevance and authority in the eyes of search engines.
                  </div>
                </div>
                <div class="col-xl-1">
                  <i class="fa fa-trash cursor-pointer mt-3" aria-hidden="true"></i>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-xl-11 accordion-item">
                  <input type="checkbox" id="accordion4">
                  <label for="accordion4" class="accordion-item-title"><span class="icon"></span>How does mobile optimization impact SEO?</label>
                  <div class="accordion-item-desc">
                    Mobile optimization is crucial for SEO because search engines prioritize mobile-friendly websites. With the increasing
                    use of smartphones, search engines like Google consider mobile responsiveness as a ranking factor. Websites that
                    provide a seamless experience on mobile devices are more likely to rank higher in search results.
                  </div>
                </div>
                <div class="col-xl-1">
                  <i class="fa fa-trash cursor-pointer mt-3" aria-hidden="true"></i>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-xl-11 accordion-item">
                  <input type="checkbox" id="accordion5">
                  <label for="accordion5" class="accordion-item-title"><span class="icon"></span>What is the role of backlinks in SEO, and how can they be acquired?</label>
                  <div class="accordion-item-desc">
                    Backlinks, or inbound links from other websites to yours, play a significant role in SEO. They are considered a vote
                    of confidence and can improve a site's authority. Quality over quantity is crucial when acquiring backlinks. Strategies
                    for obtaining backlinks include creating high-quality content, guest posting, reaching out to industry influencers,
                    and participating in community activities. It's important to focus on natural and ethical link-building practices.
                  </div>
                </div>
                <div class="col-xl-1">
                  <i class="fa fa-trash cursor-pointer mt-4" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="tel:+1234567891">
      <i class="fa fa-phone"></i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="#">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="#">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="#" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>