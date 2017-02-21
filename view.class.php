<?php

 class view{
   // This function creates views
   function createTextForm($fileName,$content) {
     $form = '
       <form class="col-12" method="post">
         <div>Bestandsnaam</div>
         <input type="text" name="fileName" value="' . $fileName . '"/>
         <div>Content</div>
         <textarea class="col-12" name="content">' . $content . '</textarea>
         <input class="col-4 save-button" type="submit" name="updateFile" value="opslaan" />
       </form>
     ';
     return($form);
   }
   function createFileList($fileList) {
     // Create the file list form
     $itemsFromTheDirectory = '<form method="post"><div>Selecteer het bestand</div>';
     $itemsFromTheDirectory .= "<select name='fileName'>";
     foreach ($fileList as $value) {
       $itemsFromTheDirectory .= "<option value='" . $value ."'>" .$value . "</option>";
     }
     $itemsFromTheDirectory .= "</select>";
     $itemsFromTheDirectory .= '<input type="submit" name="selectFile" value="Haal het bestand op"/><input type="submit" name="removeFile" value="Verwijder het bestand"><input type="submit" name="fileInfo" value="Informatie over het bestand" />';
     $itemsFromTheDirectory .= '</form>';
     return($itemsFromTheDirectory);
   }
 }

?>
