function view(e) {
    let line = document.querySelector(".downLinef");
    let arr = [".f1", ".f2", ".f3", ".f4", ".f5", ".f6", ".f7", ".f8"];
    console.log(line.style.top);
    //   console.log(typeof parseInt(e.target.id[4]));
    let viewMenu = document.getElementById(`${e.target.id[4]}`);
    viewMenu.classList.remove("displayNone");
    let elementClass = Object.values(viewMenu.classList);
  
    let elements = document.querySelector(".tabMenuItems").children;
    // console.log(elements);
    for (let i = 0; i <= elements.length; i++) {
      // console.log(elements[i]);
      if (i + 1 !== parseInt(e.target.id[4])) {
        elements[i].classList.add("displayNone");
        document.querySelector(`${arr[i]}`).style.display = "none";
  
        // console.log(document.querySelector(${arr[i]}));
      } else {
        elements[i].classList.remove("displayNone");
        document.querySelector(`${arr[i]}`).style.display = "block";
        console.log(document.querySelector(`${arr[i]}`));
      }
    }
  }
  
  // Accardion
  
  const accordionBtns = document.querySelectorAll(".accordion");
  
  accordionBtns.forEach((accordion) => {
    accordion.onclick = function () {
      this.classList.toggle("is-open");
  
      let content = this.nextElementSibling;
      // console.log(content);
  
      if (content.style.maxHeight) {
        //this is if the accordion is open
        content.style.maxHeight = null;
      } else {
        //if the accordion is currently closed
        content.style.maxHeight = content.scrollHeight + "px";
        // console.log(content.style.maxHeight);
      }
    };
  });