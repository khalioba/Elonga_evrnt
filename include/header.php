<?php 
session_start();

// Vérification de la présence du token de session dans la session ou le cookie
$cookie_value = $_COOKIE['rememberMe'] ?? '';

// Initialisation des variables
$cookie_number = null;
$cookie_otp = null;

if (!empty($cookie_value)) {
    $parts = explode('|', $cookie_value, 2);
    if (count($parts) === 2) {
        list($cookie_number, $cookie_otp) = $parts;
    }
}

if ($cookie_number && $cookie_otp) {
    // Construction de l'URL de l'API
    $api_url = 'http://localhost/api_matsuri/getuser/' . $cookie_number . '/' . $cookie_otp;

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
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- swiper, slider -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--  -->
    <link rel="stylesheet" href="css/style.css?<?= rand() ?>">
    <link rel="stylesheet" href="css/pop_up.css?<?= rand() ?>">
    <script src="js/script.js?<?= rand() ?>" defer></script>
    <script src="js/pop_up.js?<?= rand() ?>" defer></script>
    <title>Elonga event</title>
</head>

<body>

    <div class="main">

        <?php include('include/pop_up/pop_up.php'); ?>

        <div class="menu space_bottom">
            <nav class="nav_bar space2">
                <div class="logo_container">
                    <a href="index.php">
                        <img src="image/logoe.png" alt="logo Matsuri">
                        <div class="trait_logo"></div>
                        <p>Elonga event</p>
                    </a>
                </div>

                <ul class="menu_nav" id="menu_nav">
                    <a href="profil.php">
                        <div class="photo_profil_name_title">
                            <div class="photo_profil">
                                <?php 
                                if ($result[0]['profil']) {
                                    $img = $result[0]['profil'];
                                } else {
                                    $img = 'image/profil.png';
                                }
                                ?>
                                <img src="<?= $img ?>" alt="">
                            </div>
                            <div class="profil_name_title">
                                <div class="profil_name">
                                    <p><?= $result[0]['first_name']?></p>
                                </div>
                                <div class="profil_title">
                                    <p><?= $result[0]['ville']?></p>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="rect_menu_lien">
                        <div class="rect_menu_lien_each">
                            <li class="btn_nav"><a href="index.php"><img src="image/home.svg" alt="">Accueil</a></li>
                        </div>
                        <div class="rect_menu_lien_each">
                            <li class="btn_nav"><a href="entreprise.php"><img src="image/entreprise.svg" alt="">Entreprise</a>
                            </li>
                        </div>
                        <div class="rect_menu_lien_each">
                            <li class="btn_nav"><a href="forum.php"><img src="image/forum.svg" alt="">Forum</a></li>
                        </div>
                        <div class="rect_menu_lien_each">
                            <li class="btn_nav"><a href="galerie.php"><img src="image/galerie.svg" alt="">Galerie</a></li>
                        </div>
                    </div>

                </ul>

                <div class="menu_hamburger" id="hamburger">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </nav>
        </div>

        <script>
        hamburger.onclick = () => {
            hamburger.classList.toggle("open");
            menu_nav.classList.toggle("menu_nav")
        }
        </script>

        <script>
        // Fonction pour obtenir la page actuelle
        function getCurrentPage() {
            const path = window.location.pathname;
            const page = path.split("/").pop();
            return page.split(".")[0];
        }

        // Fonction pour définir la classe active
        function setActiveNav() {
            const currentPage = getCurrentPage();
            const navLinks = document.querySelectorAll('nav ul li a');
            const navIcons = document.querySelectorAll('nav ul li img');

            navLinks.forEach(link => {
                const linkPage = link.getAttribute('href').split(".")[0];
                if (linkPage === currentPage) {
                    link.classList.add('active');
                    // Ajouter la classe 'actived' à l'image associée
                    const icon = link.previousElementSibling; // Sélectionner l'image associée
                    if (icon && icon.tagName === 'IMG') {
                        icon.classList.add('actived');
                    }
                } else {
                    link.classList.remove('active');
                    const icon = link.previousElementSibling;
                    if (icon && icon.tagName === 'IMG') {
                        icon.classList.remove('actived');
                    }
                }
            });
        }

        // Appelez la fonction pour définir la classe active lors du chargement de la page
        window.onload = setActiveNav;
        </script>

<?php 
    } else {
        header('Location:login.php');
    }
}else {
    header('Location:login.php');
}
?>
