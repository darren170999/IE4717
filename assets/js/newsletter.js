document.getElementById('newsletter-form').onsubmit = function(event) {
  event.preventDefault();
  var emailInput = document.getElementById('email-subscription');
  if (emailInput.value === '') {
    alert('Please enter your email first.');
    return false;
  }

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email validation regex
  if (!emailRegex.test(emailInput.value)) {
    alert('Please enter a valid email address.');
    return false;
  }

  // If email is valid, hide the input group and show the thank you message
  document.querySelector('.newsletter-input-group').style.display = 'none';
  document.getElementById('subscription-thankyou').style.display = 'block';
};