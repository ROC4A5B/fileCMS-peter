<?php

 class view{
   // This function creates views
   function createTextForm($fileName,$content) {
     $form = '
       <form class="col-12" action="ctrl.filehandler.php" method="post">
         <div>Bestandsnaam</div>
         <input type="text" name="fileName" id="fileName" value="' . $fileName . '"/>
         <div>Content</div>
         <textarea class="col-12" id="content" name="content">' . $content . '</textarea>
         <button type="button" class="col-4 save-button" onclick="updateFile(fileName, content);">Update File</button>
       </form>
     ';
     return($form);
   }
   function createFileList($fileList) {
     // Create the file list form
     $itemsFromTheDirectory = '<form id="fileListForm" method="post"><div>Selecteer het bestand</div>';
     $itemsFromTheDirectory .= "<select name='fileName' id='fileName'>";
     foreach ($fileList as $value) {
       $itemsFromTheDirectory .= "<option value='" . $value ."'>" .$value . "</option>";
     }
     $itemsFromTheDirectory .= "</select>";
     $itemsFromTheDirectory .= "<button type='button' onclick='handlerControler(".'"info"'.", fileName);'>File info</button><button type='button' onclick='handlerControler(".'"delete"'.", fileName);'>Remove</button><button type='button' onclick='getFile(fileName);'>Read</button>";
     $itemsFromTheDirectory .= '</form>';
     return($itemsFromTheDirectory);
   }
 }

?>
