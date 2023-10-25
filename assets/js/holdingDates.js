// Initialize or retrieve the seatStates array from localStorage
let seatStates = JSON.parse(localStorage.getItem('seatStates')) || [];

// Function to update the selected seats list and save to localStorage
function updateSelectedSeatsList(selectedSeatsList) {
    // Clear the list
    selectedSeatsList.innerHTML = '';

    // Add selected seats to the list and update the seatStates array
    for (let i = 0; i < seatStates.length; i++) {
        if (seatStates[i] === 1) {
            const listItem = document.createElement('li');

            // Create an icon for Seat
            const seatIcon = document.createElement('img');
            seatIcon.src = '../IE4717/assets/img/ticket.png'; // Path to your custom seat icon
            listItem.appendChild(seatIcon);

            listItem.textContent = ` Seat ID: ${i + 1}`;
            selectedSeatsList.appendChild(listItem);
        }
    }

    // Check if Buy button should be displayed
    const buyButton = document.getElementById('buy-button');
    buyButton.style.display = 'block';

    // Save the updated seatStates array to localStorage
    localStorage.setItem('seatStates', JSON.stringify(seatStates));
}

// Function to update seat states when a seat is clicked
function toggleSeatColor(event) {
    const seat = event.target;
    const seatID = seat.id;
    const selectedSeatsList = document.getElementById('selected-seats-list');
    const jsonObject = JSON.parse(localStorage.selectedDateTime);

    // Check if the seat is already selected
    const isSelected = seat.classList.contains('selected');
    const seatIndex = parseInt(seatID) - 1; // Assuming seat IDs are numeric

    if (isSelected) {
        // Seat is currently selected, so unselect it
        seat.classList.remove('selected');
        seatStates[seatIndex] = 0; // 0 represents unselected
    } else {
        // Seat is not selected, so select it
        seat.classList.add('selected');
        seatStates[seatIndex] = 1; // 1 represents selected
    }

    // Update the selected seats list and save to localStorage
    updateSelectedSeatsList(selectedSeatsList);
}

const seats = document.querySelectorAll('.seat');
seats.forEach((seat, index) => {
    if (seatStates[index] === 1) {
        seat.classList.add('selected');
    }
    seat.addEventListener('click', toggleSeatColor);
});

// Initial setup: Display selected seats from localStorage
const selectedSeatsList = document.getElementById('selected-seats-list');
updateSelectedSeatsList(selectedSeatsList);
 