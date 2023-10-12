// Function to handle the click event for date and time boxes
function handleClick(event) {
    // ...existing code...
    
    // Check if a date box was clicked
    if (event.target.className.includes('date-box')) {
        // Update time options based on selected date
        const date = event.target.textContent.split('<br>')[1];
        updateTimeOptions(date);
    }
    
    // Update the instruction text
    updateInstructions();
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

// Function to handle the click event for date and time boxes
function handleClick(event) {
    // Remove 'active' class from all boxes in the same category
    const boxes = document.querySelectorAll(`.${event.target.className}`);
    boxes.forEach(box => {
        box.classList.remove('active');
    });

    // Add 'active' class to clicked box
    event.target.classList.add('active');

    // Update the instruction text
    updateInstructions();
}

// Add click event listeners to date boxes
const dateBoxes = document.querySelectorAll('.date-box');
dateBoxes.forEach(box => {
    box.addEventListener('click', handleClick);
});

// Add click event listeners to time boxes
const timeBoxes = document.querySelectorAll('.time-box');
timeBoxes.forEach(box => {
    box.addEventListener('click', handleClick);
});
