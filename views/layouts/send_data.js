function send_data(){
    const formData = document.forms.namedItem('autograph-data');
    formData.addEventListener('submit',function (ev){
        var oOutput = document.getElementsByName("tags"),
            oData = new FormData(formData);
        const xmlhttp = new XMLHttpRequest();
        const url = "/upload";
        xmlhttp.open("POST",url,true);
        xmlhttp.onload = function (oEvent){
            if(xmlhttp.status==200){
                document.getElementById("result").innerHTML=xmlhttp.responseText;
            }else{
                document.getElementById("result").innerHTML=xmlhttp.responseText;
            }
        };
        xmlhttp.send(oData);
        ev.preventDefault();
    }, false);
}