function openRootType() {
    // Get the checkbox
    var checkBox = document.getElementById("isGroup");
    // Get the output text
    var text = document.getElementById("root_type");
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }
  
  function openRootTypeEdit() {
    // Get the checkbox
    var checkBox2 = document.getElementById("isGroupEdit");
    // Get the output text
    var text2 = document.getElementById("root_type_edit");
  
    // If the checkbox is checked, display the output text
    if (checkBox2.checked == true){
      text2.style.display = "block";
    } else {
      text2.style.display = "none";
    }
  }