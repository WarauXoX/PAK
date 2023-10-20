let popupBg = document.querySelector('.pop-up-bg');
let popup = document.querySelector('.pop-up'); 
let openPopupButtons = document.querySelectorAll('#start'); 
let closePopupButton = document.querySelector('.close-pop-up'); 

openPopupButtons.forEach((button) => { 
    button.addEventListener('click', (e) => { 
        e.preventDefault(); 
        popupBg.classList.add('active'); 
        popup.classList.add('active'); 
    })
});
document.addEventListener('click', (e) => { 
    if(e.target === popupBg) { 
        popupBg.classList.remove('active'); 
        popup.classList.remove('active'); 
    }
});