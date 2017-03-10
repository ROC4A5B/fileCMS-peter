<?php

  class json {
    function createJsonObject($fileName, $fileType,$fileContent) {
      // This function creates a json object
      // The object name contains the Name of the object
      // Object key contains the name of the array name of the object
      // Object value contains the value of the objectKey
      $jsonObject = '"
        myObj = {
          "file" : {
            "name":"' . $fileName . '" {
              "fileType":"' . $fileType . '",
              "content":"' . $fileContent . '"
            }
            "name": "sander" {
              "fileType": "docx",
              "content": "fsdfdsafdsafdsafdsa"
            }
          }
        }
      "';
      return($jsonObject);
    }
    function decodeJson($sjonObject) {
      $jsonDecode = json_decode($sjonObject);
        echo "string";
        if ($jsonDecode->name == "peter") {
          echo $value->name;
      }
    }
  }
  $json = new json;
  $test = $json->createJsonObject("peter", "txt","gnjkfsnjkgf");
  // $json->decodeJson($test);
  echo $test;
  echo json_decode($test);
  var_dump(json_decode($test));

?>
