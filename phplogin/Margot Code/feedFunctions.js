
function display(){
    
     var li = document.createElement("li");
    var message = document.getElementById("msg").value;
    var t = document.createTextNode(message);
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    
    li.appendChild(t);
    
    if(message !== ""){
        document.getElementById("myList").appendChild(li);
    }
    
    document.getElementById("message").value = "";

   
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);

    for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
        var div = this.parentElement;
        div.style.display = "none";
        }
    }
    
    
}
