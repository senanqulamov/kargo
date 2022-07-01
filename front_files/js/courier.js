



let customerBox1 = document.querySelector('#courier-1')
let customerBox2 = document.querySelector('#courier-2')
let customerBox3 = document.querySelector('#courier-3')




let balanceBox = document.querySelectorAll('.balance__download-buttons')





balanceBox[0].addEventListener('click',function(){
    customerBox2.classList.remove('open')
    customerBox2.style.height = "0px"
    customerBox1.style.height = customerBox1.scrollHeight + 'px';
    customerBox1.scrollHeight = customerBox1.scrollHeight; // Something like console.log(el.scrollHeight); also works, just something to prevent render skipping
    customerBox1.classList.toggle('open');
    customerBox1.style.height = customerBox1.classList.contains('open') ? customerBox1.scrollHeight + 'px' : 0;
    



  
})




balanceBox[1].addEventListener('click',function(){
    customerBox1.classList.remove('open')
    customerBox1.style.height = "0px"
   
    customerBox2.style.height = customerBox2.scrollHeight + 'px';
    customerBox2.scrollHeight = customerBox2.scrollHeight; // Something like console.log(el.scrollHeight); also works, just something to prevent render skipping
    customerBox2.classList.toggle('open');
    customerBox2.style.height = customerBox2.classList.contains('open') ? customerBox2.scrollHeight + 'px' : 0;
   

  


  
})



balanceBox[2].addEventListener('click',function(){
    pluses[2].classList.toggle('hide')
    minuses[2].classList.toggle('hide')
})




function slideToggle(el) {
    el.style.height = el.scrollHeight + 'px';
    el.scrollHeight = el.scrollHeight;

    el.classList.toggle('open');
    el.style.height = el.classList.contains('open') ? el.scrollHeight + 'px' : 0;
}   





























//