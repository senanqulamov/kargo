
let tabContainer = document.querySelector('.buy__tabs')

let tabs = document.querySelectorAll('.buy__tab')

let tabContent = document.querySelectorAll(".buy__info")



tabContainer.addEventListener('click',function(e){

    let clicked = e.target.closest('.buy__tab')

    
    if(!clicked) return;


    tabs.forEach(t=>t.classList.remove('buy-tab--active'))

    clicked.classList.add('buy-tab--active')


    tabContent.forEach((tabs)=>tabs.classList.remove('show'))

    document.querySelector(`.buy__info-${clicked.dataset.tab}`).classList.add('show')


  console.log(clicked.dataset.tab)
})















/////