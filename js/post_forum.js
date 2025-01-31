function messagess() {
  openloader();

  var id_event = $('input[name="id_event"]').val();
  var messages = $("#message").val();
  var user = $('input[name="user"]').val();

  var settings = {
    url: apiurl,
    method: "POST",
    timeout: 0,
    headers: {
      "Content-Type": "application/json",
    },
    data: JSON.stringify({
      api: "postforums",
      data: {
        id_event: id_event,
        id_user: user,
        message: messages,
      },
    }),
  };

  $.ajax(settings)
    .done(function (response) {
      console.log("Réponse du serveur:", response);
      // alert("Message envoyé avec succès !");

      // 🔄 Rafraîchir la page après 1 seconde
      setTimeout(function () {
        location.reload();
      }, 1000);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
      console.error("Erreur AJAX:", textStatus, errorThrown);
      alert("Une erreur s'est produite lors de l'envoi du message.");
    })
    .always(function () {
      closeloader();
    });
}
