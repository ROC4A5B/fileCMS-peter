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

  <script src="main.js"></script>
  </head>
  <?php
  require 'filehandler.class.php';
  require 'view.class.php';

  ?>
  <body onload="getFileList();">
    <div class="row">
      <div class="col-12 no-padding">
        <img class="col-12 no-padding" src="logo.png" />
        <h1 class="col-12">File CMS</h1>
        <div class="col-2"></div>
        <div class="col-8">

          <form class="col-12" action="ctrl.filehandler.php" method="post">
            <div>Nieuw bestand</div>
            <input type="text" id="newFileName" name="newFileName" />
            <button type="button" onclick='handlerControler("create", newFileName);'>Create file</button>
          </form>
          <div id="fileList"></div>
          <div id="editor"></div>
          <div id="result"></div>
        </div>
        <div class="col-2"></div>
        <div class="footer col-12 no-padding">Powered by SameBestDevelopment</div>
    </div>

  </body>
</html>
