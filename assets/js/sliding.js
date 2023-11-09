const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

document.getElementById("signUp_button").addEventListener("click", function (event) {
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var password2 = document.getElementById("password2").value;
	var email = document.getElementById("email").value;
	var contact = document.getElementById("contact").value;

	if (username === "" || password === "" || password2 === "" || email === "" || contact === "") {
		alert("Please fill in all required fields.");
		event.preventDefault(); // Prevent the form from submitting
	}
});

document.getElementById("signIn_button").addEventListener("click", function (event) {
	var username = document.getElementById("usernameT").value;
	var password = document.getElementById("passwordT").value;

	if (username === "" || password === "") {
		alert("Please fill in all required fields.");
		event.preventDefault(); // Prevent the form from submitting
	}
});
var adminNotification = document.getElementById("adminNotification");
var openModal = document.getElementById("forgotPassword");
openModal.onclick = function() {
	// modal.style.display = "block";
	// Show the admin notification
	adminNotification.style.display = "block";
}
window.onclick = function(event) {
	if (event.target === modal) {
		// modal.style.display = "none";
		// Hide the admin notification
		adminNotification.style.display = "none";
	}
}