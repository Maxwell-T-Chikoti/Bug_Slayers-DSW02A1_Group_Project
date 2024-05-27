const navEl = document.querySelector('nav ul');
const menuiconEl = document.querySelector('.menu_icon');

menuiconEl.addEventListener('click', () => {
    navEl.classList.toggle('open');
});
