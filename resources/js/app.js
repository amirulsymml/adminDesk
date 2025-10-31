import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import '@tabler/core/dist/js/tabler.min.js';
import './bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const configDropdown = document.querySelector('.nav-item.dropdown.active');
    if (configDropdown) {
        const dropdownToggle = configDropdown.querySelector('.nav-link.dropdown-toggle');
        if (dropdownToggle && !dropdownToggle.classList.contains('show')) {
            dropdownToggle.click(); // Trigger a click to open the dropdown
        }
    }
});
