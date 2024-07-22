<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form id="updateUserForm">
  <input type="text" name="tel" placeholder="Telephone" required>
  <input type="text" name="otp" placeholder="OTP" required>
  <input type="text" name="name" placeholder="Name" required>
  <input type="text" name="first_name" placeholder="First Name" required>
  <input type="text" name="title" placeholder="Title" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="number" name="age" placeholder="Age" required>
  <input type="text" name="gender" placeholder="Gender" required>
  <input type="text" name="ville" placeholder="City" required>
  <input type="text" name="profile_picture" placeholder="Profile Picture URL" required>
  <button type="submit">Update User</button>
</form>

    

<script>$(document).ready(function() {
  $('#updateUserForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    var formData = $(this).serializeArray();
    var dataObject = {};

    formData.forEach(function(item) {
      dataObject[item.name] = item.value;
    });

    var settings = {
      "url": "localhost/api_matsuri/",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json"
      },
      "data": JSON.stringify({
        "api": "updateusers",
        "data": dataObject
      }),
    };

    $.ajax(settings).done(function(response) {
      console.log(response);
    });
  });
});

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>