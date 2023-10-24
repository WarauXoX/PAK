let numberOfBlock = 1;
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

let isOpen = false 

function opener(){ 
    if(isOpen == false){
        innerHTML = `<div>
                <button>a</button>
                <button>b</button>
                <button>c</button>
                <button>d</button>
            </div>`
    }
}
                                                    //creatre block
document.querySelector(".left-block-add").addEventListener("click", (e)=>{
    e.preventDefault;
    if(e.target.classList == "left-block-add" || e.target.classList == ""){
        numberOfBlock ++;

        const $LB =document.querySelector(".left-block-add");
        $LB.id = numberOfBlock;
        $LB.classList = "left-block";
        $LB.innerHTML = null;
        // $LB.classList = "left-block"
        const $span = document.createElement('span');
        $span.className = "elem";
        $span.innerHTML = "gello"

        const $p2 = document.createElement('p');
        $p2.textContent = 'append';
        // вставим элемент $p2 в конец $message
        $LB.append($span);
        $LB.addEventListener("click", (e) => {
            if(isOpen == false){ // (`${e.target.class} > buttons`)
                document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = `<div class="buttons" id="${e.target.id}">
                        <button>a</button>
                        <button>b</button>
                        <button>c</button>
                        <button>d</button>
                    </div>`
                    isOpen = true;
                }
            else if(isOpen == true){
                document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = "Выборы это четно я ";
                
                console.log(e.target.id)
                isOpen = false;
            }                 
        });
        // addblock.firstChild($LB);
    }
});





                                                    // butonss this block left

function ShowButtons(e) {
    if(isOpen == false){ // (`${e.target.class} > buttons`)
        document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = `<div class="buttons" id="${e.target.id}">
                <button>a</button>
                <button>b</button>
                <button>c</button>
                <button>d</button>
            </div>`
            isOpen = true;
        }
    else if(isOpen == true){
        document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = "Выборы это четно я ";
        
        console.log(e.target.id)
        isOpen = false;
    }     
}

// })
// let n = document.createElement('div');
// n.innerHTML = `<h1>hee</h1>`



// document.querySelector('.left-block').addEventListener("click", (e) => {
//     if(e.target.class != "changOpen"){
//         e.target.class = "changOpen";
//         return buts = new chenging(e.target.id, e.target)
//     }

//     else{ 
//         if(!buts.isHide){
//             console.log(buts.isHide)
//             buts.close() 
//         }
//         else{
//             buts.open()
//             console.log(buts.isHide)
//         }
//     }


// });

// class blocks{
//     block
    
// } 
// class chenging extends(blocks){
//     _elem = document.createElement("div").innerHTML = `        
//     <div>
//         <button>a</button>
//         <button>b</button>
//         <button>c</button>
//         <button>d</button>
//     </div>`
    
//     constructor(id, idParent){
//         super()
//         this.id = id;
//         this.idParent = idParent;
//         this.hide = false;
//     }

//     open(){
//         this.isHide = false;

//         console.log(this.isHide)
//         this.idParent.removeChild(this._elem)
//     }
//     close(){
//         this.isHide = true;
//         console.log(this.isHide)
//         this.idParent.appendChild(this._elem);
//     }
// }





        // let blocks = document.querySelectorAll('*');
        // for(let i = 0; i < blocks.length; i ++){
        //     blocks[i].remove();                                               Большая красная кнопка
        // }