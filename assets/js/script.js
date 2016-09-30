
function tabToggle(evt, section) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(section).style.display = "block";
    evt.currentTarget.className += " active";
}

function addOption(){
    var newInput = document.createElement('input');
    var lastInput = document.getElementById("options").lastElementChild.getAttribute('data-slot');
    var newSlot = parseInt(lastInput) + 1;
    newInput.name = 'choice' + newSlot;
    newInput.setAttribute('data-slot', newSlot);
    newInput.type = 'text';
    newInput.placeholder = 'FOOD';

    document.getElementById('options').appendChild(newInput);
}

