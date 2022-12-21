const modal = document.getElementById("myModal");
const addListDiv = document.querySelector("section.lists div.addList i");
const closePopUp = document.getElementsByClassName("close")[0];

const popup = () => {
    modal.style.display = "block";
    addListDiv.classList.add("active");
}

addListDiv.addEventListener('click', popup);

closePopUp.addEventListener('click', function () {
    modal.style.display = "none";
    addListDiv.classList.remove("active");
})

window.addEventListener('click', function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
        addListDiv.classList.remove("active");
    }
})