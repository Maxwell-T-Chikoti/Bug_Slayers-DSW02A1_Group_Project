document.getElementById('menu-button').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    var container = document.querySelector('.container');
    sidebar.classList.toggle('hidden');
    if (sidebar.classList.contains('hidden')) {
        container.style.gridTemplateColumns = '0 1fr 1fr 1fr';
    } else {
        container.style.gridTemplateColumns = '200px 1fr 1fr 1fr';
    }
});
