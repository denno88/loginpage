


// auth.js
window.onload = function() {
var landingPageLink = document.getElementById('landingPageLink');

landingPageLink.addEventListener('click', function(event) {
event.preventDefault(); // Prevent the default behavior of the link

// Check if the user is authenticated (logged in)
var isAuthenticated = checkAuthentication();

if (isAuthenticated) {
    // If authenticated, check if the user is authorized (registered)
    var isAuthorized = checkAuthorization();
    
    if (isAuthorized) {
        // If authorized, redirect to the landing page
        window.location.href = 'landing.html';
    } else {
        alert('You need to register to access the landing page.');
    }
} else {
    alert('Please log in to access the landing page.');
}
});
};

function checkAuthentication() {
// Implement your authentication logic here
// For example, check if the user is logged in
// Return true if authenticated, false otherwise
return true; // Example: Assume the user is always authenticated for simplicity
}

function checkAuthorization() {
// Implement your authorization logic here
// For example, check if the user is registered
// Return true if authorized, false otherwise
// Example: Assume the user is registered for simplicity
return true;
}  