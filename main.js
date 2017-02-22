function ajaxPost(ticketType) {
  // This function performs a post request
  // ticketType contains te information if the ticket is update of is created
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("content").innerHTML = this.responseText;
     enableEditor();
     loader('loaded');
    }
    else {
      // If the page is loading
      loader('load');
    }
  };
  var company = encodeURIComponent(document.getElementById("company").value);
  var contact = encodeURIComponent(document.getElementById("contact").value);
  var phonenumber = encodeURIComponent(document.getElementById("phonenumber").value);
  var problemtitle = encodeURIComponent(document.getElementById("problemtitle").value);
  var problem = encodeURIComponent(document.getElementById("problem").value);
  var solutions = encodeURIComponent(document.getElementById("solutions").value);
  var status = encodeURIComponent(document.getElementById("status").value);
  var sendUser = encodeURIComponent(document.getElementById("sendUser").value);
  var sendTo = encodeURIComponent(document.getElementById("sendTo").value);

  var postParameters = "company=" + company + "&contact=" + contact + "&phonenumber=" + phonenumber + "&problemtitle=" + problemtitle + "&problem=" + problem + "&solutions=" + solutions + "&status=" + status + "&sendUser=" + sendUser + "&sendTo=" + sendTo + "&newTicket=" + 'opslaan';
  // contains te post array
  xhttp.open("POST", "ticket.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function updateFile(fileName, content) {
  // This function saves a file
  fileName = fileName.value;
  content = content.value;
  console.log("naam " + fileName);
  console.log("content "+content);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("result").innerHTML = this.responseText;
     console.log(this.responseText);
    }
  };

  var postParameters = "todo=update&content=" + content + "&fileName=" + fileName;
  // contains te post values
  xhttp.open("POST", "ctrl.filehandler.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
// function transformArrayToFiles(string) {
//   // This function we use to transform a string to an array
//   // var shoplistArray = shoplist.split(" ");
//
//   var stringToArray = string.value;
//   console.log(stringToArray);
//   var array = stringToArray.split(",");
//   // converting to a array
//   // Remove the ","
//
//   for (var i = 0; i < array.length; i++) {
//     // reads the array
//     // Sends a value from the array to the handlerController that create the file
//     handlerControler('create', array[i]);
//   }
// }


function getFile(fileName) {
  // Get the file
  fileName = fileName.value;
  // Get the file value
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("editor").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "ctrl.filehandler.php?todo=read&fileName=" + fileName, true);
  xhttp.send();
}
function getFileList() {
  // get the file list form the controler
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("fileList").innerHTML = this.responseText;
    }
  };

  var postParameters = "todo=getFileList";
  // contains te post values
  xhttp.open("POST", "ctrl.filehandler.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function handlerControler(action, fileName) {
  // This function makes a post request
  // The info that is returned will be showed in the #result
  // We use POST request
  // In the action contains the todo
    // So create or delete
  fileName = fileName.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("result").innerHTML = this.responseText;
       getFileList();
      }
    };

    var postParameters = "todo=" + action +"&fileName=" + fileName;
    // contains te post values
    xhttp.open("POST", "ctrl.filehandler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(postParameters);
}
