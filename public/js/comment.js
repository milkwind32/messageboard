let btn_comment = document.getElementById("btn-comment");
let comment = document.getElementById("comment");

btn_comment.addEventListener("mouseover",function() {  
    this.style.background = "#000050";
    this.style.cursor="pointer";
})

btn_comment.addEventListener("mouseout",function() {  
    this.style.background = "#000090";
})

btn_comment.addEventListener("click",function() {  
    if(comment.style.display == "none"){
        comment.style.display = "block";              
    } else {
        comment.style.display = "none";              
    }
})