

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
    


	xmlhttp.open("POST", "send.php?message="+messageValue+"&nick="+nickValue+"&blog="+blogValue, true); 
	xmlhttp.send();
	
	
	document.getElementById("message").value = ""; 
    
}


$(document).ready(function () {
    //your code here
    pollServer();
  });



function isActive() {
     return document.getElementById("enable_chat").checked
    
}

function pollServer()
{
    if (isActive())
    {
        let blogValue = encodeURIComponent(document.getElementById("blog").value);
        window.setTimeout(function () {
            $.ajax({
                url: "messages.php?blog="+blogValue,
                type: "GET",
                success: function (result) {
                    //SUCCESS LOGIC
                    console.log("OK")
                    // console.log(result)
                    let chat_messages = document.getElementById("chat_messages")

                    chat_messages.innerHTML = ""

                    let lines = result.split('\n')
                    // console.log(lines)
                    lines.forEach(element => {
                        let message = document.createElement('p');
                        message.innerHTML = element
                        chat_messages.appendChild(message)
                    });
                    // console.log(lines)

                    pollServer();
                },
                error: function () {
                    //ERROR HANDLING
                    pollServer();
                }});
        }, 2500);
    }
}

