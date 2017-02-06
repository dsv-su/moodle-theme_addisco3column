

function toggle5(showHideDiv, switchImgTag) {
        var ele = document.getElementById(showHideDiv);
        var imageEle = document.getElementById(switchImgTag);
        if(ele.style.display == "block") {
                ele.style.display = "none";
                document.getElementById("downer").className = document.getElementById("downer").className.replace(/\bshowinfo\b/,'');
                 document.getElementById("downer-info").className = document.getElementById("downer-info").className.replace(/\bshowpanel\b/,'');
		
        }
        else {
                ele.style.display = "block";
                document.getElementById("downer-info").className += " showpanel";
                document.getElementById("downer").className += " showinfo";
               
        }
}

