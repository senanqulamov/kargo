
let image__input = document.querySelector('#image_input')

let uploaded__image = ''

image__input.addEventListener('change',function(){
    const reader = new FileReader();

    reader.addEventListener('load',()=>{
        uploaded__image = reader.result;
         document.querySelector('#display_image').style.backgroundImage = `url(${uploaded__image})`
    })

    reader.readAsDataURL(this.files[0])
})



















////