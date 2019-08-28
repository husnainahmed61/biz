var i=<?=$convo_id?>;

function timedCount()
{

	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                postMessage(this.responseText); //posts a message back to the HTML page.
            }
        };
        xmlhttp.open("GET","http://localhost:81/biz/public_html/profile/getMessagesByConvoId_WW/?convo_id="+i, true);
        xmlhttp.send();


                   
setTimeout("timedCount()",3000);
}

timedCount();
