<?php
require 'filehandler.class.php';
require 'view.class.php';
// var_dump($_REQUEST);
// Controler for the form
if (ISSET($_REQUEST['todo'])) {
  switch ($_REQUEST['todo']) {
    case 'create':
      $newFile = new filehandler($_REQUEST['fileName']);
      echo $newFile->createMultipleFiles($_REQUEST['fileName']);
      break;
    case 'read':
      $selectedFile = new filehandler($_REQUEST['fileName']);
      $selectedFile->openFile('r');
      $content = $selectedFile->readFile();

      $form = new view();
      $form = $form->createTextForm($_REQUEST['fileName'], $content);
      echo $form;
      break;
    case 'delete':
    $removeFile = new fileHandler($_REQUEST['fileName']);
    echo $removeFile->deleteFile();
      break;
    case 'update':
      $updateFile = new filehandler('');
      $updateFile->setFileName($_REQUEST['fileName']);
      $updateFile = $updateFile->updateFile($_REQUEST['content']);
      echo $updateFile;
      break;
    case 'info':
      $fileInfo = new fileHandler($_REQUEST['fileName']);
      echo $fileInfo->getFileExtentsion();
      echo "<br />";
      echo $fileInfo->getFileSize();
      break;
    case 'getFileList':
      $fileList = new filehandler('');
      $fileList = $fileList->getFileList();
      $view = new view();
      echo $view->createFileList($fileList);
  }
}

  // header("Location: {$_SERVER['HTTP_REFERER']}");
  // exit;
?>
