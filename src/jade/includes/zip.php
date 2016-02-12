<?php

    $error = ""; // error holder
    
    if (isset($_POST['zipit']))
    {
        $post = $_POST;
        
        // If no file paths have been passed, just return
        if (!isset($post['files']) || count($post['files']) == 0)
        {
            $error .= "* Please select files to zip ";
            return;
        }
        
        $parent_folder = "sketchsheets/"; // folder to load files
        $file_paths = $post['files'];
        
        $output_zip_name  = "sketchsheets.zip"; // Zip name
        
        // Create a zip containing selected files
        if (!ZipFiles($parent_folder, $file_paths, $output_zip_name))
        {
            $error .= "* Sorry ZIP creation failed at this time";
            return;
        }
        
        // If zip has been successful..
        if (file_exists($output_zip_name))
        {
            error_reporting(0); // First ensure errors repressed
            
            ob_start(); // Turn on output buffering
            
            $zipped_size = filesize($output_zip_name);
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $output_zip_name . '"');
            header("Content-Description: File Transfer");
            header("Content-Type: application/zip");
            header("Content-Type: application/force-download"); // some browsers need this
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: Public');
            header("Content-Length:" . " $zipped_size");
            
            ob_clean(); // Clean output buffer
            ob_end_flush(); // Flush the output buffer and turn off output buffering
            
            readfile($output_zip_name); // Output generated zip file
            unlink($output_zip_name); // Remove zip file at temp path
        }
        else
        {
            $error .= "* Sorry ZIP creation failed at this time";
            return;
        }
 
    }


    function ZipFiles($source_parent_folder, $sub_file_paths, $destination_zip_path)
    {
        if (!extension_loaded('zip'))
        {
            return false;
        }
        
        $zip = new ZipArchive();
        if (!$zip->open($destination_zip_path, ZIPARCHIVE::CREATE))
        {
            return false;
        }
        
        // Loop through each filepath selected, and add to zip
        foreach ($sub_file_paths as $sub_file_path)
        {
            $source_file_path = $source_parent_folder . $sub_file_path;

            $output_internal_path = $source_file_path . "/";
            
            if (!file_exists($source_file_path))
            {
                continue;
            }
            
            $source_file_path = str_replace('\\', '/', realpath($source_file_path));

            if (is_dir($source_file_path) === true)
            {
                $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source_file_path), RecursiveIteratorIterator::SELF_FIRST);

                foreach ($files as $file)
                {
                    $file = str_replace('\\', '/', $file);

                    // Don't include "." and ".." folders
                    if ( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                        continue;

                    $file = realpath($file);

                    if (is_dir($file) === true)
                    {
                        $zip->addEmptyDir($output_internal_path . str_replace($source_file_path . '/', '', $file . '/'));
                    }
                    else if (is_file($file) === true)
                    {
                        $zip->addFromString($output_internal_path . str_replace($source_file_path . '/', '', $file), file_get_contents($file));
                    }
                }
            }
            else if (is_file($source_file_path) === true)
            {
                $zip->addFromString($output_internal_path . basename($source_file_path), file_get_contents($source_file_path));
            }
        }
        
        // Close and return zip
        return $zip->close();
    }

?>