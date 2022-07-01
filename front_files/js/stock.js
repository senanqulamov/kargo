
let localContainer = document.querySelector('.stock__local')
let globalContainer = document.querySelector('.stock__global')
let globalInput = document.querySelectorAll('.global__input')
let localInput = document.querySelectorAll('.local__input')


document.getElementById('select1').addEventListener('change', function() {
    if(this.value === "2"){
        localInput.forEach((local)=>local.classList.add('hide'))
        globalInput.forEach((global)=>global.classList.remove('hide'))
    }
    if(this.value === "1"){
        globalInput.forEach((global)=>global.classList.add('hide'))
        localInput.forEach((local)=>local.classList.remove('hide'))
    }
  });













////