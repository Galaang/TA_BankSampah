window.onscroll = function () {
    const header = document.querySelector('header');
    const fixednav = header.offsetTop;
    const arrow = document.querySelector('#arrow');

    if (window.pageYOffset > fixednav) {
        header.classList.add('nav-fixed');
        arrow.classList.remove('hidden');
        arrow.classList.add('flex');
    } else {
        header.classList.remove('nav-fixed');
        arrow.classList.add('hidden');
        arrow.classList.remove('flex');
    }
}

// dropdown profile
document.getElementById('dropdownButton').addEventListener('click', function() {
    document.getElementById('dropdownMenu').classList.toggle('hidden');
});

window.addEventListener('click', function(e) {
    if (!document.getElementById('dropdownButton').contains(e.target)) {
        document.getElementById('dropdownMenu').classList.add('hidden');
    }
});

// sidebar
document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggleButton');
    const overlay = document.getElementById('overlay');
    const sidebar = document.getElementById('sidebar');
    
    toggleButton.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebar.classList.toggle('translate-x-0');
        overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
        overlay.classList.add('hidden');
    });
});
