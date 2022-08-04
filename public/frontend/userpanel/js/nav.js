const burgerLines = document.querySelector(".fnav__burger")
const fnav = document.querySelector(".fnav")
const burgerMenu = document.querySelector(".burger__menu")
const lineTop = document.querySelector(".fnav__top")
const lineCenter = document.querySelector(".fnav__center")
const lineBottom = document.querySelector(".fnav__bottom")
const overlay = document.querySelector(".overlay")
const body = document.querySelector('body')


burgerLines.addEventListener('click', function (e) {
    e.preventDefault()

    burgerMenu.classList.toggle("burger__menu-visible")
    burgerMenu.classList.toggle("visible")
    overlay.classList.toggle("overlay__active")

    lineTop.classList.toggle('burger__line-1')
    lineCenter.classList.toggle('burger__line-2')
    lineBottom.classList.toggle('burger__line-3')
})






///
