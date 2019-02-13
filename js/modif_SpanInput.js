function toInput(id,type) {
    var input = document.createElement("input");
    input.type=type;
    input.setAttribute("onfocusout","toSpan(\'"+id+"\')");
    input.setAttribute("id",id);
    input.value=document.getElementById(id).textContent;
    console.log(input);
    document.getElementById(id).replaceWith(input);
    document.getElementById(id).focus();
}
function toSpan(id) {
    var span = document.createElement("SPAN");
    var typeInput=document.getElementById(id).type;
    span.setAttribute("onClick","toInput(\'"+id+"\',\'"+typeInput+"\')");
    span.setAttribute("id",id);
    var text = document.createTextNode(document.getElementById(id).value);
    span.appendChild(text);
    console.log(span);
    document.getElementById(id).replaceWith(span);
}