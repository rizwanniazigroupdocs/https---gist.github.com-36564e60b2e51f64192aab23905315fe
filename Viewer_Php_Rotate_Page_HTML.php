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

    $transformOptions = new \GroupDocs\Viewer\Model\RotateOptions();
    $transformOptions->setPageNumber(1);
    $transformOptions->setAngle(90);

    $request = new Requests\HtmlTransformPagesRequest(
        $fileName,
        $transformOptions,
        $folderName
    );
        
    $response = $viewerApi->htmlTransformPages($request);
	
    echo "First Page Angle: ",  $response->getPages()[0]->getAngle();
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>