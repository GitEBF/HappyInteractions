const button = document.getElementById("loginButton");
const sidebar = document.getElementById("loginSidebar");
const buttonIcon = document.getElementById("buttonIcon");
const buttonIconSetings = document.getElementById("buttonIconSetings");
const buttonWrapper = document.getElementById('buttonWrapper');

if(button != null) {
  button.addEventListener("click", function () {
    if (sidebar.style.width === "250px") {
      sidebar.style.width = "0";
      button.style.left = "0";
      buttonIcon.innerHTML = '<i class="fa fa-user"></i>';
      //buttonIconSetings.innerHTML = '<i class="fa fa-bars"></i>';
      button.classList.remove("active");
    } else {
      sidebar.style.width = "250px";
      button.style.left = "250px";
      buttonIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="fill:#5C9EAD" height="1em" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>';
      //buttonIconSetings.innerHTML = '<i class="fa fa-bars"></i>';
      button.classList.add("active");
    }
  });
}



//Get all children of buttonWrapper and listen to the click event of each one
if (buttonWrapper != null) {
  buttonWrapper.addEventListener('click', (event) => {
    var emotionIcons = document.getElementsByClassName("emotionIcon");
    console.dir(event.target.id);
    if (event.target.id != null && event.target.id != "buttonWrapper") {
      for (i = 0; i < emotionIcons.length; i++) {
        if (emotionIcons[i].id != event.target.id) {
          emotionIcons[i].classList.add("emotionDisapear");
        } else {
          emotionIcons[i].classList.add("emotionBiggify");
        }
      }
    }
  })
}
