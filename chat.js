


function refreshChat() {
    let chat_messages = document.getElementById("chat_messages")
    chat_messages.innerHTML = ""

    pollServer()
}

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
    

    if(isActive()) {
        xmlhttp.open("POST", "send.php?message="+messageValue+"&nick="+nickValue+"&blog="+blogValue, true); 
        xmlhttp.send();
        
        
        document.getElementById("message").value = "";
        getMessages() 
        
    }

    
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
        
        window.setTimeout(function () {
            getMessages()
        }, 2500);
    }
}


function getMessages() {

    if(isActive()) {
        document.getElementById("nick").disabled = false;
        document.getElementById("message").disabled = false;
    } else
    {
        document.getElementById("nick").setAttribute("disabled", true);
        document.getElementById("message").setAttribute("disabled", true);
    }





    if (isActive()) {
        
        let blogValue = encodeURIComponent(document.getElementById("blog").value);
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
                chat_messages.scrollTop = chat_messages.scrollHeight;
                pollServer();
            },
            error: function () {
                //ERROR HANDLING
                pollServer();
            }});

    } else {

        chat_messages.innerHTML = ""

    }
}
