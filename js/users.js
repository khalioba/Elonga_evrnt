function getUsersByNumber() {
  openloader()
    var number = $('input[name="number"]').val();
    
    if (number === '') {
      alert('Le numéro de téléphone est obligatoire.');
    } else {

    var settings = {
        "url": apiurl,
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/json"
        },
        "data": JSON.stringify({
          "api": "createuser",
          "data": {
            "tel": '242'+number
          }
        }),
      };
      
      $.ajax(settings).done(function (response) {
        closeloader();
        window.location.href = 'otp.php?number=' +'242'+ number;
      });
    }
}

function upUsers(number, otp) {
  openloader();
  var name = $('input[name="name"]').val();
  var first_name = $('input[name="first_name"]').val();
  var ville = $('select[name="ville"]').val();
  
  if (first_name === '' || name === '') {
    alert('Le nom et le prénom sont obligatoires.');
  } else {

    var data = {
      "api": "updateusers",
      "data": {
        "tel": number,
        "otp": otp,
        "name": name,
        "first_name": first_name,
        "ville": ville,
      }
    };
  
    var settings = {
      "url": apiurl, // Adjusted URL to match your API endpoint
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json"
      },
      "data": JSON.stringify(data)
    };
  
    $.ajax(settings).done(function (response) {
      closeloader();
      window.location.href = 'index.php';
      if (response.status === 'error') {
        closeloader();
        
      } else {
        // Traiter la réponse réussie ici
      }
    }).fail(function (xhr, status, error) {
      console.error(xhr.responseText);
      
    });
  }
}



function setupImageUpload(iconId, inputId, previewId) {
  // Écouteur d'événement pour le clic sur l'icône
  document.getElementById(iconId).addEventListener('click', function() {
      document.getElementById(inputId).click();
  });

  // Écouteur d'événement pour le changement de l'input file
  document.getElementById(inputId).addEventListener('change', function(event) {
      const file = event.target.files[0];
      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              const img = document.getElementById(previewId);
              img.src = e.target.result;
          }
          reader.readAsDataURL(file);
      }
  });
}

// Utilisation de la fonction avec les identifiants d'éléments spécifiques
setupImageUpload('uploadIcon', 'imageInput', 'imagePreview');
setupImageUpload('uploadIcon2', 'imageInput2', 'imagePreview2');