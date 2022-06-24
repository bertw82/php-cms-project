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

