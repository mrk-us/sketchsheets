<?php
$error = ""; // error holder
if(isset($_POST['zipit']))
  {
    $post = $_POST; 
    $file_folder = "sketchsheets/"; // Directory to load
  
    if(extension_loaded('zip'))
      { 
      // Checking ZIP extension is available
      if(isset($post['files']) and count($post['files']) > 0)
        { 
          // Checking files are selected
          $zip = new ZipArchive(); // Load zip library 
          $zip_name = sketchsheets.".zip"; // Zip name

          if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE)
            { 
              // Opening zip file to load files
              $error .= "* Sorry, there was a problem :(";
            }

          foreach($post['files'] as $file)
            { 
              $zip->addFile($file_folder.$file); // Adding files into zip
            }

          $zip->close();

          if(file_exists($zip_name))
            {
              // push to download the zip
              header('Content-type: application/zip');
              header('Content-Disposition: attachment; filename="'.$zip_name.'"');
              readfile($zip_name);
              // remove zip file is exists in temp path
              unlink($zip_name);
              header('Location: .');
            }
  
        }

        else
        $error .= "* Add something to collection first";
      }
    else
    $error .= "* Sorry, there was a problem :(";
  }
unset($_POST);
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta property="og:image" content="">
    <meta name="twitter:image:src" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="shortcut icon" href="">
    <link rel="image_src" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hind:400,300,500">
    <title>Printable device sketch sheet templates for UX & UI designers</title>
    <meta name="title" content="Printable sketch sheets for UX &amp; UI designers">
    <meta property="og:title" content="Printable sketch sheets for UX &amp; UI designers">
    <meta name="twitter:title" content="Printable sketch sheets for UX &amp; UI designers">
    <meta name="description" content="Printable wireframe templates for designers">
    <meta property="og:description" content="Printable wireframe templates for designers">
    <meta name="twitter:description" content="Printable wireframe templates for designers">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fluidbox.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
  </head>
  <body>       
    <div class="wrap">
      <nav>
        <div class="row">
          <div class="column four bottom">
            <div class="logo"><a href="/"></a></div>
          </div>
          <div class="column eight">
            <ul>
              <li><a href="/devicetemplates" class="active">Device Templates</a></li>
              <li><span>Icon Templates</span></li>
            </ul>
          </div>
        </div>
      </nav>
      <section>
        <div class="row hero">
          <div class="column">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="">
                    <div class="row">
                      <div class="column twelve">
                        <h1>Printable device templates for designers</h1>
                        <p> <i class="icon-twitter"></i></p>
                      </div>
                    </div></a></div>
                <div class="swiper-slide"><a href="">
                    <div class="row">
                      <div class="column twelve">
                        <h1>Create your own template</h1>
                        <p>Download the .sketch</p>
                      </div>
                    </div></a></div>
                <div class="swiper-slide"><a href="">
                    <div class="row">
                      <div class="column twelve">
                        <h1>Advertise here</h1>
                        <p>Contact ads@sketchsheets.cc</p>
                      </div>
                    </div></a></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </section>
      <div class="row">
        <aside class="column aside-left top nest">
          <div class="row sidebar">
            <div class="column twelve">
              <div class="download-collection">
                <button class="disabled download-collection-button">
                  <div class="button-label disabled">Download Collection</div>
                  <div class="collection-total"><span class="collection-total-count">0</span></div>
                </button>
              </div>
            </div>
            <div class="column twelve">
              <div class="filter">
                <div data-filter-group="device" class="filter-list"><span>Device</span>
                  <button data-filter="" class="button checked">All</button>
                  <button data-filter=".iphone5" class="button">iPhone 5</button>
                  <button data-filter=".iphone6" class="button">iPhone 6</button>
                  <button data-filter=".iphone6plus" class="button">iPhone 6 Plus</button>
                  <button data-filter=".ipad" class="button">iPad</button>
                  <button data-filter=".ipadpro" class="button">iPad Pro</button>
                  <button data-filter=".web" class="button">Web / Desktop</button>
                </div>
              </div>
            </div>
            <div class="column twelve">
              <div class="filter">
                <div data-filter-group="orientation" class="filter-list"><span>Orientation</span>
                  <button data-filter="" class="button checked">All</button>
                  <button data-filter=".portrait" class="button">Portrait</button>
                  <button data-filter=".landscape" class="button">Landscape</button>
                  <button data-filter=".portrait-landscape" class="button">Both</button>
                </div>
              </div>
            </div>
            <div class="column twelve">
              <div class="filter">
                <div data-filter-group="screen" class="filter-list"><span>Screen</span>
                  <button data-filter="" class="button checked">All</button>
                  <button data-filter=".standard" class="button">Standard</button>
                  <button data-filter=".scrolled" class="button">Scrolled</button>
                  <button data-filter=".standard-scrolled" class="button">Both</button>
                </div>
              </div>
            </div>
          </div>
        </aside>
        <section class="column aside-right top nest">
          <form name="zips" method="post">
            <div class="row justify grid">
              <div class="column item iphone5 portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x2/Blank/iPhone5-Portrait-Standard-x2.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x2/Blank/iPhone5-Portrait-Standard-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x3/Blank/iPhone5-Portrait-Standard-x3.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x3/Blank/iPhone5-Portrait-Standard-x3.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x4/Blank/iPhone5-Portrait-Standard-x4.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x4/Blank/iPhone5-Portrait-Standard-x4.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x1-Scrolled-x1/Blank/iPhone5-Portrait-Standard-x1-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x1-Scrolled-x1/Blank/iPhone5-Portrait-Standard-x1-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x2-Scrolled-x1/Blank/iPhone5-Portrait-Standard-x2-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x2-Scrolled-x1/Blank/iPhone5-Portrait-Standard-x2-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x2-Scrolled-x2/Blank/iPhone5-Portrait-Standard-x2-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Standard-x2-Scrolled-x2/Blank/iPhone5-Portrait-Standard-x2-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Scrolled-x2/Blank/iPhone5-Portrait-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Scrolled-x2/Blank/iPhone5-Portrait-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Scrolled-x3/Blank/iPhone5-Portrait-Scrolled-x3.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Scrolled-x3/Blank/iPhone5-Portrait-Scrolled-x3.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Scrolled-x4/Blank/iPhone5-Portrait-Scrolled-x4.png" class="lightbox"><img src="../sketchsheets/iPhone5/Portrait/iPhone5-Portrait-Scrolled-x4/Blank/iPhone5-Portrait-Scrolled-x4.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait-landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Landscape+Portrait/iPhone5-Portrait-Standard-x1-Landscape-Standard-x1/Blank/iPhone5-Portrait-Standard-x1-Landscape-Standard-x1.png" class="lightbox"><img src="../sketchsheets/iPhone5/Landscape+Portrait/iPhone5-Portrait-Standard-x1-Landscape-Standard-x1/Blank/iPhone5-Portrait-Standard-x1-Landscape-Standard-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait-landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Landscape+Portrait/iPhone5-Portrait-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone5-Portrait-Standard-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone5/Landscape+Portrait/iPhone5-Portrait-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone5-Portrait-Standard-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait-landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Landscape+Portrait/iPhone5-Portrait-Scrolled-x1-Landscape-Scrolled-x1/Blank/iPhone5-Portrait-Scrolled-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone5/Landscape+Portrait/iPhone5-Portrait-Scrolled-x1-Landscape-Scrolled-x1/Blank/iPhone5-Portrait-Scrolled-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download</span></a>
                </div>
              </div>
              <div class="column item iphone5 landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Landscape/iPhone5-Landscape-Standard-x2/Blank/iPhone5-Landscape-Standard-x2.png" class="lightbox"><img src="../sketchsheets/iPhone5/Landscape/iPhone5-Landscape-Standard-x2/Blank/iPhone5-Landscape-Standard-x2.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item iphone5 landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Landscape/iPhone5-Landscape-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone5-Landscape-Standard-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone5/Landscape/iPhone5-Landscape-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone5-Landscape-Standard-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item iphone5 landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone5/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone5/Landscape/iPhone5-Landscape-Scrolled-x2/Blank/iPhone5-Landscape-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone5/Landscape/iPhone5-Landscape-Scrolled-x2/Blank/iPhone5-Landscape-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download</span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x2/Blank/iPhone6-Portrait-Standard-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x2/Blank/iPhone6-Portrait-Standard-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x3/Blank/iPhone6-Portrait-Standard-x3.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x3/Blank/iPhone6-Portrait-Standard-x3.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x4/Blank/iPhone6-Portrait-Standard-x4.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x4/Blank/iPhone6-Portrait-Standard-x4.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x1-Scrolled-x1/Blank/iPhone6-Portrait-Standard-x1-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x1-Scrolled-x1/Blank/iPhone6-Portrait-Standard-x1-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x2-Scrolled-x1/Blank/iPhone6-Portrait-Standard-x2-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x2-Scrolled-x1/Blank/iPhone6-Portrait-Standard-x2-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x2-Scrolled-x2/Blank/iPhone6-Portrait-Standard-x2-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Standard-x2-Scrolled-x2/Blank/iPhone6-Portrait-Standard-x2-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Scrolled-x2/Blank/iPhone6-Portrait-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Scrolled-x2/Blank/iPhone6-Portrait-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Scrolled-x3/Blank/iPhone6-Portrait-Scrolled-x3.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Scrolled-x3/Blank/iPhone6-Portrait-Scrolled-x3.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Scrolled-x4/Blank/iPhone6-Portrait-Scrolled-x4.png" class="lightbox"><img src="../sketchsheets/iPhone6/Portrait/iPhone6-Portrait-Scrolled-x4/Blank/iPhone6-Portrait-Scrolled-x4.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait-landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Landscape+Portrait/iPhone6-Portrait-Standard-x1-Landscape-Standard-x1/Blank/iPhone6-Portrait-Standard-x1-Landscape-Standard-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6/Landscape+Portrait/iPhone6-Portrait-Standard-x1-Landscape-Standard-x1/Blank/iPhone6-Portrait-Standard-x1-Landscape-Standard-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait-landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Landscape+Portrait/iPhone6-Portrait-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6-Portrait-Standard-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6/Landscape+Portrait/iPhone6-Portrait-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6-Portrait-Standard-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6 portrait-landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Landscape+Portrait/iPhone6-Portrait-Scrolled-x1-Landscape-Scrolled-x1/Blank/iPhone6-Portrait-Scrolled-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6/Landscape+Portrait/iPhone6-Portrait-Scrolled-x1-Landscape-Scrolled-x1/Blank/iPhone6-Portrait-Scrolled-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download</span></a>
                </div>
              </div>
              <div class="column item iphone6 landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Landscape/iPhone6-Landscape-Standard-x2/Blank/iPhone6-Landscape-Standard-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6/Landscape/iPhone6-Landscape-Standard-x2/Blank/iPhone6-Landscape-Standard-x2.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item iphone6 landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Landscape/iPhone6-Landscape-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6-Landscape-Standard-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6/Landscape/iPhone6-Landscape-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6-Landscape-Standard-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item iphone6 landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6/Landscape/iPhone6-Landscape-Scrolled-x2/Blank/iPhone6-Landscape-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6/Landscape/iPhone6-Landscape-Scrolled-x2/Blank/iPhone6-Landscape-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download</span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x2/Blank/iPhone6Plus-Portrait-Standard-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x2/Blank/iPhone6Plus-Portrait-Standard-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x3/Blank/iPhone6Plus-Portrait-Standard-x3.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x3/Blank/iPhone6Plus-Portrait-Standard-x3.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x4/Blank/iPhone6Plus-Portrait-Standard-x4.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x4/Blank/iPhone6Plus-Portrait-Standard-x4.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x1-Scrolled-x1/Blank/iPhone6Plus-Portrait-Standard-x1-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x1-Scrolled-x1/Blank/iPhone6Plus-Portrait-Standard-x1-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x2-Scrolled-x1/Blank/iPhone6Plus-Portrait-Standard-x2-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x2-Scrolled-x1/Blank/iPhone6Plus-Portrait-Standard-x2-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x2-Scrolled-x2/Blank/iPhone6Plus-Portrait-Standard-x2-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Standard-x2-Scrolled-x2/Blank/iPhone6Plus-Portrait-Standard-x2-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Scrolled-x2/Blank/iPhone6Plus-Portrait-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Scrolled-x2/Blank/iPhone6Plus-Portrait-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Scrolled-x3/Blank/iPhone6Plus-Portrait-Scrolled-x3.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Scrolled-x3/Blank/iPhone6Plus-Portrait-Scrolled-x3.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Scrolled-x4/Blank/iPhone6Plus-Portrait-Scrolled-x4.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Portrait/iPhone6Plus-Portrait-Scrolled-x4/Blank/iPhone6Plus-Portrait-Scrolled-x4.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait-landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Landscape+Portrait/iPhone6Plus-Portrait-Standard-x1-Landscape-Standard-x1/Blank/iPhone6Plus-Portrait-Standard-x1-Landscape-Standard-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Landscape+Portrait/iPhone6Plus-Portrait-Standard-x1-Landscape-Standard-x1/Blank/iPhone6Plus-Portrait-Standard-x1-Landscape-Standard-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait-landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Landscape+Portrait/iPhone6Plus-Portrait-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6Plus-Portrait-Standard-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Landscape+Portrait/iPhone6Plus-Portrait-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6Plus-Portrait-Standard-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone6plus portrait-landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Landscape+Portrait/iPhone6Plus-Portrait-Scrolled-x1-Landscape-Scrolled-x1/Blank/iPhone6Plus-Portrait-Scrolled-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Landscape+Portrait/iPhone6Plus-Portrait-Scrolled-x1-Landscape-Scrolled-x1/Blank/iPhone6Plus-Portrait-Scrolled-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download</span></a>
                </div>
              </div>
              <div class="column item iphone6plus landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Landscape/iPhone6Plus-Landscape-Standard-x2/Blank/iPhone6Plus-Landscape-Standard-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Landscape/iPhone6Plus-Landscape-Standard-x2/Blank/iPhone6Plus-Landscape-Standard-x2.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item iphone6plus landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Landscape/iPhone6Plus-Landscape-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6Plus-Landscape-Standard-x1-Landscape-Scrolled-x1.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Landscape/iPhone6Plus-Landscape-Standard-x1-Landscape-Scrolled-x1/Blank/iPhone6Plus-Landscape-Standard-x1-Landscape-Scrolled-x1.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item iphone6plus landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPhone6Plus/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPhone6Plus/Landscape/iPhone6Plus-Landscape-Scrolled-x2/Blank/iPhone6Plus-Landscape-Scrolled-x2.png" class="lightbox"><img src="../sketchsheets/iPhone6Plus/Landscape/iPhone6Plus-Landscape-Scrolled-x2/Blank/iPhone6Plus-Landscape-Scrolled-x2.png"></a><a href="" class="downloadzip"> <span>Download</span></a>
                </div>
              </div>
              <div class="column item ipad portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Portrait/iPad-Portrait-x1/Blank/iPad-Portrait-x1.png" class="lightbox"><img src="../sketchsheets/iPad/Portrait/iPad-Portrait-x1/Blank/iPad-Portrait-x1.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Portrait/iPad-Portrait-Multitask-x1/Blank/iPad-Portrait-Multitask-x1.png" class="lightbox"><img src="../sketchsheets/iPad/Portrait/iPad-Portrait-Multitask-x1/Blank/iPad-Portrait-Multitask-x1.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Portrait/iPad-Portrait-x2/Blank/iPad-Portrait-x2.png" class="lightbox"><img src="../sketchsheets/iPad/Portrait/iPad-Portrait-x2/Blank/iPad-Portrait-x2.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Portrait/iPad-Portrait-x1-Multitask-x1/Blank/iPad-Portrait-x1-Multitask-x1.png" class="lightbox"><img src="../sketchsheets/iPad/Portrait/iPad-Portrait-x1-Multitask-x1/Blank/iPad-Portrait-x1-Multitask-x1.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad portrait standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Portrait/iPad-Portrait-Multitask-x2/Blank/iPad-Portrait-Multitask-x2.png" class="lightbox"><img src="../sketchsheets/iPad/Portrait/iPad-Portrait-Multitask-x2/Blank/iPad-Portrait-Multitask-x2.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-x1/Blank/iPad-Landscape-x1.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-x1/Blank/iPad-Landscape-x1.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x1-A/Blank/iPad-Landscape-Multitask-x1-A.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x1-A/Blank/iPad-Landscape-Multitask-x1-A.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x1-B/Blank/iPad-Landscape-Multitask-x1-B.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x1-B/Blank/iPad-Landscape-Multitask-x1-B.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-x2/Blank/iPad-Landscape-x2.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-x2/Blank/iPad-Landscape-x2.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-x1-Multitask-x1-A/Blank/iPad-Landscape-x1-Multitask-x1-A.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-x1-Multitask-x1-A/Blank/iPad-Landscape-x1-Multitask-x1-A.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-x1-Multitask-x1-B/Blank/iPad-Landscape-x1-Multitask-x1-B.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-x1-Multitask-x1-B/Blank/iPad-Landscape-x1-Multitask-x1-B.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x2-A/Blank/iPad-Landscape-Multitask-x2-A.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x2-A/Blank/iPad-Landscape-Multitask-x2-A.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
              <div class="column item ipad landscape standard">
                <div class="card">
                  <input type="checkbox" name="files[]" value="iPad/">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><a href="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x2-B/Blank/iPad-Landscape-Multitask-x2-B.png" class="lightbox"><img src="../sketchsheets/iPad/Landscape/iPad-Landscape-Multitask-x2-B/Blank/iPad-Landscape-Multitask-x2-B.png"></a><a href="" class="downloadzip"> <span>Download </span></a>
                </div>
              </div>
            </div>
            <input type="submit" name="zipit" class="zipit">
          </form>
        </section>
      </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.0.0/imagesloaded.pkgd.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/swiper.jquery.min.js"></script>
    <script src="../js/jquery.fluidbox.min.js"></script>
    <script src="../js/classie.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>