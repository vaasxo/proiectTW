function showMenu(){
    let menuStyle=document.getElementById("profile-menu").style.display;
    if(menuStyle==="flex")
        document.getElementById("profile-menu").style.display="none";
    else
        document.getElementById("profile-menu").style.display="flex";

}