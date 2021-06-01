/* 

    scroll the page to the top

*/
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

/* 

    hide when the page already at the top

*/
window.addEventListener('scroll', function () {
    const currentScrollPosition = window.scrollY;
    // scrollY returns the number of pixels that the document is currently scrolled vertically

    const scrollBtn = document.getElementById('scroll');
    // in css, you query the html tag is: #scroll

    if (currentScrollPosition !== 0) {
        scrollBtn.setAttribute('style', 'display: block;');
        // this will add the style attribute
        // <a style="display: block;">...</a>
    } else {
        scrollBtn.setAttribute('style', 'display: none;');
    }
});

/* 

    check the current position of the page and hide "scrollBtn"

*/
function toggleScrollButton() {
    const lastPosition = window.scrollY;
    const scrollBtn = document.getElementById('scroll');

    if (lastPosition !== 0) {
        scrollBtn.setAttribute('style', 'display: block;');
    } else {
        scrollBtn.setAttribute('style', 'display: none;');
    }
}

window.addEventListener('scroll', function () {
    toggleScrollButton();
});

window.addEventListener('load', () => {
    toggleScrollButton();
});

/* 

    Open the menu form

*/
function openMenu() {
    const form = document.querySelector("#form1");
    if (form.style.display == 'none') {
        form.style.display = 'flex';
    } else {
        form.style.display = 'none';
    }
}

window.addEventListener('click', (e) => {
    if (!e.target.closest('#login')) {
        const form = document.querySelector("#form1");
        form.style.display = 'none';
    }
});
