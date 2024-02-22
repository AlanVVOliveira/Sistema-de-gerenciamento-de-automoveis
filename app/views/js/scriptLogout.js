// Fechar Modal
function mostrar() {
  let el = document.getElementById("meuModal");
  let meuModal = new bootstrap.Modal(el);
  meuModal.show();
};

// Logout
$(document).ready(function() {
  $("#btnSairPagina").click(function() {
      $.post("../controllers/logout.php").done(function(data) {
          window.location.replace("../../index.php");
      })
  });
});