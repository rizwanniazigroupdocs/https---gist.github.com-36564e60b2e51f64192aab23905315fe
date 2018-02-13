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
    $fileName = "sample-one-page.docx";
    $folderName = "viewerdocs";

    $pdfFileOptions = new \GroupDocs\Viewer\Model\PdfFileOptions();

    $watermark = new \GroupDocs\Viewer\Model\Watermark();
    $watermark->setText("GroupDocs");

    $pdfFileOptions->Watermark = $watermark;

    $request = new Requests\HtmlCreatePdfFileRequest(
        $fileName,
        $pdfFileOptions
    );
    $request->folder = $folderName;
        
    $response = $viewerApi->htmlCreatePdfFile($request);
	
    echo "File Name: ",  $response->getFileName();
    echo "<br>";
    echo "PDF File Name: ",  $response->getPdfFileName();
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>