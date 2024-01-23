let mainNavbar = document.querySelector('#mainNavbar');

window.addEventListener('scroll', (event)=>{
    if (window.scrollY == 0){
        mainNavbar.classList.remove('nav-gradient'); 
        mainNavbar.classList.add('bg_transparent');
    }else{
        mainNavbar.classList.remove('bg_transparent'); 
        mainNavbar.classList.add('nav-gradient');
    }});

    /* console.log(mainNavbar); */