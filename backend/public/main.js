// NAVBAR
let menuToggle= document.getElementById('menu-toggle');
let navLinks= document.getElementById('nav-links');
let navLinksList = navLinks.querySelectorAll('.nav-link a');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    menuToggle.classList.toggle('active');
});

navLinksList.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault();

    navLinks.classList.remove('active');
    menuToggle.classList.remove('active');

    const targetId = link.getAttribute('href');
    const targetElement = document.querySelector(targetId);

    if (targetElement) {
      window.scrollTo({
        top: targetElement.offsetTop,
        behavior: 'smooth' 
      });
    }
  });
});


// Ottieni gli elementi dalla pagina
const modal = document.getElementById("videoModal");
const openModalBtn = document.getElementById("watch");
const closeModalBtn = document.querySelector(".close");
const videoPlayer = document.getElementById("videoPlayer");

// Apri la modal quando l'utente clicca sul pulsante
openModalBtn.onclick = function() {
    modal.style.display = "flex";
    videoPlayer.play(); // Avvia il video automaticamente
}

// Chiudi la modal quando l'utente clicca sulla "x"
closeModalBtn.onclick = function() {
    modal.style.display = "none";
    videoPlayer.pause(); // Metti in pausa il video quando si chiude la modal
    videoPlayer.currentTime = 0; // Resetta il video
}

// Chiudi la modal quando l'utente clicca fuori dalla modal
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
        videoPlayer.pause();
        videoPlayer.currentTime = 0;
    }
}



// Apertura e chiusura del modal
const contactModal = document.getElementById('contactExpertModal');
const contactButton = document.getElementById('btn-contact-expert');
const closeModal = document.getElementById('close-contact');

contactButton.addEventListener('click', () => {
    contactModal.style.display = 'flex';
});

closeModal.addEventListener('click', () => {
    contactModal.style.display = 'none';
});

window.onclick = function(event) {
    if (event.target == contactModal) {
        contactModal.style.display = 'none';
    }
}


// SWIPER
let swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    768: {
      slidesPerView: 3,
    },
    0: {
      slidesPerView: 1,
    },
  },
});

let swiper2 = new Swiper(".mySwiper2", {
  pagination: {
    el: ".swiper-pagination-2",
  },
});