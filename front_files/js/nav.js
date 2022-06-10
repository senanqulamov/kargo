const burgerLines = document.querySelector(".fnav__burger")
const fnav = document.querySelector(".fnav")
const burgerMenu = document.querySelector(".burger__menu")
const lineTop = document.querySelector(".fnav__top")
const lineCenter = document.querySelector(".fnav__center")
const lineBottom = document.querySelector(".fnav__bottom")
const over = document.querySelector(".over")
const body = document.querySelector('body')
const overlayActive = document.querySelector(".overlay__active")
const navigationCancel = document.querySelector('.navigation__cancel')

const navigationBox = document.querySelectorAll(".navigation__box")


burgerLines.addEventListener('click', function (e) {
    e.preventDefault()

    burgerMenu.classList.toggle("burger__menu-visible")

    overlayActive.classList.add("visible")
    body.classList.add('overflowY')

})



document.querySelector(".overlay").addEventListener('click', function () {
    overlayActive.classList.remove("visible")
    burgerMenu.classList.remove("burger__menu-visible")
    body.classList.remove('overflowY')
})




navigationCancel.addEventListener('click', function () {
    overlayActive.classList.remove("visible")
    burgerMenu.classList.remove("burger__menu-visible")
    body.classList.remove('overflowY')
})




navigationBox.forEach((box)=>{
    

    box.addEventListener('click',function(){
      
        navigationBox.forEach((tabs)=>{
            tabs.classList.remove('isActive')
        })

        box.classList.add('isActive')

    })

   
})




















///
