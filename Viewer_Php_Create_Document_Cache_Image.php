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

    $request = new Requests\ImageCreatePagesCacheRequest($fileName);
    $request->folder = $folderName;
    $request->imageOptions = new \GroupDocs\Viewer\Model\ImageOptions();
    $request->imageOptions->setFormat("jpg");
            
    $response = $viewerApi->imageCreatePagesCache($request);
	
    echo "Expected response type is ImagePageCollection where PageCount is : ",  count($response->getPages());
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>