document.addEventListener("DOMContentLoaded", function () {
  var modal = document.getElementById("myModal");
  var modal1 = document.getElementById("pop_charge");
  var modal2 = document.getElementById("pop_tikets");
  var modal3 = document.getElementById("pop_image");
  var modal4 = document.getElementById("pop_comment");

  var btn = document.getElementById("myBtn");
  var msg = document.getElementById("msg");
  var span = document.querySelector(".close");
  var img = document.getElementById("myimage");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");

  // Vérifier si les éléments existent avant d'attacher des événements
  if (btn && modal && modal1 && modal2 && modal3) {
    btn.addEventListener("click", function () {
      modal.style.display = "block";
      modal1.style.display = "block";
      modal2.style.display = "none";
      modal3.style.display = "none";

      setTimeout(function () {
        modal2.style.display = "block";
        modal1.style.display = "none";
      }, 1500);
    });
  }

  if (msg) {
    msg.addEventListener("click", function () {
      modal.style.display = "block";
      modal4.style.display = "block";
      modal1.style.display = "none";
      modal2.style.display = "none";
      modal3.style.display = "none";

      // setTimeout(function () {
      //   modal2.style.display = "block";
      //   modal1.style.display = "none";
      // }, 1500);
    });
  }

  if (img && modal3) {
    img.addEventListener("click", function () {
      modal.style.display = "block";
      modal3.style.display = "block";
      modal1.style.display = "none";
      modal2.style.display = "none";

      modalImg.src = img.src;
      captionText.innerHTML = img.alt;
    });
  }

  if (span) {
    span.addEventListener("click", function () {
      modal.style.display = "none";
      modal1.style.display = "none";
      modal2.style.display = "none";
      modal3.style.display = "none";
    });
  }

  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
      modal1.style.display = "none";
      modal2.style.display = "none";
      modal3.style.display = "none";
    }
  });

  function openloader() {
    if (modal && modal1) {
      modal.style.display = "block";
      modal1.style.display = "block";
    }
    if (modal2) modal2.style.display = "none";
  }

  function closeloader() {
    setTimeout(function () {
      if (modal) modal.style.display = "none";
      if (modal1) modal1.style.display = "none";
      if (modal2) modal2.style.display = "none";
      if (modal3) modal3.style.display = "none";
    }, 10000); // 10 secondes
  }

  // Exposer les fonctions si nécessaire
  window.openloader = openloader;
  window.closeloader = closeloader;
});
