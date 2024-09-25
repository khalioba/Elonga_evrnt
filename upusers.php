<?php 
session_start();
include('include/inscription_header.php');
$cookie_value = $_COOKIE['rememberMe'] ?? '';

list($cookie_number, $cookie_otp) = explode('|', $cookie_value, 2);

if ($cookie_number && $cookie_otp) {
    $api_url = $apiurl .'getuser/' . $cookie_number . '/' . $cookie_otp;
    $options = [
        "http" => [
            "header" => "Accept: application/json\r\n",
            "method" => "GET"
        ]
    ];
    $context = stream_context_create($options);
    $data = file_get_contents($api_url, false, $context);
    if ($data === FALSE) {
        $sms = 'Erreur lors de la récupération des données depuis l\'API.';
    }
    $result = json_decode($data, true);
    
    if ($result && isset($result[0])) {
        $user_id = $result[0]['id_user'];

        if ($result[0]['ville'] === null) {
            $ville = 'ville';
        } else {
            $ville = $result[0]['ville'];
        };

        if ($result[0]['genre'] === null) {
            $genre = 'genre';
        } else {
            $genre = $result[0]['genre'];
        }

        ?>
        <center>
            <div class="welcome_text space">
                <p class="welcom_text1">Plus qu’une étape à franchir, ajoutez vos informations</p>
            </div><br><br>
           
            <div class="informations space">
                <div class="inscription_box">
                    <div class="form" id="contactForm">
                    <div class="icon-wrapper" id="uploadIcon">
                        <?php 
                                if ($result[0]['profil'] === '' or $result[0]['profil'] === NULL) {
                                    $img = 'image/profil.png';
                                } else {
                                    $img = $result[0]['profil'];
                                }
                                ?>
                <div class="imageviw">
                    <img class="imagep" id="imagePreview" src="<?= $img ?>" style="max-width: 300px;">
                </div>
            </div>
            <input type="file" name="profile_image" id="imageInput" accept="image/*"> 
<br><br>
                        <input class="styleinput" type="text" name="name" id="name" placeholder="Nom" required value="<?= $result[0]['name'] ?>"><br><br>

                        <input class="styleinput" type="text" name="first_name" id="first_name" placeholder="Prénom" required value="<?= $result[0]['first_name'] ?>"><br><br>

                        <select class="styleinput" id="ville" name="ville">
                        <option value="<?= $ville ?>"><?= $ville ?></option>
                            <option value="Brazzaville">Brazzaville</option>
                            <option value="Pointe-Noire">Pointe-Noire</option>
                            <option value="Dolisie">Dolisie</option>
                            <option value="Nkayi">Nkayi</option>
                            <option value="Loango">Loango</option>
                            <option value="Ouesso">Ouesso</option>
                            <option value="Madingou">Madingou</option>
                            <option value="Owando">Owando</option>
                            <option value="Gamboma">Gamboma</option>
                            <option value="Impfondo">Impfondo</option>
                            <option value="Sibiti">Sibiti</option>
                            <option value="Mossendjo">Mossendjo</option>
                            <option value="Kinkala">Kinkala</option>
                            <option value="Makoua">Makoua</option>
                        </select>
                        <br><br>

                        <input class="styleinput" type="text" name="email" id="email" placeholder="email" required value="<?= $result[0]['email'] ?>"><br><br>

                        <input class="styleinput" type="text" name="age" id="age" placeholder="age" required value="<?= $result[0]['age'] ?>"><br><br>

                        <select class="styleinput" id="genre" name="genre">
                        <option value="<?= $genre ?>"><?= $genre ?></option>
                            <option value="Masculin">Masculin</option>
                            <option value="Féminin">Féminin</option>
                        </select>
                        <br><br>
                       
                        <button type="button" onclick="upUser('<?= $cookie_number ?>', '<?= $cookie_otp ?>')" class="valid">S'inscrire</button>
                    </div>
                </div>
            </div>
        </center>
       
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function upUser(tel, otp) {
                closeloader();
                var formData = new FormData();
                formData.append('tel', tel);
                formData.append('otp', otp);
                formData.append('name', document.getElementById('name').value);
                formData.append('first_name', document.getElementById('first_name').value);
                formData.append('email', document.getElementById('email').value);
                formData.append('age', document.getElementById('age').value);
                formData.append('genre', document.getElementById('genre').value);
                formData.append('ville', document.getElementById('ville').value);

                var imageInput = document.getElementById('imageInput');
                if (imageInput.files && imageInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var base64Image = e.target.result;
                        formData.append('profil', base64Image);

                        sendRequest(formData);
                    }
                    reader.readAsDataURL(imageInput.files[0]);
                } else {
                    formData.append('profil', '');
                    sendRequest(formData);
                }
            }

            function sendRequest(formData) {
                var data = {
                    "api": "updateuser",
                    "data": Object.fromEntries(formData.entries())
                };

                var settings = {
                    "url": apiurl,
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify(data),
                };

                $.ajax(settings).done(function (response) {
                    closeloader()
                });
            }
        </script>
<script src="js/users.js"></script>
<?php
} else {
    // Affichage d'un message d'erreur si 'number' ou 'otp' ne sont pas définis
    ?>
    <div class="centerdiv" style="text-align: center; margin-top: 50px;">
        <h2>Une erreur s'est produite (paramètres manquants)</h2>
        <p>Il semble qu'une erreur soit survenue avec les paramètres. Veuillez réessayer.</p>
        <a href="login.php">Réessayer</a>
    </div>
    <?php
}
}
?>
