function view(e) {
    let line = document.querySelector(".downLine");
    let arr = [".d1", ".d2", ".d3", ".d4", ".d5"];
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
      }
    }
  }