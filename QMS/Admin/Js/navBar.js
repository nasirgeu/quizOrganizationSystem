const toggleBtn = document.querySelector('.toggle-btn');
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main_content');
const header = document.querySelector('.header');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('hide-sidebar');
    mainContent.classList.toggle('hide-sidebar');
});

// Hide or show the toggle button based on screen size
function checkScreenWidth() {
    if (window.innerWidth <= 750) {
        toggleBtn.style.display = 'block';
        header.style.display = 'block';
        sidebar.style.marginTop = '36.4px';
    } else {
        toggleBtn.style.display = 'none';
        header.style.display = 'none';
        sidebar.style.marginTop = '0';
    }
}

window.addEventListener('resize', checkScreenWidth);
checkScreenWidth();
