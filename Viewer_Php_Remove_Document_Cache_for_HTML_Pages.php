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
    $fileName = "sample.docx";
    $folderName = "viewerdocs";

    $request = new Requests\HtmlDeletePagesCacheRequest(
        $fileName,
        $folderName
    );
        
    $viewerApi->htmlDeletePagesCache($request);
	
    echo "Document Cache Removed.";
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>