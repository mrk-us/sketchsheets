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
    <title>Printable icon templates for UX & UI designers</title>
    <meta name="title" content="Printable sketch sheets for UX &amp; UI designers">
    <meta property="og:title" content="Printable sketch sheets for UX &amp; UI designers">
    <meta name="twitter:title" content="Printable sketch sheets for UX &amp; UI designers">
    <meta name="description" content="Printable wireframe templates for designers">
    <meta property="og:description" content="Printable wireframe templates for designers">
    <meta name="twitter:description" content="Printable wireframe templates for designers">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>       
    <div class="wrap">
      <nav>
        <div class="row">
          <div class="column four">
            <div class="logo"><a href="/"></a></div>
          </div>
          <div class="column eight">
            <ul>
              <li><a href="/devicetemplates">Device Templates</a></li>
              <li><a href="../icontemplates" class="active">Icon Templates</a></li>
              <li><a href="../othertemplates">Other Templates</a></li>
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
            <div class="column twelve">
              <div class="download-collection">
                <button class="disabled download-collection-button"><span class="button-label disabled">Download Collection</span>
                  <div class="collection-total"><span class="collection-total-count">0</span></div>
                </button>
              </div>
            </div>
            <div class="column twelve">
              <div class="filter">
                <div data-filter-group="device" class="filter-list"><span>Device</span>
                  <button data-filter="" class="button checked">All</button>
                  <button data-filter=".apple" class="button">Apple</button>
                  <button data-filter=".android" class="button">Android</button>
                  <button data-filter=".standard" class="button">Standard</button>
                </div>
              </div>
            </div>
          </div>
        </aside>
        <section class="column aside-right top nest">
          <form name="zips" method="post">
            <div class="row justify grid"></div>
            <input type="submit" name="zipit" class="zipit">
          </form>
        </section>
      </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.0.0/imagesloaded.pkgd.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/jquery.fluidbox.min.js"></script>
    <script src="../js/classie.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>