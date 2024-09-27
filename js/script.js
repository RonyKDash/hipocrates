(function () {
  const arrows = document.querySelectorAll(".arrow");
  arrows.forEach((arrow) => {
    arrow.addEventListener("click", (event) => {
      const arrowParent = event.target.parentElement.parentElement;
      arrowParent.classList.toggle("showMenu");
    });
  });

  const sidebar = document.querySelector(".sidebar");
  const sidebarButton = document.querySelector(".bx-menu");
  sidebarButton.addEventListener("click", () => {
    sidebar.classList.toggle("close");
  });

  const nextButton = document.getElementById("next");
  nextButton.onclick = function () {
    const lists = document.querySelectorAll(".item");
    document.getElementById("slide").appendChild(lists[0]);
  };

  const prevButton = document.getElementById("prev");
  prevButton.onclick = function () {
    const lists = document.querySelectorAll(".item");
    document.getElementById("slide").prepend(lists[lists.length - 1]);
  };
})();
