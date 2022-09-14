let btn = document.getElementById("btn");
let collection = document.getElementsByClassName('fix');

btn.addEventListener("click",function() {       
    for (let i = 0; i < collection.length; i++) {
        if(collection[i].style.visibility == "visible") {
            collection[i].style.visibility = "hidden";            
        } else {        
            collection[i].style.visibility = "visible";           
        }       
    }
})
