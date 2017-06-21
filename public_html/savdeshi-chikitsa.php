<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="shaheedo ke sapne is intiative to collect the information of martyrf fullfill their dreams for which those got martyred" />
    <meta name="author" content="neeraj vk dixit" />
    <meta name="keywords" content="shaheedo ke sapne,शहीदों के सपने,shaheedo ke sapne ka bharat,शहीदों के सपनो का भारत,राजीव दिक्षित,rajiv dixit,जैविक खेती,jaivik kheti,गुरुकुल,gurukul शिक्षा,स्वदेशी शिक्षा,savdeshi shiksha,savdeshi kheti,स्वदेशी खेती,bhagat singh ke sapne,भगत सिंह के सपने,bagat singh,rajguru,sukhdev,राजगुरु,सुखदेव,चन्दर शेखर आज़ाद,नेताजी सुभाष चन्दर बोष,chander sekhar aazad,netaji subhash chander bosh,khudiram bosh,खुदीराम बोष,आयुर्वेदिक चिकित्सा,aayurvedik chikitsha,स्वदेशी अर्थव्यस्था,savdeshi aarthvayvastha,स्वदेशी न्यायव्यवस्था एवं सम्पूर्ण आज़ादी,savdeshi nayayvayvastha avam sampuran aazadi">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>शहीदों के सपनो का भारत</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="assets/js/pdf.js"></script>
    <style>
        #the-canvas {
  border:1px solid black;
  height : 100%;
  width : 100%;
}
    </style>
</head>
<body>
    <?php require 'header.php';?>
    
     <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
           <div style = "color: red;font-size: larger;font-weight: bolder;" class="col-md-12">
           
                
                
                
                <a style="    float: right;" class="btn btn-primary" id="download_achor" href= "" data-base_url = "http://shaheedokesapne.org/submit/apis.php" >Download PDF</a>
                
                            </div>

        </div>
             
             <div class="row">

              <div class="col-md-12 col-sm-8 col-xs-12">
                    <button id = "sc1" data-path = "/assets/static/sc1.pdf" type="button" class="btn btn-primary book">स्वदेशी चिकित्सा ज्ञान -भाई राजीव दिक्षित -1.pdf</button>
                    <button id = "sc2" data-path = "/assets/static/sc2.pdf" type="button"  class="btn btn-primary book">स्वदेशी चिकित्सा ज्ञान -भाई राजीव दिक्षित -2.pdf</button>
                    <button id = "sc3" data-path = "/assets/static/sc3.pdf" type="button" class="btn btn-primary book">स्वदेशी चिकित्सा ज्ञान -भाई राजीव दिक्षित -3.pdf</button>
                    <button id = "sc4" data-path = "/assets/static/sc4.pdf" type="button"  class="btn btn-primary book">स्वदेशी चिकित्सा ज्ञान -भाई राजीव दिक्षित -4.pdf</button>
                    <button id = "sc5" data-path = "/assets/static/gomata" type="button"  class="btn btn-primary book">गौ माता पंचगव्य चिकित्षा ज्ञान</button>
              </div>
                 </div>
             <br>
             <div class="row">

              <div class="col-md-12 col-sm-8 col-xs-12">
                    <canvas id="the-canvas"></canvas>
                    <button id = "prev" type="button" style="    float: left;" class="btn btn-primary">पिछला पेज</button>
                    <button id = "next" type="button" style="    float: right;" class="btn btn-primary">अगला पेज</button>
              </div>
              
                 
             
                 </div>
            

           
             
            

            </div>

    </div>
    </div>
    <ul id="pagination-demo" style="    margin-left: 37%;" class="pagination-sm"></ul>

    
    <?php require 'footer.php';?>
 
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    <script type="text/javascript" src="assets/js/jquery.twbsPagination.min.js"></script>
    <script>
        
    $(".header_page").removeClass("menu-top-active");
    	$("#savdeshi_page").addClass("menu-top-active");    
        
        // header on that server.
var url = '/assets/static/sc1.pdf';

// The workerSrc property shall be specified.
PDFJS.workerSrc = 'assets/js/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 1.2,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');
        
$(".book").click(function(e){
    console.log("book clicked");
    book_path = $(this).data("path");
    var canvas = document.getElementById('the-canvas');
    var context = canvas.getContext('2d');
    context.fillStyle = "#ffffff";
    context.fillRect(0,0,canvas.width, canvas.height);
    initialise_pdf(book_path);
    
    var params = { "action":"download", "file_name" : btoa(book_path) };
	var str = jQuery.param( params );
	
	var url_to_download = $("#download_achor").data("base_url") + "?" + str;
        
        $("#download_achor").attr('href',url_to_download);
    
})

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport(scale);
    canvas.height = viewport.height;
   	canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });

  // Update page counters
  //document.getElementById('page_num').textContent = pageNum;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
  $('html, body').animate({ scrollTop: $('#the-canvas').offset().top }, 'slow');
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
  $('html, body').animate({ scrollTop: $('#the-canvas').offset().top }, 'slow');
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
function initialise_pdf(url_pdf){
    pageNum = 1
    PDFJS.getDocument(url_pdf).then(function(pdfDoc_) {
      pdfDoc = pdfDoc_;
      //document.getElementById('page_count').textContent = pdfDoc.numPages;

      // Initial/first page rendering
      renderPage(pageNum);
    });
}

 var params = { "action":"download", "file_name" : btoa("/assets/static/sc1.pdf") };
	var str = jQuery.param( params );
	
	var url_to_download = $("#download_achor").data("base_url") + "?" + str;
        
        $("#download_achor").attr('href',url_to_download);

initialise_pdf(url,1);

        
    </script>
  
</body>
</html>
