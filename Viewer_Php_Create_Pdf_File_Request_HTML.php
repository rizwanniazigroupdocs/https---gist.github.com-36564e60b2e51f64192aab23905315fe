<?php
  use GroupDocs\Viewer\Model\Requests;
  require_once('C:\xampp\htdocs\groupdocs-viewer-cloud-php-master\vendor\autoload.php');

  //TODO: Get your AppSID and AppKey at https://dashboard.groupdocs.cloud (free registration is required).

  $configuration = new GroupDocs\Viewer\Configuration();
  $configuration->setAppSid("XXXX-X");
  $configuration->setAppKey("XXX-XX");

  $viewerApi = new GroupDocs\Viewer\ViewerApi($configuration); 

  try 
  {
    $fileName = "D:/one-page.docx";
    $folderName = "viewerdocs";

    $pdfFileOptions = new \GroupDocs\Viewer\Model\PdfFileOptions();

    $optionsFile = tmpfile();
    $optionsFilePath = stream_get_meta_data($optionsFile)['uri'];
    list($optionsFile, $optionsFilePath) = fwrite($optionsFile, $pdfFileOptions->__toString());

    $request = new Requests\HtmlCreatePdfFileFromContentRequest($fileName, $optionsFilePath);
    $request->folder = $folderName;
        
    $response = $viewerApi->htmlCreatePdfFileFromContent($request);
	
    echo "Number of Pages: ",  $response->getPages();
    echo "<br>";
    echo "File Name: ",  $response->getFileName();
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>