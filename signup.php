<?php
// Inclusion du fichier d'en-tête si nécessaire
include('include/inscription_header.php');
session_start();

// Récupération des paramètres 'number' et 'otp' depuis la requête GET
$number = $_GET['number'] ?? '';
$otp = $_GET['otp'] ?? '';

// Vérifiez si 'number' et 'otp' sont définis
if ($number && $otp) {
    // Construction de l'URL de l'API
    $api_url = 'http://localhost/api_matsuri/getuser/' . urlencode($number) . '/' . urlencode($otp);

    // Configuration des options pour la requête HTTP
    $options = [
        "http" => [
            "header" => "Accept: application/json\r\n",
            "method" => "GET"
        ]
    ];

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Tentative de récupération des données depuis l'API
    $data = file_get_contents($api_url, false, $context);

    // Vérification si la récupération des données a échoué
    if ($data === FALSE) {
        $sms = 'Erreur lors de la récupération des données depuis l\'API.';
    }

    // Décodage des données JSON
    $result = json_decode($data, true);

    // Vérifiez si la réponse contient des données utilisateur valides
    if ($result && isset($result[0])) {
        $user_id = $result[0]['id_user']; // Supposons que l'utilisateur a un champ 'id_user'

       // Stocker les informations de session
       $_SESSION['logged_in'] = true;
       $_SESSION['user_id'] = $user_id;
       $_SESSION['number'] = $number;
       $_SESSION['session_token'] = $otp;

       // Définir un cookie pour rester connecté
       $cookie_time = 86400 * 30; // 30 jours
       $cookie_value = $number . '|' . $otp;
       setcookie('rememberMe', $cookie_value, time() + $cookie_time, "/");
       if ($result[0]['first_name']) {
        header('Location:index.php');
       }
        ?>
        <center>
            <div class="welcome_text space">
                <p class="welcom_text1">Plus qu’une étape à franchir, ajoutez vos informations</p>
            </div><br><br>


            <div class="informations space">
                <div class="inscription_box">
                    <div class="form" id="contactForm">
                        <input class="styleinput" type="text" name="name" id="name" placeholder="Nom" required><br><br>
                        <input class="styleinput" type="text" name="first_name" id="first_name" placeholder="Prénom" required><br><br>
                        <select class="styleinput" id="ville" name="ville">
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
                        <button onclick="upUsers(number = '<?= $_GET['number'] ?>', otp='<?= $_GET['otp'] ?>')" class="valid">S'inscrire</button>
                    </div>
                </div>
            </div>
        </center>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/users.js?<?= rand() ?>"></script>
        <?php
    } else {
        // Affichage d'un message d'erreur si l'OTP est invalide ou les données sont manquantes
        ?>
        <div class="centerdiv" style="text-align: center; margin-top: 50px;">
            <h2>Une erreur s'est produite (OTP invalide ou données manquantes)</h2>
            <p>Il semble qu'une erreur soit survenue avec les données. Veuillez réessayer.</p>
            <a href="login.php">Réessayer</a>
        </div>
        <?php
    }
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
?>
