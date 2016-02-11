<?php
if (isset($_POST['files']))
{
    $error = ""; //error holder
    
    if (isset($_POST['zipit']))
    {
        $post        = $_POST;
        $file_folder = "sketchsheets/"; // folder to load files
        
        if (extension_loaded('zip'))
        {
            // Checking ZIP extension is available
            if (isset($post['files']) and count($post['files']) > 0)
            {
                // Checking files are selected
                $zip      = new ZipArchive(); // Load zip library 
                $zip_name = sketchsheets . ".zip"; // Zip name
                
                if ($zip->open($zip_name, ZIPARCHIVE::CREATE) !== TRUE)
                {
                    // Opening zip file to load files
                    $error .= "* Sorry ZIP creation failed at this time";
                }
                
                foreach ($post['files'] as $file)
                {
                    $zip->addFile($file_folder . $file); // Adding files into zip
                }
                
                $zip->close();
                
                if (file_exists($zip_name))
                {
                    // push to download the zip
                    $zipped_size = filesize($zip_name);
                    header('Content-Type: application/zip');
                    header('Content-Disposition: attachment; filename="' . $zip_name . '"');
                    header("Content-Description: File Transfer");
                    header("Content-Type: application/zip");
                    header("Content-Type: application/force-download"); // some browsers need this
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: Public');
                    header("Content-Length:" . " $zipped_size");
                    ob_clean();
                    flush();
                    readfile($zip_name);
                    // remove zip file is exists in temp path
                    unlink($zip_name);
                }
                
            }
            else    
            {
                $error .= "* Please select file to zip ";
            }
        }
        else
        {
            $error .= "* You dont have ZIP extension";
        }
        
    }
}
?>