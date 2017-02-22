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
function removeFile(fileName) {
  console.log(fileName);
  // Remove the file
  fileName = fileName.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("result").innerHTML = this.responseText;
     console.log(this.responseText);
     getFileList();
    }
  };

  var postParameters = "todo=delete&fileName=" + fileName ;
  // contains te post values
  xhttp.open("POST", "ctrl.filehandler.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
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
     console.log(this.responseText);
    }
  };

  var postParameters = "todo=getFileList";
  // contains te post values
  xhttp.open("POST", "ctrl.filehandler.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function getFileInfo(fileName) {
  // Get the file info from a file
  fileName = fileName.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("result").innerHTML = this.responseText;
    }
  };

  var postParameters = "todo=info&fileName=" + fileName;
  // contains te post values
  xhttp.open("POST", "ctrl.filehandler.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function createFile(fileName) {
  // Create the file nam
  fileName = fileName.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("result").innerHTML = this.responseText;
     getFileList();
    }
  };

  var postParameters = "todo=create&fileName=" + fileName;
  // contains te post values
  xhttp.open("POST", "ctrl.filehandler.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
