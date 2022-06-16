let balanceBoxs = document.querySelectorAll('.balance__box')
let balanceText = document.querySelectorAll('.balance__box p')
let balanceDownload1 = document.querySelector("#balance__download-btn-1")
let balanceDownload2 = document.querySelector("#balance__download-btn-2")
let balanceDownload3 = document.querySelector("#balance__download-btn-3")


balanceBoxs[0].classList.add('btn-back')
balanceText[0].style.color = '#405982'


balanceBoxs[0].addEventListener('click', function () {
    balanceBoxs[0].classList.add('btn-back')
    balanceText[0].style.color = '#405982'
    balanceBoxs[1].classList.remove('btn-back')
    balanceText[1].style.color = '#4878D1'
    balanceBoxs[2].classList.remove('btn-back')
    balanceText[2].style.color = '#4878D1'

    balanceDownload1.style.display = 'block'
    balanceDownload2.style.display = 'none'
    balanceDownload3.style.display = 'none'

})


balanceBoxs[1].addEventListener('click', function () {
    balanceBoxs[1].classList.add('btn-back')
    balanceText[1].style.color = '#405982'
    balanceBoxs[0].classList.remove('btn-back')
    balanceText[0].style.color = '#4878D1'
    balanceBoxs[2].classList.remove('btn-back')
    balanceText[2].style.color = '#4878D1'

    balanceDownload1.style.display = 'none'
    balanceDownload2.style.display = 'block'
    balanceDownload3.style.display = 'none'
   
})


balanceBoxs[2].addEventListener('click', function () {
    balanceBoxs[2].classList.add('btn-back')
    balanceText[2].style.color = '#405982'
    balanceBoxs[0].classList.remove('btn-back')
    balanceText[0].style.color = '#4878D1'
    balanceBoxs[1].classList.remove('btn-back')
    balanceText[1].style.color = '#4878D1'

    balanceDownload1.style.display = 'none'
    balanceDownload2.style.display = 'none'
    balanceDownload3.style.display = 'block'
  
})

























//
