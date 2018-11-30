//TOGGLE SEARCH MENU
const toggleButtons = document.querySelectorAll('.toggle-button');

const toggleElements = document.querySelectorAll('.toggle-visibility');

[...toggleButtons].forEach(e => {
    e.addEventListener('click', () => {

        [...toggleElements].forEach(el => {

            el.classList.toggle('hidden');
        });
    });
});


window.addEventListener('resize', () => {
    windowCheck();
});

const windowCheck = () => {
    if(window.innerWidth < 992) {
        document.querySelector('.search-field').classList.remove('hidden');
    }
    else {
        document.querySelector('.search-field').classList.add('hidden');
        document.querySelector('.navbar-nav').classList.remove('hidden');
    }
};

windowCheck();

// Toggle active class
$('.navbar-nav .nav-link').click(function(){
    $('.navbar-nav .nav-link').removeClass('active');
    $(this).addClass('active');
});