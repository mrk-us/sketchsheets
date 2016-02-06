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
  </head>
  <title>Printable sketch sheets for UX & UI designers</title>
  <meta name="title" content="Printable sketch sheets for UX &amp; UI designers">
  <meta property="og:title" content="Printable sketch sheets for UX &amp; UI designers">
  <meta name="twitter:title" content="Printable sketch sheets for UX &amp; UI designers">
  <meta name="description" content="Printable wireframe templates for designers">
  <meta property="og:description" content="Printable wireframe templates for designers">
  <meta name="twitter:description" content="Printable wireframe templates for designers">
  <link rel="stylesheet" href="../css/grub.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <body>       
    <div class="wrap">
      <nav>
        <div class="row">
          <div class="column column-4">
            <div class="logo"><a href="/"></a></div>
          </div>
          <div class="column column-8">
            <ul>
              <li><a href="/devicetemplates" class="active">Device Templates</a></li>
              <li><a href="/devicetemplates">Icon Templates</a></li>
              <li><a href="/devicetemplates">UX Templates</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <section>
        <div class="row hero">
          <div class="column">
            <h3>Free Printable Device Templates for Designers</h3><a href=""><i class="icon-twitter"></i></a>
          </div>
        </div>
      </section>
      <div class="row">
        <aside class="column aside-left top nest">
          <div class="row sidebar">
            <div class="column column-12">
              <div class="download-collection">
                <button class="disabled download-collection-button"><span class="button-label disabled">Download Collection</span>
                  <div class="collection-total"><span class="collection-total-count">0</span></div>
                </button>
              </div>
            </div>
            <div class="column column-12">
              <div class="filter">
                <div data-filter-group="device" class="filter-list"><span>Device</span>
                  <button data-filter=".iphone5" class="button checked">iPhone 5</button>
                  <button data-filter=".iphone6" class="button">iPhone 6</button>
                  <button data-filter=".iphone6plus" class="button">iPhone 6 Plus</button>
                  <button data-filter=".ipad" class="button">iPad</button>
                  <button data-filter=".ipadpro" class="button">iPad Pro</button>
                  <button data-filter=".web" class="button">Web / Desktop</button>
                </div>
              </div>
            </div>
            <div class="column column-12">
              <div class="filter">
                <div data-filter-group="orientation" class="filter-list"><span>Orientation</span>
                  <button data-filter="" class="button checked">All</button>
                  <button data-filter=".portrait" class="button">Portrait</button>
                  <button data-filter=".landscape" class="button">Landscape</button>
                  <button data-filter=".portrait-landscape" class="button">Both</button>
                </div>
              </div>
            </div>
            <div class="column column-12">
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
          <form name="zip" method="post">
            <div class="row justify grid">
              <div class="column item iphone5 portrait standard">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_x2_Normal.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_x2_Normal_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_x2_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait-landscape standard">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_Landscape_x2_Normal.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait-landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_Landscape_x2_Normal_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait-landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_Landscape_x2_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 landscape standard">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Landscape_x2_Normal.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 landscape standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Landscape_x2_Normal_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 landscape scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Landscape_x2_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_x4_Normal.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait standard-scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_x4_Normal_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
              <div class="column item iphone5 portrait scrolled">
                <div class="card">
                  <input type="checkbox" name="collection" value="1">
                  <div class="overlay"><span>Added to collection</span></div><span><i class="icon-plus"></i><i class="icon-check"></i></span><img src="../sketchsheets/iphone5/Portrait_x4_Scrolled.png"><a href=""> <span>Download                  </span></a>
                </div>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </body>
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.0.0/imagesloaded.pkgd.min.js"></script>
  <script src="../js/isotope.pkgd.min.js"></script>
  <script src="../js/classie.min.js"></script>
  <script src="../js/main.js"></script>
</html>