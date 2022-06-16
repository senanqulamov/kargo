

let customerBox1 = document.querySelector('.customer__info-1 ')
let customerBox2 = document.querySelector('.customer__info-2 ')


let pluses = document.querySelectorAll('.plus')
let minuses = document.querySelectorAll('.minus')

let balanceBox = document.querySelectorAll('.balance__download-buttons')

// let pluses = document.querySelectorAll('.plus')
// let minuses = document.querySelectorAll('.minus')

// let customerInfo1 = document.querySelector('.customer__info-1')
// let customerInfo2 = document.querySelector('.customer__info-2')



balanceBox[0].addEventListener('click',function(){
    customerBox2.classList.remove('open')
    customerBox2.style.height = "0px"
    customerBox1.style.height = customerBox1.scrollHeight + 'px';
    customerBox1.scrollHeight = customerBox1.scrollHeight; // Something like console.log(el.scrollHeight); also works, just something to prevent render skipping
    customerBox1.classList.toggle('open');
    customerBox1.style.height = customerBox1.classList.contains('open') ? customerBox1.scrollHeight + 'px' : 0;
    



    pluses[0].classList.toggle('hide')
    minuses[0].classList.toggle('hide')


    pluses[1].classList.remove('hide')
    minuses[1].classList.add('hide')
    // // customerInfo1.classList.toggle('hide')

    

    // customerBox1.classList.toggle('hide')
 
    // customerBox1.style.height = customerBox1.scrollHeight + 'px';
    // customerBox1.scrollHeight = customerBox1.scrollHeight; // 


    // customerBox1.classList.toggle('open');
    // customerBox1.style.height = customerBox1.classList.contains('open') ? customerBox1.scrollHeight + 'px' : 0;


})




balanceBox[1].addEventListener('click',function(){
    customerBox1.classList.remove('open')
    customerBox1.style.height = "0px"
   
    customerBox2.style.height = customerBox2.scrollHeight + 'px';
    customerBox2.scrollHeight = customerBox2.scrollHeight; // Something like console.log(el.scrollHeight); also works, just something to prevent render skipping
    customerBox2.classList.toggle('open');
    customerBox2.style.height = customerBox2.classList.contains('open') ? customerBox2.scrollHeight + 'px' : 0;
   

    pluses[1].classList.toggle('hide')
    minuses[1].classList.toggle('hide')


    pluses[0].classList.remove('hide')
    minuses[0].classList.add('hide')


    // pluses[1].classList.toggle('hide')
    // minuses[1].classList.toggle('hide')

    // customerBox2.classList.toggle('hide')
    

    // customerBox2.style.height = customerBox2.scrollHeight + 'px';
    // customerBox2.scrollHeight = customerBox2.scrollHeight; // 


    // customerBox2.classList.toggle('open');
    // customerBox2.style.height = customerBox2.classList.contains('open') ? customerBox2.scrollHeight + 'px' : 0;
})



balanceBox[2].addEventListener('click',function(){
    pluses[2].classList.toggle('hide')
    minuses[2].classList.toggle('hide')
})






function slideToggle(el) {
    // The following 2 lines are ONLY needed if you ever want to start in a 'open' state. Due to the way browsers
    // work it needs a double of this (or something like console.log(el.scrollHeight);) to prevent the render skipping
    el.style.height = el.scrollHeight + 'px';
    el.scrollHeight = el.scrollHeight; // Something like console.log(el.scrollHeight); also works, just something to prevent render skipping

    el.classList.toggle('open');
    el.style.height = el.classList.contains('open') ? el.scrollHeight + 'px' : 0;
}   













////