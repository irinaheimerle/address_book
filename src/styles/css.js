import "../styles/global.scss";


document.getElementById("filter_months").addEventListener("click", () => {
    if(document.getElementById("show_months").style.display == "none") document.getElementById("show_months").style.display = "flex";
    if(document.getElementById("show_months").style.display == "flex") document.getElementById("show_months").style.display = "none" ;
});
