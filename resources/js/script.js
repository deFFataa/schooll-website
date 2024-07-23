document.addEventListener('DOMContentLoaded', function () {
    console.log('Script loaded and DOM fully loaded');
    let navbar = document.querySelector('.nav');
    let lastScrollTop = 0;

    window.addEventListener('scroll', function () {
        let scrollTop = document.documentElement.scrollTop;

        if (scrollTop > 50) {
            if (scrollTop > lastScrollTop) {
                // Scrolling down
                navbar.classList.add('shadow-md');
            } else {
                // Scrolling up
                if (scrollTop === 0) {
                    // Scrolled all the way to the top
                    navbar.classList.remove('shadow-md');
                }
            }
        } else {
            if (scrollTop === 0) {
                // Scrolled all the way to the top
                navbar.classList.remove('shadow-md');
            }
        }

        lastScrollTop = scrollTop;
    });
});
