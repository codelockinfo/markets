<?php
include 'header.php';
?>
<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
        $para_array = array("title" => "Invoice", "link" => "", "button_text" => "");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-2">
      <div class="col-xl-6 mx-auto">
        <div class="card z-index-0 p-4 product-main">
          <form action="">
            <div class="col w-100">
              <div class="row mb-3">
                <div class="col">
                  <img src="<?php echo main_url('admin1/assets/img/market.png'); ?>" alt="market" class="max-width-100 mt-n4">
                </div>
                <div class="col">
                  <h1 class="text-normal fs-2 text-end">INVOICE</h1>
                  <p class="text-normal text-end"># 101</p>
                </div>
              </div>
            </div>
            <div class="col w-100">
              <div class="row mb-3">
                <div class="row">
                  <div class="col w-50 mb-3">
                    <span class="text-normal fs-3"><strong>Market Search</strong></span>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-xl-6">
                    <span class="text-normal"><strong>Bill To :</strong></span>
                    <address>2020, Silver Business Hub, VIP Circle, Uttran, Mota-Vatachha, Suart -394105</address>
                  </div>
                  <div class="col-xl-6">
                    <span class="text-normal"><strong>Ship To :</strong></span>
                    <address>2020, Silver Business Hub, VIP Circle, Uttran, Mota-Vatachha, Suart -394105</address>
                  </div>
                </div>
              </div>
            </div>
            <div class="col w-100">
              <div class="row mb-3 text-start">
                <div class="row">
                  <div class="col">
                    <span class="text-normal"><strong>Date :</strong></span>
                    <span class="text-normal">June 25, 2024</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Payment Terms :</strong></span>
                    <span class="text-normal">UPI / CRADIT CARD / DEBIT CAED</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Due Date :</strong></span>
                    <span class="text-normal">June 30, 2024</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>PO Number :</strong></span>
                    <span class="text-normal">394101</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row table-scroll">
              <table class="mt-4">
                <tr class="border-redius">
                  <th class="w-50 bg-gradient-info text-light ps-3 text-bold">item</th>
                  <th class="w-16 bg-gradient-info text-light ps-3 text-bold">Quantity</th>
                  <th class="w-17 bg-gradient-info text-light ps-3 text-bold">Rate</th>
                  <th class="w-17 bg-gradient-info text-light ps-3 text-bold">Amount</th>
                </tr>
                <tr>
                  <td class="text-normal">Footwear</td>
                  <td class="text-center">02</td>
                  <td class="text-center">₹ 1150.00</td>
                  <td class="text-center">₹ 2300.00</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="text-normal">Dress</td>
                  <td class="text-center">03</td>
                  <td class="text-center">₹ 650.00</td>
                  <td class="text-center">₹ 1950.00</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="text-normal">Tops</td>
                  <td class="text-center">02</td>
                  <td class="text-center">₹ 750.00</td>
                  <td class="text-center">₹ 1500.00</td>
                  <td></td>
                </tr>
              </table>
            </div>
            <div class="col w-100 mt-5">
              <div class="row mb-3 text-end">
                <div class="row">
                  <div class="col">
                    <span class="text-normal"><strong>Subtotal :</strong></span>
                    <span class="text-normal">₹ 5750.00</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Tax (05%) :</strong></span>
                    <span class="text-normal">₹ 6037.05</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Discount (10%) :</strong></span>
                    <span class="text-normal">₹ 5433.75</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Shipping :</strong></span>
                    <span class="text-normal">Free Shipping</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Total :</strong></span>
                    <span class="text-normal">₹ 5433.75</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Amount Paid :</strong></span>
                    <span class="text-normal">₹ 5433.75</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Balance Due :</strong></span>
                    <span class="text-normal">₹ 0.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row w-100 mt-4">
              <div class="col w-50">
                <div class="row">
                  <span class="text-normal ps-4 fs-5"><strong>Notes :</strong></span>
                  <span class="text-normal ps-4">Thank You for Shopping !</span>
                </div>
                <div class="row mt-2">
                  <span class="text-normal ps-4 fs-5"><strong>Terms :</strong></span>
                  <span class="text-normal ps-4">Payment Method : UPI / CRADIT CAED / DEBIT CARD</span>
                  <span class="text-normal ps-4">Delivery Schedule : </span>
                </div>
              </div>
            </div>
          </form>
          <div class="text-end mt-5">
            <button class="btn bg-gradient-info">Print</button>
          </div>
        </div>
      </div>
    </div>

</body>
</html>