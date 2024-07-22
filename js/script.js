hamburger.onclick = () => {
    hamburger.classList.toggle("open");
    menu_nav.classList.toggle("menu_nav");
}

// Fonction pour obtenir le nom de fichier sans l'extension et le chemin

function getCurrentPage() {
    const path = window.location.pathname;
    const page = path.split("/").pop();
    return page.split(".")[0];
}

// Fonction pour définir les classes active et actived
function setActiveNav() {
    const currentPage = getCurrentPage();
    const navLinks = document.querySelectorAll('.rect_menu_lien_each li a');

    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href').split(".")[0];
        const img = link.querySelector('img') || link.previousElementSibling;
        if (linkPage === currentPage) {
            link.classList.add('active');
            if (img) {
                img.classList.add('actived');
            }
        } else {
            link.classList.remove('active');
            if (img) {
                img.classList.remove('actived');
            }
        }
    });
}

// Appelez la fonction pour définir les classes active et actived lors du chargement de la page
window.onload = setActiveNav;





function openPage(pageName, elmnt, borderBottom) {
    // Hide all elements with class="tabcontent" by default
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Remove the border-bottom of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.borderBottom = "none";
    }

    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";

    // Add the specific border-bottom to the button used to open the tab content
    elmnt.style.borderBottom = borderBottom;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


