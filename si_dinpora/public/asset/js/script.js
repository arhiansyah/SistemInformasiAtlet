function showHide() {
    let btn_icon = document.getElementById("button__icon");
    let btn_text = document.getElementById("button__text");
    let btn = document.getElementById("filter-btn");
    let x = document.getElementById("filter");
    if (x.style.display === "none") {
        x.style.display = "inline-flex";
        btn_icon.style.color = "#fff";
        btn_text.style.color = "#fff";
        btn.style.background = "#A9C530";
    } else {
        x.style.display = "none";
        btn_icon.style.color = "#A9C530";
        btn_text.style.color = "#A9C530";
        btn.style.background = "#fff";
    }
}
// function deleteTerpilih() {
//     console.log("delete yg terpilih!!");
// }
