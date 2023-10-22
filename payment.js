document.addEventListener("DOMContentLoaded", function() {
    // Payment methods
    const paymentMethods = document.querySelectorAll('.payment-method');
    const cardInfoDiv = document.querySelector('.card-info');
    // Error spans
    const nameError = document.getElementById("nameError");
    const cardNumberError = document.getElementById("cardNumberError");
    const dateError = document.getElementById("dateError");
    const cvcError = document.getElementById("cvcError");
    const zipError = document.getElementById("zipError");
    const countryError = document.getElementById("countryError"); // New error span
    // Inputs
    const nameField = document.querySelector('.name-input');
    const cardField = document.querySelector('.card-input');
    const dateField = document.querySelector('.date-input');
    const cvcField = document.querySelector('.cvc-input');
    const zipField = document.querySelector('.zip-input');
    const countryField = document.querySelector('.country-select'); // New input field
    // Submit button
    const submitBtn = document.getElementById("submit");
    submitBtn.style.backgroundColor = "grey"; // Set the initial background color to grey

    // Set the minimum date as tomorrow
    let today = new Date();
    let dd = today.getDate() + 1;
    let mm = today.getMonth() + 1;
    let yyyy = today.getFullYear();
    if (dd < 10) dd = '0' + dd;
    if (mm < 10) mm = '0' + mm;
    today = yyyy + '-' + mm + '-' + dd;
    dateField.setAttribute("min", today);

    paymentMethods.forEach((method) => {
        method.addEventListener('click', () => {
            cardInfoDiv.style.display = 'block';
        });
    });

    // Validate Name
    nameField.addEventListener('input', () => {
        const nameRegex = /^[a-zA-Z\s]{3,}$/;
        if (nameRegex.test(nameField.value)) {
            nameError.textContent = "";
        } else {
            nameError.textContent = "Invalid Name.";
        }
        checkAllFields();
    });

    // Validate Card Number
    cardField.addEventListener('input', () => {
        const cardRegex = /^\d{16}$/;
        if (cardRegex.test(cardField.value)) {
            cardNumberError.textContent = "";
        } else {
            cardNumberError.textContent = "Invalid Card Number.";
        }
        checkAllFields();
    });

    // Validate Date
    dateField.addEventListener('input', () => {
        const inputDate = new Date(dateField.value);
        const currentDate = new Date();
        if (inputDate > currentDate) {
            dateError.textContent = "";
        } else {
            dateError.textContent = "Invalid Date.";
        }
        checkAllFields();
    });

    // Validate CVC
    cvcField.addEventListener('input', () => {
        const cvcRegex = /^\d{3}$/;
        if (cvcRegex.test(cvcField.value)) {
            cvcError.textContent = "";
        } else {
            cvcError.textContent = "Invalid CVC.";
        }
        checkAllFields();
    });

    // Validate ZIP
    zipField.addEventListener('input', () => {
        const zipRegex = /^\d{6}$/;
        if (zipRegex.test(zipField.value)) {
            zipError.textContent = "";
        } else {
            zipError.textContent = "Invalid ZIP.";
        }
        checkAllFields();
    });

    // Validate Country
    countryField.addEventListener('change', () => {
        if (countryField.value === "") {
            countryError.textContent = "Please select a country.";
        } else {
            countryError.textContent = "";
        }
        checkAllFields();
    });

    // Function to enable or disable the submit button
    function checkAllFields() {
        if (
            nameError.textContent === "" &&
            cardNumberError.textContent === "" &&
            dateError.textContent === "" &&
            cvcError.textContent === "" &&
            zipError.textContent === "" &&
            countryError.textContent === ""
        ) {
            submitBtn.disabled = false;
            submitBtn.style.backgroundColor = "#FFC300";
            submitBtn.addEventListener('click', function() {
                window.location.href = 'confirmation.html';
            });
        } else {
            submitBtn.disabled = true;
            submitBtn.style.backgroundColor = "grey";
        }
    }

    // Call checkAllFields function whenever any field is updated
    nameField.addEventListener('input', checkAllFields);
    cardField.addEventListener('input', checkAllFields);
    dateField.addEventListener('input', checkAllFields);
    cvcField.addEventListener('input', checkAllFields);
    zipField.addEventListener('input', checkAllFields);
    countryField.addEventListener('change', checkAllFields);
});
