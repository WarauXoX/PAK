// const { default: Quill } = require("quill");

// import Quill from "../../node_modules/quill/core.js"
const table = document.querySelector("table tbody");

function createBlock(tag, classBlock, idBLock){
    return (elem) => {
            try{
                let el = document.createElement(tag);
                el.classList = classBlock;
                el.id = idBLock;
                el.appendChild(elem)
                return el;
            }   
            catch{
                let el = document.createElement(tag);
                el.classList = classBlock;
                el.id = idBLock;
                el.innerHTML = elem;
                return el;
            }
    }
}

let createRowBlocks = createBlock('tr', "block", `row_`);
let createBlockRight = createBlock('td', 'block_right', `right_`);
let createBlockLeft = createBlock('td', 'block_left', `left_`);


function addClassicBlocks(id_row){
    id_row = parseInt(id_row)
    document.getElementById("row_" + id_row).remove();
    classicBlocks((id_row));
}

function classicBlocks(id_row){
    id_row = parseInt(id_row)


    const RowUp = createRowBlocks(" "); RowUp.id = `row_${id_row}`;
    const RowDown = createRowBlocks(" "); RowDown.id = `row_${id_row+1}`; 

    const left = new block_content("left_block", `left_${id_row}`, `Выберете блок`).createButtons();
    const right = new block_content("right_block", `right_${id_row}`, `+`).createButtons();
    const left2 = new block("left_block_Add", `left_${id_row+1}`, `+`).CreateBlock();
    left2.setAttribute("onclick", `addClassicBlocks('${id_row+1}')`);

                    RowUp.appendChild(left);
                    RowUp.appendChild(right);
                    RowDown.appendChild(left2);

    table.appendChild(RowUp);
    table.appendChild(RowDown);
}






function CreateButton(func, classB){
    const button = document.createElement('button');
    button.onclick = func
    button.classList = classB
    return button; 
}



// function CreateTextElement(text, id){
//     const text = document.createElement("textarea");
//     text.innerHTML = text;
//     text.id = id;
//     text.name = "text";
//     return ButCreateText;
// }


class elements{
    constructor(classE, idE, el){
        this.class = classE;
        this.id = idE;
        this.el = el;
    }
    create(){
        const El = document.createElement(this.el);
        El.classList = this.class;
        El.id = this.id;
        return El;
    }
    remove(){
        const El = document.getElementById(this.id);
        El.remove();
    }
}
class buttonEl extends elements{
    constructor(butClass, ButId, textButton, func){
        super(butClass, ButId, "button");
        this.text = textButton;
        this.func = func;   
    }
    createButton(){
        let button = this.create();
        button.onclick = this.func;
        button.innerHTML = this.text;
        return button;
    }
}
class textEl extends elements{
    constructor(classE, idE, name){
        super(classE, idE, "textarea");
        this.name = name;
    }
    createText(){
        const textarea = this.create();
        textarea.setAttribute('name', this.name);
        return textarea;
    }
}
class imageEl extends elements{
    constructor(classE, idE, src){
        super(classE, idE, "img");
        this.src = src;
    }
    createImage(){
        const img = this.create();
        img.setAttribute("src", this.src);
        img.setAttribute("width", "100px")
        img.setAttribute("height", "100px")
        return img;
    }
}
class quest extends elements{
    constructor(classE, idE, type, name){

        super(classE, idE, "input");

        this.type = type;
        this.name = name;
    }
    createQuest(){
        let El = this.create();

        El.setAttribute('type', this.type);
        El.setAttribute("name", this.name);
        return El;
    }
} 
    class test extends elements{
        constructor(classE, idE, numerOfQuest, name){
            super(classE, idE, "div");

            this.numberOfQuest = numerOfQuest;
            this.name = name;
        }
        createTest(){
            const div = this.create();
            for(let i = 0; i < this.numberOfQuest; i ++){
                const testQuest = new quest(`test_${this.class}`, `textQuest_${i}`, "text", `${this.name}_${i}_test`).createQuest();
                testQuest.setAttribute("placeholder", "Вопрос");
                const testChek = new quest(`test_${this.class}`, `checkQuest_${i}`, "checkbox", `${this.name}_${i}_chek`).createQuest();

                div.appendChild(testQuest);
                div.appendChild(testChek);
            }
            const add = new buttonEl(`${this.class}_buttonAdd`, `${this.id}_AddId`, "add Input", () => {
                    const div = document.getElementById(this.id);
                    this.numberOfQuest ++;
                    
                    const testQuest = new quest(`test_${this.class}`, `textQuest_${this.numberOfQuest}`, "text", `${this.name}_${this.numberOfQuest}_test`).createQuest();
                    testQuest.setAttribute("placeholder", "Вопрос");
                    const testChek = new quest(`test_${this.class}`, `checkQuest_${this.numberOfQuest}`, "checkbox", `${this.name}_${this.numberOfQuest}_chek`).createQuest();


                    div.appendChild(testQuest);
                    div.appendChild(testChek);
            }).createButton();

            div.appendChild(add);

            return div;
        }

    }

