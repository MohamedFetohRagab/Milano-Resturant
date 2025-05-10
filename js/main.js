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
  });
});

const bar = document.querySelector(`.bar`);
const links = document.querySelector(`.links`);

bar.addEventListener("click", () => {
  links.classList.toggle("open");
});
let i = 2;
setInterval(() => {
  document.querySelector(".landing img").src = `imgs/img${i++}.png`;
  if (i === 4) i = 1;
}, 5000);
