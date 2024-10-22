<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<div id="choice">
    <img src="img/boutons/switch/a.png" onclick="selectButton('A')">
    <img src="img/boutons/switch/b.png" onclick="selectButton('B')">
    <img src="img/boutons/switch/x.png" onclick="selectButton('X')">
    <img src="img/boutons/switch/y.png" onclick="selectButton('Y')">
    <img src="img/boutons/switch/up.png" onclick="selectButton('UP')">
    <img src="img/boutons/switch/down.png" onclick="selectButton('DOWN')">
    <img src="img/boutons/switch/left.png" onclick="selectButton('LEFT')">
    <img src="img/boutons/switch/right.png" onclick="selectButton('RIGHT')">
    <i class="fas fa-plus" onclick="selectButton('+')" style="font-size:30px;margin: 1px;"></i>
    <button onclick="reset()">Reset</button>
</div>
<textarea cols="100" rows="1" name="result" id="valCode" hidden></textarea>
<div id="result">

</div>

<script>
    window.onload = reset();
    function reset() {
        document.getElementById("valCode").value="";
        document.getElementById("result").innerHTML="";
    }
    function selectButton(b){
        var result = document.getElementById("result");
        var valCode= document.getElementById("valCode");
        var html = document.createElement('img');
        if(b=='+'){ html =document.createElement('i');}
        switch (b) {
            case "A" :
                html.setAttribute("src", "img/boutons/switch/a.png");
                valCode.value += "A ";
                break;
            case "B" :
                html.setAttribute("src", "img/boutons/switch/b.png");
                valCode.value += "B ";
                break;
            case "X" :
                html.setAttribute("src", "img/boutons/switch/x.png");
                valCode.value += "X ";
                break;
            case "Y" :
                html.setAttribute("src", "img/boutons/switch/y.png");
                valCode.value += "Y ";
                break;
            case "LEFT" :
                html.setAttribute("src", "img/boutons/switch/left.png");
                valCode.value += "LEFT ";
                break;
            case "RIGHT" :
                html.setAttribute("src", "img/boutons/switch/right.png");
                valCode.value += "RIGHT ";
                break;
            case "UP" :
                html.setAttribute("src", "img/boutons/switch/up.png");
                valCode.value += "UP ";
                break;
            case "DOWN" :
                html.setAttribute("src", "img/boutons/switch/down.png");
                valCode.value += "DOWN ";
                break;
            case "+":
                html.setAttribute("class","fas fa-plus");
                html.setAttribute("style","font-size:30px; margin: 1px;");
                valCode.value += "+ ";

        }
        result.append(html);
    }
</script>