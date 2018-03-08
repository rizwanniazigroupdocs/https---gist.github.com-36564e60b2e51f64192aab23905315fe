<?php
  use GroupDocs\Viewer\Model\Requests;
  require_once('C:\xampp\htdocs\groupdocs-viewer-cloud-php-master\vendor\autoload.php');

  //TODO: Get your AppSID and AppKey at https://dashboard.groupdocs.cloud (free registration is required).

  $configuration = new GroupDocs\Viewer\Configuration();
  $configuration->setAppSid("XXXX-XX");
  $configuration->setAppKey("XXXX");

  $viewerApi = new GroupDocs\Viewer\ViewerApi($configuration); 

  try 
  {
    $fileName = "sample.mpp";

	$projectOptions = new \GroupDocs\Viewer\Model\ProjectOptions();
	$projectOptions->setPageSize("A4");
	$projectOptions->setTimeUnit("Unknown");

    $htmlOptions = new \GroupDocs\Viewer\Model\HtmlOptions();
    $htmlOptions->setEmbedResources(true);
	$htmlOptions->projectOptions = $projectOptions;

    $request = new Requests\HtmlCreatePagesCacheRequest($fileName);
    $request->htmlOptions = $htmlOptions;            
    
    $response = $viewerApi->htmlCreatePagesCache($request);
	
    echo "Project - Pages Count: ",  count($response->getPages());
    echo "Project - FileName: ",  $response->getFileName();
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>