console.log("working")

let modal = document.getElementById("modal");
let btn = document.getElementById("new_activity");


console.log(modal);
console.log(btn);


btn.addEventListener("click", () => {
    modal.style.display = "flex";
});

window.addEventListener("click", (event) =>{
    if(event.target == modal) {
        modal.style.display = "none";
    }
});






//btn.onclick = function() {
//    modal.style.display = "flex";
//};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}