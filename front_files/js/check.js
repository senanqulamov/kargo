

const boxs = document.querySelectorAll('.balance__cards-box')


boxs.forEach((box)=>{
    box.addEventListener('click',function(e){
        box.children[0].children[0].click()
    })
})
















