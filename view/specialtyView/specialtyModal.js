document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("modal");
  const btnAdd = document.getElementById("btnAdd");
  const btnClose = document.getElementById("btnClose");
  const inputId = document.getElementById("inputId");
  const inputName = document.getElementById("inputName");
  const editButtons = document.querySelectorAll(".btn-edit");

  editButtons.forEach(btn => {
    btn.addEventListener("click", () => {
      const id = btn.getAttribute("data-id");
      const name = btn.getAttribute("data-name");
      inputId.value = id;
      inputName.value = name;
      modal.classList.remove("hidden");
    });
  });

  btnAdd.addEventListener("click", () => {
    inputId.value = "";
    inputName.value = "";
    modal.classList.remove("hidden");
  });

  btnClose.addEventListener("click", () => {
    modal.classList.add("hidden");
  });

  // Cerrar modal si se hace clic fuera del contenido
  modal.addEventListener("click", (e) => {
    if (e.target === modal) modal.classList.add("hidden");
  });
});
