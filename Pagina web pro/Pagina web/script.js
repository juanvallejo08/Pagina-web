
// let currentSlide = 0;
// const slides = document.querySelectorAll(".slide");

// function showSlide(n) {
//   slides.forEach((slide) => {
//     slide.style.display = "none";
//   });
//   slides[n].style.display = "block";
// }

// function nextSlide() {
//   currentSlide++;
//   if (currentSlide >= slides.length) {
//     currentSlide = 0;
//   }
//   showSlide(currentSlide);
// }

// function prevSlide() {
//   currentSlide--;
//   if (currentSlide < 0) {
//     currentSlide = slides.length - 1;
//   }
//   showSlide(currentSlide);
// }

// // Mostrar la primera imagen al cargar
// showSlide(currentSlide);

// // Avanzar y retroceder con botones
// document.getElementById("nextBtn").addEventListener("click", nextSlide);
// document.getElementById("prevBtn").addEventListener("click", prevSlide);

document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const contrasenaInput = document.getElementById('contrasena');

    togglePassword.addEventListener('click', function() {
        const tipo = contrasenaInput.getAttribute('type') === 'password' ? 'text' : 'password';
        contrasenaInput.setAttribute('type', tipo);
        this.textContent = tipo === 'password' ? 'Mostrar' : 'Ocultar';
    });
});