class block extends elements{
    constructor(classE, idE, textEl){
        super(classE, idE, "td")
        this.text = textEl;
    }
    CreateBlock(){
        const div = this.create();
        div.innerHTML = `<span class="elem">${this.text}</span>`;
        return div;
    }
}
    class block_add extends block{
        constructor(classE, idE){
            super(`${classE}`, idE, "+")
        }
    }
    class block_content extends block{
        constructor(classE, idE){
            super(classE, idE, "")
        }

        createButtons(){
            const div = this.CreateBlock();
            const buttonText = new buttonEl(`${this.class}`, `button_text_${this.id}`, `лекция`, () => {
                let el = new elements("editor", `editor_1`, 'div').create();
                let textEd = new Quill(el);
                div.appendChild(el);
                buttonText.remove();
                buttonTest.remove();
                buttonImage.remove();
            }).createButton();

            const buttonTest = new buttonEl(`${this.class}`, `button_text_${this.id}`, `тестирование`, () => {
                div.appendChild(new test(`${this.class}`, `test_${this.id}`, `1`).createTest());
                buttonTest.remove();
                buttonText.remove();
                buttonImage.remove();
            }).createButton();

            const buttonImage = new buttonEl(`${this.class}`, `button_image_${this.id}`, `картинка`, () => {
                let img = new quest(`${this.class}`, `image_${this.id}`, `file`, `${this.class}_${this.id}`).createQuest();
                div.appendChild(img);
                buttonTest.remove();
                buttonText.remove();
                buttonImage.remove();
            }).createButton();

            div.appendChild(buttonText);
            div.appendChild(buttonTest);
            div.appendChild(buttonImage);
            return div;
        }
    }


// do
// setInterval(()=>{
//     addClassicBlocks(1)
// },1);
// while(true)




































































































// let isOpen = false 

// function opener(){ 
//     if(isOpen == false){
//         innerHTML = `<div>
//                 <button>a</button>
//                 <button>b</button>
//                 <button>c</button>
//                 <button>d</button>
//             </div>`
//     }
// }
//                                                     //creatre block
// document.querySelector(".left-block-add").addEventListener("click", (e)=>{
//     e.preventDefault;
//     if(e.target.classList == "left-block-add" || e.target.classList == ""){
//         numberOfBlock ++;

//         const $LB =document.querySelector(".left-block-add");
//         $LB.id = numberOfBlock;
//         $LB.classList = "left-block";
//         $LB.innerHTML = null;
//         // $LB.classList = "left-block"
//         const $span = document.createElement('span');
//         $span.className = "elem";
//         $span.innerHTML = "gello"

//         const $p2 = document.createElement('p');
//         $p2.textContent = 'append';
//         // вставим элемент $p2 в конец $message
//         $LB.append($span);
//         $LB.addEventListener("click", (e) => {
//             if(isOpen == false){ // (`${e.target.class} > buttons`)
//                 document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = `<div class="buttons" id="${e.target.id}">
//                         <button>a</button>
//                         <button>b</button>
//                         <button>c</button>
//                         <button>d</button>
//                     </div>`
//                     isOpen = true;
//                 }
//             else if(isOpen == true){
//                 document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = "Выборы это четно я ";
                
//                 console.log(e.target.id)
//                 isOpen = false;
//             }                 
//         });
//         // addblock.firstChild($LB);
//     }
// });





//                                                     // butonss this block left

// function ShowButtons(e) {
//     if(isOpen == false){ // (`${e.target.class} > buttons`)
//         document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = `<div class="buttons" id="${e.target.id}">
//                 <button>a</button>
//                 <button>b</button>
//                 <button>c</button>
//                 <button>d</button>
//             </div>`
//             isOpen = true;
//         }
//     else if(isOpen == true){
//         document.querySelector(`.left-block[id="${e.target.id}"] .elem`).innerHTML = "Выборы это четно я ";
        
//         console.log(e.target.id)
//         isOpen = false;
//     }     
// }
