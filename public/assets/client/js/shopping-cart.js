function toggleChecked(element) {
    element.classList.toggle("checked");
}

document.querySelector(".option1").addEventListener("click",() => {
    document.querySelector(".option1").classList.add("active");
    document.querySelector(".option2").classList.remove("active");
    document.querySelector(".order").style.display = "unset";
    document.querySelector(".checkout").style.display = "none";

});

document.querySelector(".option2").addEventListener("click",() => {
    document.querySelector(".option1").classList.remove("active");
    document.querySelector(".option2").classList.add("active");
    document.querySelector(".order").style.display = "none";
    document.querySelector(".checkout").style.display = "unset";
});
