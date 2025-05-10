let list = document.querySelectorAll(".menu ul a ");
list.forEach(function (btn) {
  btn.addEventListener("click", function (ev) {
    ev.preventDefault();

    const seendiv = document.querySelector(
      `.${ev.target.textContent.toLowerCase()}`
    );

    if (seendiv.classList.contains("active")) {
      seendiv.classList.remove("active");
      return;
    }

    document.querySelectorAll(`.menu .container > div`).forEach((div) => {
      div.classList.remove("active");
    });

    seendiv.classList.add("active");

    setTimeout(() => {
      seendiv.scrollIntoView({
        behavior: "smooth",
      });
    }, 500);
  });
});

let myselect = document.querySelector(`form select`);
let options = document.querySelectorAll(`form select option`);
let input_1 = document.getElementById("large");
let input_2 = document.getElementById("medium");
let input_3 = document.getElementById("small");
let optvalue;
let form_Members = document.forms[0].children;
myselect.addEventListener("change", function () {
  optvalue = this.value;
  if (optvalue === "pizza") {
    form_Members[4].textContent = "Large";
    form_Members[6].textContent = "Medium";
    form_Members[6].style.display = "block";
    form_Members[8].style.display = "block";
    input_2.style.display = "block";
    input_3.style.display = "block";
  }
  if (
    optvalue === "burger" ||
    optvalue === "crepe" ||
    optvalue === "macaroni" ||
    optvalue === "additions"
  ) {
    form_Members[4].textContent = "Price";
    form_Members[6].style.display = "none";
    form_Members[8].style.display = "none";
    input_2.style.display = "none";
    input_3.style.display = "none";
  }
  if (optvalue === "sandwiches") {
    form_Members[6].textContent = "سورى";
    form_Members[4].textContent = "فرنساوي";
    form_Members[6].style.display = "block";
    form_Members[8].style.display = "none";
    input_3.style.display = "none";
  }
});
