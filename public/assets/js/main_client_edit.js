$(document).ready(function(){
    $( "#dropdownMenuLink" ).on( "click", function() {
        let dropdown = document.getElementById('dropdown-menu');
        if (dropdown.classList.contains('show')){
            dropdown.classList.remove('show');
        } else {
            dropdown.classList.add('show');
        }
    });

    $( ".dropdown-item" ).on( "click", function() {
        let id = this.id;
        let gender_field = document.getElementById('dropdownMenuLink');
        let gender_input = document.getElementById('gender-input');
        if (id == 'dropdown-item-female') {
            gender_field.textContent = 'Женский';
            gender_input.value = 0;
        } else if (id == 'dropdown-item-male') {
            gender_field.textContent = 'Мужской';
            gender_input.value = 1;
        }

    });
});

