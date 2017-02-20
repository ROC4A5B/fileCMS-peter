<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>title</title>
  <meta name="author" content="Peter Romijn">
  <meta name="description" content="Text file CMS">
  <link rel="stylesheet" href="style.css" type="text/css">
  </head>
<?php
  require 'filehandler.class.php';
  require 'view.class.php';
  if (ISSET($_POST['newFileSubmit'])) {
    $newFile = new filehandler($_POST['newFileName']);
    echo $newFile->createFile();
  }
  else if (ISSET($_GET['selectFile'])) {
    $selectedFile = new filehandler($_GET['fileName']);
    $selectedFile->openFile('r');
    $content = $selectedFile->readFile();

    $form = new view();
    $form = $form->createTextForm($_POST['fileName'], $content);
  }
  else if (ISSET($_POST['updateFile'])) {
    $updateFile = new filehandler('');
    $updateFile->setFileName($_POST['fileName']);
    $updateFile->updateFile($_POST['content']);
  }
  else if (ISSET($_POST['removeFile'])) {
    // Remove a file
    $removeFile = new fileHandler($_POST['fileName']);
    $removeFile->deleteFile();
  }
  else if (ISSET($_POST['fileInfo'])) {
    // Get the info form a file
    $fileInfo = new fileHandler($_POST['fileName']);
    $fileInfo->getFileExtentsion();
    $fileInfo->getFileSize();
  }
?>
  <body>
    <div class="row">
      <div class="col-12 no-padding">
        <img class="col-12 no-padding" src="logo.png" />
        <h1 class="col-12">File CMS</h1>
        <div class="col-2"></div>
        <div class="col-8">
          <form class="col-12" method="post">
            <div>Nieuw bestand</div>
            <input type="text" name="newFileName" />
            <input type="submit" value="Maak het bestand" name="newFileSubmit" />
          </form>
          <form method="get">
            <div>Selecteer het bestand</div>
            <?php

            $fileList = new filehandler('');
            echo $fileList->getFileList();

            ?>
            <input type="submit" name='selectFile' value="Haal het bestand op"/><input type="submit" name="removeFile" value="Verwijder het bestand"><input type="submit" name="fileInfo" value="Informatie over het bestand" />
          </form>
          <?php
            if (ISSET($form)) {
                echo $form;
            }
          ?>
        </div>
        <div class="col-2"></div>
        <div class="footer col-12 no-padding">Powered by SameBestDevelopment</div>
    </div>

  </body>
</html>
