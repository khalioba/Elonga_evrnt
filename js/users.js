function getUsersByNumber() {
  openloader()
    var number = $('input[name="number"]').val();
    
    if (number === '') {
      alert('Le numéro de téléphone est obligatoire.');
    } else {

    var settings = {
        "url": "/api_matsuri/",
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
        console.log(response);
        closeloader()
        window.location.href = 'otp.php?number=' +'242'+ number;
      });
    }
}

function upUsers(number, otp) {
  
  var name = $('input[name="name"]').val();
  var first_name = $('input[name="first_name"]').val();
  // var title = $('input[name="title"]').val();
  // var email = $('input[name="email"]').val();
  // var age = $('input[name="age"]').val();
  // var gender = $('input[name="gender"]').val();
  var ville = $('select[name="ville"]').val();
  // var profile_image = $('input[name="profile_image"]').prop('files')[0];
  
  var data = {
    "api": "updateusers",
    "data": {
      "tel": number,
      "otp": otp,
      "name": name,
      "first_name": first_name,
      // "title": title,
      // "email": email,
      // "age": age,
      // "gender": gender,
      "ville": ville,
      // Assuming you want to include profile_image
    }
  };
  // alert('Number: ' + number + '\n' +
  //   'OTP: ' + otp + '\n' +
  //   'First Name: ' + first_name + '\n' +
  //   'Name: ' + name + '\n' +
  //   'City: ' + ville);

  var settings = {
    "url": "/api_matsuri/", // Adjusted URL to match your API endpoint
    "method": "POST",
    "timeout": 0,
    "headers": {
      "Content-Type": "application/json"
    },
    "data": JSON.stringify(data)
  };

  $.ajax(settings).done(function (response) {
    console.log(response);
    closeloader()
    window.location.href = 'index.php';
    if (response.status === 'error') {
      closeloader()
      console.error("Erreur: " + response.message);
      
    } else {
      // Traiter la réponse réussie ici
    }
  }).fail(function (xhr, status, error) {
    console.error(xhr.responseText);
    
  });
}

// function upUser(tel, otp) {
//   var formData = new FormData();
//   formData.append('tel', tel);
//   formData.append('otp', otp);
//   formData.append('name', document.getElementById('name').value);
//   formData.append('first_name', document.getElementById('first_name').value);
//   formData.append('title', document.getElementById('title').value);
//   formData.append('email', document.getElementById('email').value);
//   formData.append('age', document.getElementById('age').value);
//   formData.append('gender', document.getElementById('genre').value);
//   formData.append('ville', document.getElementById('ville').value);

//   var imageInput = document.getElementById('imageInput');
//   if (imageInput.files && imageInput.files[0]) {
//       var reader = new FileReader();
//       reader.onload = function(e) {
//           var base64Image = e.target.result;
//           formData.append('profil', base64Image);

//           sendRequest(formData);
//       }
//       reader.readAsDataURL(imageInput.files[0]);
//   } else {
//       formData.append('profil', '');
//       sendRequest(formData);
//   }
// }

// function sendRequest(formData) {
//   var data = {
//       "api": "updateuser",
//       "data": Object.fromEntries(formData.entries())
//   };

//   var settings = {
//       "url": "http://localhost/api_matsuri/",
//       "method": "POST",
//       "timeout": 0,
//       "headers": {
//           "Content-Type": "application/json"
//       },
//       "data": JSON.stringify(data),
//   };

//   $.ajax(settings).done(function (response) {
//       console.log(response);
//   });
// }




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