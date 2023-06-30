const navToggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.navbar');

navToggle.addEventListener('click', () => {
    nav.classList.toggle('open');
});


function confirmLogout() {
    var confirmation = confirm("Are you sure you want to log out?");
    return confirmation;
}
