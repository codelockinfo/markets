
document.querySelectorAll('.nav-link').forEach((button) => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.nav-link').forEach((btn) => {
            btn.classList.remove('active');
        });

        button.classList.add('active');
    });
});



function toggleDropdown(id) {
    const dropdowns = document.querySelectorAll('[id^="dropdown-"]');
    dropdowns.forEach(dropdown => {
        if (dropdown.id !== id) {
            dropdown.style.display = 'none';
        }
    });
    const currentDropdown = document.getElementById(id);
    if (currentDropdown) {
        if (currentDropdown.style.display === 'none' || currentDropdown.style.display === '') {
            currentDropdown.style.display = 'block'; 
        } else {
            currentDropdown.style.display = 'none';
        }
    }
}

function closeDropdowns() {
    const dropdowns = document.querySelectorAll('[id^="dropdown-"]');
    dropdowns.forEach(dropdown => {
        dropdown.style.display = 'none'; 
    });
}

document.getElementById("dropdown-icon").addEventListener("click", function(event) {
event.stopPropagation();  // Prevents triggering the button's click event
let dropdown = document.getElementById("dropdown-home");
if (dropdown.style.display === "none" || dropdown.style.display === "") {
dropdown.style.display = "block";
} else {
dropdown.style.display = "none";
}
});




    document.getElementById("toggleButton").addEventListener("click", function () {
        const sidebar = document.querySelector(".custom_header");
        sidebar.classList.toggle("hidden");
    });
