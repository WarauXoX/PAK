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
let n = document.createElement('div');
n.innerHTML = `<h1>hee</h1>`



document.querySelector('.left-block').addEventListener("click", (e) => {
    if(e.target.class != "changOpen"){
        e.target.class = "changOpen";
        return buts = new chenging(e.target.id, e.target)
    }

    else{ 
        if(!buts.isHide){
            console.log(buts.isHide)
            buts.close() 
        }
        else{
            buts.open()
            console.log(buts.isHide)
        }
    }


});

class blocks{
    block
    
} 
class chenging extends(blocks){
    _elem = document.createElement("div").innerHTML = `        <div>
    <button>a</button>
    <button>b</button>
    <button>c</button>
    <button>d</button>
</div>`
    
    constructor(id, idParent){
        super()
        this.id = id;
        this.idParent = idParent;
        this.hide = false;
    }

    open(){
        this.isHide = false;

        console.log(this.isHide)
        this.idParent.removeChild(this._elem)
    }
    close(){
        this.isHide = true;
        console.log(this.isHide)
        this.idParent.appendChild(this._elem);
    }
}
