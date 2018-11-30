import Glide, { Controls, Breakpoints } from '@glidejs/glide/dist/glide.modular.esm'

(() => {
    if (!document.querySelector('.glide')) return;

    // Check for different type of slider
    if (document.querySelector('#carousel')) {

        const glide = new Glide('.glide', {
            type: 'carousel',
            startAt: 0,
            perView: 3
        }).mount({Controls, Breakpoints});
        window.glideSlider = glide;

        //Move slides with custom arrows
        const leftArrow = document.querySelector('.icon--arrow-left-small');
        const rightArrow = document.querySelector('.icon--arrow-right-small');

        leftArrow.addEventListener('click', () => {
            glide.go('<');
        });

        rightArrow.addEventListener('click', () => {
            glide.go('>');
        });
    }

    else {

        const glide = new Glide('.glide').mount({Controls, Breakpoints});
        window.glideSlider = glide;

        //Move slides with custom arrows
        const leftArrow = document.querySelector('.icon--arrow-left');
        const rightArrow = document.querySelector('.icon--arrow-right');

        leftArrow.addEventListener('click', () => {
            glide.go('<');
        });

        rightArrow.addEventListener('click', () => {
            glide.go('>');
        });
    }
})();
