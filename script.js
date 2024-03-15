/* ─── Carrusel ─── */

const btnLeft    = document.querySelector('.btn-left');
const btnRight   = document.querySelector('.btn-right');
const slider     = document.querySelector('#slider');
const sliderSection = document.querySelectorAll('.slider-section');

let counter  = 0;
let operacion = 0;
const widthImg = 100 / sliderSection.length;

function moveToRight() {
    if (counter >= sliderSection.length - 1) {
        counter = 0;
        operacion = 0;
        slider.style.transition = 'none';
        slider.style.transform = `translate(0%)`;
        return;
    }
    counter++;
    operacion += widthImg;
    slider.style.transition = 'transform .6s ease';
    slider.style.transform = `translate(-${operacion}%)`;
}

function moveToLeft() {
    counter--;
    if (counter < 0) {
        counter = sliderSection.length - 1;
        operacion = widthImg * counter;
        slider.style.transition = 'none';
        slider.style.transform = `translate(-${operacion}%)`;
        return;
    }
    operacion -= widthImg;
    slider.style.transition = 'transform .6s ease';
    slider.style.transform = `translate(-${operacion}%)`;
}

btnLeft.addEventListener('click', moveToLeft);
btnRight.addEventListener('click', moveToRight);

const autoSlide = setInterval(moveToRight, 3500);

/* ─── Menú hamburguesa ─── */

const hamburger = document.getElementById('hamburger');
const navbar    = document.getElementById('navbar');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navbar.classList.toggle('open');
});

navbar.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navbar.classList.remove('open');
    });
});

/* ─── Animación de tarjetas al hacer scroll ─── */

const cards = document.querySelectorAll('.producto-card');

const cardObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const index = [...cards].indexOf(entry.target);
            setTimeout(() => {
                entry.target.classList.add('visible');
            }, (index % 4) * 80);
            cardObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.05 });

cards.forEach(card => cardObserver.observe(card));

/* ─── Botón volver arriba ─── */

const btnTop = document.getElementById('btnTop');

window.addEventListener('scroll', () => {
    btnTop.classList.toggle('visible', window.scrollY > 400);
});

btnTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
