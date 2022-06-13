// JS function to check all boxes, implemented with an onClick event
function selectBoxes() {
  const selectAllBoxes = document.getElementById('selectAllBoxes');
  const checkBoxes = document.getElementsByClassName('checkBoxes');

  if (selectAllBoxes.checked){
    for (let i = 0; i < checkBoxes.length; i++){
      checkBoxes[i].checked = true;
    }
  } else {
    for (let i = 0; i < checkBoxes.length; i++){
      checkBoxes[i].checked = false;
    }
  }
}

// loader function
function load() {
  const body = document.querySelector('body');
  const loadScreenDiv = document.createElement('div');
  loadScreenDiv.id = 'load-screen';
  const loadingDiv = document.createElement('div');
  loadingDiv.id = 'loading';
  loadScreenDiv.appendChild(loadingDiv);
  body.appendChild(loadScreenDiv);
  document.createElement('div');
  fadeOut();
  setInterval(remove, 600);
}

// fade out loader 
// created with help from this StackOverflow post: https://stackoverflow.com/a/29017547/15268032
function fadeOut() {
  const loader = document.querySelector('#load-screen');
  const fadeEffect = setInterval(function () {
      if (!loader.style.opacity) {
          loader.style.opacity = 1;
      }
      if (loader.style.opacity > 0) {
          loader.style.opacity -= 0.1;
      } else {
          clearInterval(fadeEffect);
      }
  }, 400);
}

// remove loader function
function remove() {
  const loader = document.querySelector('#load-screen');
  if (loader) {
  loader.remove();
  }
}

document.addEventListener("DOMContentLoaded",load);