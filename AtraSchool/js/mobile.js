const burgermenu = document.getElementsByClassName('burgermenu');
const navmenu = document.getElementsByClassName('nav-menu');

burgermenu.addEventListener('click', () => {
    navmenu.classlist.toggle('show');
});