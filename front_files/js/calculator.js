

const calc__container = document.querySelectorAll('.calculator__box')

const calc__table = document.querySelector('.calculaator__sponsor')

const check__input = document.querySelectorAll('.form-check-input')




calc__container.forEach((c)=>{
    
    c.addEventListener('click',function(){
        
        c.children[3].click() 

    })


})


















// calc__table.addEventListener('click',function(e){
//     let clicked = e.target.closest('.calculator__box')


//     if(!clicked) return;

//     check__input.forEach(c=>{
//         c.checked
//     })
    
// })































