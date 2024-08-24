import './bootstrap';

const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');

dropdownButton.addEventListener('click', function() {
    dropdownMenu.classList.toggle('opacity-0');
    dropdownMenu.classList.toggle('invisible');
    dropdownMenu.classList.toggle('scale-95');
    dropdownMenu.classList.toggle('opacity-100');
    dropdownMenu.classList.toggle('scale-100');
});
