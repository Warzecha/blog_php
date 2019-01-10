

function sendMessage() {
    console.log("Send");

	var nickValue = encodeURIComponent(document.getElementById("nick").value); 
	var messageValue = encodeURIComponent(document.getElementById("message").value); 
    var blogValue = encodeURIComponent(document.getElementById("blog").value); 
    
    if(nickValue=="") {
        alert("Please specify your nickname")
        return
    }
    if(messageValue=="") {
        alert("Please specify the message")
        return
    }



    var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    console.log(document)


	xmlhttp.open("POST", "send.php?message="+messageValue+"&nick="+nickValue+"&blog="+blogValue, true); 
	xmlhttp.send();
	
	
	document.getElementById("message").value = ""; 
    
}