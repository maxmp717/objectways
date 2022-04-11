// fetch('nav.html')
// .then(res => res.text())
// .then(text => {
//     let oldelem = document.querySelector("#replace_with_navbar");
//     let newelem = document.createElement("<br>");
//     newelem.innerHTML = text;
//     oldelem.parentNode.replaceChild(newelem,oldelem);
// })
const nav = document.querySelector('.navbar')
fetch('/nav.html')
.then(res=>res.text())
.then(data=>{
  nav.innerHTML=data
})