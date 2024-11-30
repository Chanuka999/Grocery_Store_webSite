let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onClick = () =>{
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
}