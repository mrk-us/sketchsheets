<?php
function zipFilesAndDownload($file_names,$archive_file_name,$file_path){
	$zip = new ZipArchive();
	//create the file and throw the error if unsuccessful
	if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
    	exit("cannot open <$archive_file_name>\n");
	}
	//add each files of $file_name array to archive
	foreach($file_names as $files)	{
  		$zip->addFile($file_path.$files,$files);
	}
	$zip->close();
$zipped_size = filesize($archive_file_name);
header("Content-Description: File Transfer");
header("Content-type: application/zip"); 
header("Content-Type: application/force-download");// some browsers need this
header("Content-Disposition: attachment; filename=$archive_file_name");
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header("Content-Length:". " $zipped_size");
ob_clean();
flush();
readfile("$archive_file_name");
unlink("$archive_file_name"); // Now delete the temp file (some servers need this option)
    exit;	
  }
if(isset($_POST['zipit'])) {
//$file_names=$_POST['items'];// Always sanitize your submitted data!!!!!!
//$file_names = filter_var_array($_POST['items']);//works but it's the wrong method
$filter = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS) ;
$file_names = $filter['files'] ; 
//Archive name
$archive_file_name='sketchsheets.zip';
//Download Files path
$file_path= '../sketchsheets/';
//cal the function
zipFilesAndDownload($file_names,$archive_file_name,$file_path);
} else {

//header("Refresh: 5; url= ./index.php ");
//print '<h1 style="text-align:center">You you shouldn\'t be here ......</pre>
//<p style="color: red;"><strong>redirection in 5 seconds</strong></p>
//<pre>';
//exit;
}
?>