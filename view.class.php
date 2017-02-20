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
         <input class="col-4" type="submit" name="updateFile" value="opslaan" />
       </form>
     ';
     return($form);
   }
 }

?>
