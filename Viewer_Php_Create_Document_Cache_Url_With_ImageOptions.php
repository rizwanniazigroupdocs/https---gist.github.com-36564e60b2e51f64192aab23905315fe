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
    $fileUrl = "https://www.dropbox.com/s/umokluz338w4ng7%2fone-page.docx";
    $folderName = null;

    $ImageOptions = new \GroupDocs\Viewer\Model\ImageOptions();
    $ImageOptions->setFormat("jpg");
    $ImageOptions->wordsOptions = new \GroupDocs\Viewer\Model\WordsOptions();

    $request = new Requests\ImageCreatePagesCacheFromUrlRequest($fileUrl, $ImageOptions);
    $request->folder = $folderName;
            
    $response = $viewerApi->imageCreatePagesCacheFromUrl($request);

    echo "Expected response type is ImagePageCollection where PageCount is : ",  count($response->getPages());
  } 
  catch (Exception $e) 
  {
    echo  "Something went wrong: ",  $e->getMessage(), "\n";
    PHP_EOL;
  }
?>