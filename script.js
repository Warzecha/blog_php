
window.onload = generateList;

function generateList() {

    let cookies = document.cookie;
    console.log(cookies)
    swapStyleSheet(cookies.split("=")[1]);

    let ul = document.getElementById("styles");
    let stylesList = [];

    for (let i = 0; (styl = document.getElementsByTagName("link")[i]); i++) {
        let title = document.getElementsByTagName("link")[i].getAttribute("href");
        if (document.getElementsByTagName("link")[i].getAttribute("id") != "pagestyle") {
            stylesList.push(title);
        }
    }

    for (let i = 0; i < stylesList.length; i++) {
        let liElem = document.createElement('li');
        liElem.innerHTML = stylesList[i].split(".")[0];
        liElem.setAttribute("styleName", stylesList[i]);
        liElem.addEventListener("click", liOnclick);
        ul.appendChild(liElem);
    }
}

// document.body.addEventListener("load", generateList, false);


function swapStyleSheet(sheet) {
    document.getElementById("pagestyle").setAttribute("href", sheet);
}

function liOnclick(event) {
    let liElem = event.target;
    let stylename = liElem.getAttribute("styleName");
    swapStyleSheet(stylename);
    document.cookie = "defaultStyle=" + stylename;
}



function getTime() {
    generateList()

    let date = new Date()
    let day = date.getDate();
    let monthIndex = date.getMonth();
    let year = date.getFullYear();

    let hour = date.getHours()
    let minute = date.getMinutes()
    let second = date.getSeconds()

    document.getElementById("dateInput").value = `${year}-${(monthIndex + 1).toString().padStart(2, '0')}-${(day).toString().padStart(2, '0')}`
    document.getElementById("timeInput").value = `${(hour).toString().padStart(2, '0')}:${(minute).toString().padStart(2, '0')}`
}

function checkDate(el) {
    let re = new RegExp('([0-9]{4})-([0-9]{2})-([0-9]{2})');
    let match = re.exec(el.value)

    if (match == null) {
        getTime()
    }

    if (parseInt(match[2]) > 12) {
        getTime()
    }

    if (parseInt(match[3]) > 31) {
        getTime()
    }
}

function checkTime(el) {
    let re = new RegExp('([0-9]{2}):([0-9]{2})');

    let match = re.exec(el.value)

    if (match == null) {
        getTime()
    }

    if (parseInt(match[1]) > 24) {
        getTime()
    }

    if (parseInt(match[2]) > 59) {
        getTime()
    }
}

function addedFile() {
    let input = document.createElement("INPUT");        // Create a <button> element
    input.type = "file"
    input.onclick = addedFile

    let div = document.getElementById('defaultFile');
    div.parentNode.insertBefore(input, div);
}

