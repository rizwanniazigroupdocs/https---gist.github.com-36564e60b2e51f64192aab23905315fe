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
    $resourcesPath = "./r/{resource-name}";

    $request = new Requests\HtmlGetZipWithPagesRequest($fileName);
    $request->resourcePath = $resourcesPath;
    $request->folder = $folderName;
            
    $response = $viewerApi->htmlGetZipWithPages($request);
	
    echo "Document Processed.",  "";
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>