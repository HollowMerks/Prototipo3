import './bootstrap';

// Prevent browser back navigation
window.history.pushState(null, null, window.location.href);
window.onpopstate = function () {
    window.history.pushState(null, null, window.location.href);
};

// Create a hidden input to capture arrow keys
const hiddenInput = document.createElement('input');
hiddenInput.type = 'text';
hiddenInput.style.position = 'absolute';
hiddenInput.style.left = '-10000px';
hiddenInput.style.top = '-10000px';
hiddenInput.style.width = '1px';
hiddenInput.style.height = '1px';
hiddenInput.style.opacity = '0';
document.body.appendChild(hiddenInput);

// Focus the hidden input to capture keys
hiddenInput.focus();

// Prevent left and right arrow keys from navigating
document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
}, true); // Capture phase

// Refocus the hidden input if it loses focus
document.addEventListener('focusin', function(event) {
    if (event.target !== hiddenInput && !event.target.matches('input, textarea, select, [contenteditable]')) {
        hiddenInput.focus();
    }
});
