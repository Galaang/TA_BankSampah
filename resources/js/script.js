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

