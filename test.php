<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="file"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form id="updateUserForm">
        <label for="tel">Telephone</label>
        <input type="text" id="tel" name="tel" value="242067848359">

        <label for="otp">OTP</label>
        <input type="text" id="otp" name="otp" value="108507">

        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="aaaa">

        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="aaa">

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="Maaar">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="live@reveurs.pro">

        <label for="age">Age</label>
        <input type="number" id="age" name="age" value="12">

        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="homme" selected>Homme</option>
            <option value="femme">Femme</option>
        </select>

        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville" value="p-n">

        <label for="profil">Profile Image</label>
        <input type="file" id="profil" name="profil" accept="image/*">

        <button type="submit">Update User</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('updateUserForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var formData = new FormData(this);
            var imageFile = formData.get('profil');
            var reader = new FileReader();

            reader.onloadend = function () {
                var base64Image = reader.result;

                var data = {
                    "api": "updateuser",
                    "data": {
                        "tel": formData.get('tel'),
                        "otp": formData.get('otp'),
                        "name": formData.get('name'),
                        "first_name": formData.get('first_name'),
                        "title": formData.get('title'),
                        "email": formData.get('email'),
                        "age": formData.get('age'),
                        "genre": formData.get('gender'),
                        "ville": formData.get('ville'),
                        "profil": base64Image
                    }
                };

                var settings = {
                    "url": "http://localhost/api_matsuri/",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify(data),
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                });
            };

            if (imageFile) {
                reader.readAsDataURL(imageFile);
            } else {
                var data = {
                    "api": "updateuser",
                    "data": {
                        "tel": formData.get('tel'),
                        "otp": formData.get('otp'),
                        "name": formData.get('name'),
                        "first_name": formData.get('first_name'),
                        "title": formData.get('title'),
                        "email": formData.get('email'),
                        "age": formData.get('age'),
                        "genre": formData.get('gender'),
                        "ville": formData.get('ville'),
                        "profil": ""
                    }
                };

                var settings = {
                    "url": "http://localhost/api_matsuri/",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify(data),
                };

                $.ajax(settings).done(function (response) {
                    console.log(response);
                });
            }
        });
    </script>
</body>
</html>
