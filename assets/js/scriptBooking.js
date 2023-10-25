// Function to handle the click event for date and time boxes
function handleClick(event) {
    // Remove 'active' class from all boxes in the same category
    const category = event.target.classList[0];
    const boxes = document.querySelectorAll(`.${category}`);
    boxes.forEach(box => {
        box.classList.remove('active');
    });

    // Add 'active' class to clicked box
    event.target.classList.add('active');

    // Update the instruction text
    updateInstructions();

    // Save the selected date and time to localStorage
    const activeDate = document.querySelector('.date-box.active');
    const activeTime = document.querySelector('.time-box.active');
    
    if (activeDate && activeTime) {
        const selectedDateTime = {
            date: activeDate.textContent,
            time: activeTime.textContent,
        };
        localStorage.setItem('selectedDateTime', JSON.stringify(selectedDateTime));
    }
}

// Function to update the instruction text
function updateInstructions() {
    const activeDate = document.querySelector('.date-box.active');
    const activeTime = document.querySelector('.time-box.active');
    const instructionElement = document.getElementById('instructions');

    if (activeDate && activeTime) {
        // Reformat date to add space between day and number
        const dateText = activeDate.textContent;
        const formattedDate = `${dateText.substring(0, 3)} ${dateText.substring(3)}`;

        instructionElement.textContent = `${formattedDate}, ${activeTime.textContent}`;
    }
}

// Function to generate date boxes dynamically
function generateDateBoxes() {
    const dateBoxesContainer = document.querySelector('.date-boxes');
    const currentDate = new Date();
    const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    for (let i = 0; i < 7; i++) {
        const dateBox = document.createElement('div');
        dateBox.classList.add('date-box');
        dateBox.textContent = `${dayNames[currentDate.getDay()]} ${currentDate.getMonth() + 1}/${currentDate.getDate()}`;

        if (i === 3) {
            dateBox.classList.add('active');
        }

        dateBoxesContainer.appendChild(dateBox);
        currentDate.setDate(currentDate.getDate() + 1);
    }
}

// Add click event listeners to date and time boxes
function addEventListeners() {
    const dateBoxes = document.querySelectorAll('.date-box');
    dateBoxes.forEach(box => {
        box.addEventListener('click', handleClick);
    });

    const timeBoxes = document.querySelectorAll('.time-box');
    timeBoxes.forEach(box => {
        box.addEventListener('click', handleClick);
    });
}

// Call the functions to set up the page
generateDateBoxes();
addEventListeners();
// console.log(localStorage)