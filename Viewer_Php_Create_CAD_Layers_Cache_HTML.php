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
    $fileName = "sample.DXF";

	$cadOptions = new \GroupDocs\Viewer\Model\CadOptions();
	$cadOptions->layers = array("SLD-0", "DEFAULT_3");

    $htmlOptions = new \GroupDocs\Viewer\Model\HtmlOptions();
    $htmlOptions->setEmbedResources(true);
	$htmlOptions->cadOptions = $cadOptions;

    $request = new Requests\HtmlCreatePagesCacheRequest($fileName);
    $request->htmlOptions = $htmlOptions;            
    
    $response = $viewerApi->htmlCreatePagesCache($request);
	
    echo "CAD -  Pages Count: ",  count($response->getPages());
    echo "CAD - FileName: ",  $response->getFileName();
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>