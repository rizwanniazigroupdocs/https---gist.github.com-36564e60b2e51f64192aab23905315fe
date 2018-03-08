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
    $fileName = "one-page.docx";
    $pageNumber = 1;
  
    $request = new Requests\HtmlGetPageRequest($fileName, $pageNumber);
    $request->enableResponsiveRendering = true;
    $request->embedResources = true;
            
    $page = $viewerApi->htmlGetPage($request);
	
    echo "Page HTML: ",  $page;
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>