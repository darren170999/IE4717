const hallId = localStorage.getItem('hall_id');
const dates = localStorage.getItem('dates');
const timings = localStorage.getItem('timings');

// Construct the URL
const url = `your_script.php?hall_id=${hallId}&dates=${dates}&timings=${timings}`;

// Redirect to the new URL
window.location.href = url;