<?php
include 'header.php';
include_once '../connection.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
?>
<body class="g-sidenav-show bg-gray-100">
<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container py-2">
      <div class="mx-auto" id="content" style="background-color: white ;">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="card z-index-0 p-4 product-main">

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
              <div class="col w-50 mb-3">
                <span class="text-normal fs-3"><strong>Market Search</strong></span>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-xl-6">
                <span class="text-normal"><strong>Bill To :</strong></span>
                <address id="bill_no"></address>
              </div>
              <div class="col-xl-6">
                <span class="text-normal"><strong>Ship To :</strong></span>
                <address id="ship_to"></address>
              </div>
            </div>
          </div>
          <div class="col w-100">
            <div class="row">
              <div class="col">
                <span class="text-normal"><strong>Date :</strong></span>
                <span class="text-normal" id="date"></span>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col">
                <span class="text-normal"><strong>Payment Terms :</strong></span>
                <span class="text-normal" id="terms"></span>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col">
                <span class="text-normal"><strong>Due Date :</strong></span>
                <span class="text-normal" id="due_date"></span>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col">
                <span class="text-normal"><strong>PO Number :</strong></span>
                <span class="text-normal" id="po_number"></span>
              </div>
            </div>
          </div>
          <div class="col w-100">
            <div class="row">
              <table class="table mt-4">
                <thead>
                  <tr>
                    <th class="w-50 bg-gradient-info text-light ps-3 text-bold">Item</th>
                    <th class="w-16 bg-gradient-info text-light ps-3 text-bold">Quantity</th>
                    <th class="w-17 bg-gradient-info text-light ps-3 text-bold">Rate</th>
                    <th class="w-17 bg-gradient-info text-light ps-3 text-bold">Amount</th>
                  </tr>
                </thead>
                <tbody class="get_invoiceitems">
                  <tr>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col mt-2 w-100 mt-5">
            <div class="row mb-3 text-end">
              <div class="col">
                <span class="text-normal"><strong>Subtotal :</strong></span>
                <span class="text-normal" id="total"></span>
              </div>
            </div>
            <div class="row mt-2 mb-3 text-end">
              <div class="col">
                <span class="text-normal"><strong>Total :</strong></span>
                <span class="text-normal" id="total"></span>
              </div>
            </div>
            <div class="row mt-2 mb-3" style="text-align: end;">
              <div class="col">
                 <span style="font-weight: bold;">Amount Paid :</span>
                  <span id="amount_paid"></span>
               </div>
            </div>
            <div class="row mt-2 mb-3 text-end">
              <div class="col">
                <span class="text-normal"><strong>Balance Due :</strong></span>
                <span class="text-normal" id="balance_due"></span>
              </div>
            </div>
          </div>
          <div class="col w-100 mt-5">
            <div class="row">
              <span class="text-normal ps-4 fs-5"><strong>Notes :</strong></span>
              <span class="text-normal ps-4" id="notes"></span>
            </div>
            <div class="row mt-2">
              <span class="text-normal ps-4 fs-5"><strong>Terms :</strong></span>
              <span class="text-normal ps-4" id="terms_condition"></span>
          
            </div>
          </div>

          
        </div>
      </div>
      <div class="text-end mt-5">
            <button class="btn bg-gradient-info" id="downloadPdf">Download</button>
      </div>
    </div>
  </div>
  
</body>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
   var id = "<?php echo $id; ?>";
   get_invoicepre(id);
  $(document).ready(function() {
    $('#downloadPdf').on('click', function() {
      const {
        jsPDF
      } = window.jspdf;
      const pdf = new jsPDF();
      html2canvas(document.querySelector('#content')).then((canvas) => {
        const imgData = canvas.toDataURL('image/png'); // Convert canvas to image data
        const pdfWidth = pdf.internal.pageSize.getWidth(); // Get page width
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width; // Scale height proportionally

        // Add the image to the PDF
        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

        // Save the generated PDF
        pdf.save('html-to-pdf.pdf');
      });
    });
  });
</script>
<!-- <script>
  var doc = new jsPDF(); 
var specialElementHandlers = { 
    '#editor': function (element, renderer) { 
        return true; 
    } 
};
$('#downloadPdf').click(function () { 
    doc.fromHTML($('#content').html(), 15, 15, { 
        'width': 190, 
            'elementHandlers': specialElementHandlers 
    }); 
    doc.save('sample-page.pdf'); 
});
   
    </script> -->