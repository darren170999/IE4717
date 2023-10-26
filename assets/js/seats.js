function toggleSeatColor(event) {
    const seat = event.target;

    if (seat.classList.contains('booked')) {
        return; // Exit the function and do nothing for reserved seats
    }
    // console.log(seat)
    const seatID = seat.id;
    const selectedSeatsList = document.getElementById('selected-seats-list');
    const jsonObject = JSON.parse(localStorage.selectedDateTime);
    
    // Check if dateTimeItem already exists
    let dateTimeItem = selectedSeatsList.querySelector('.date-time-item');
    
    if (!dateTimeItem) {
        // If it doesn't exist, create and append it
        dateTimeItem = document.createElement('li');
        dateTimeItem.classList.add('date-time-item');
        
        // Create an icon for Date
        const dateIcon = document.createElement('img');
        dateIcon.src = '../IE4717/assets/img/calendar.png'; // Path to your custom calendar icon
        dateTimeItem.appendChild(dateIcon);

        // Create a span element for styling text
        const dateText = document.createElement('span');
        dateText.style.fontSize = '18px'; // Adjust the font size as needed
        dateText.style.color = 'yellow'; // Set the text color to yellow
        dateText.textContent = `Date: ${jsonObject.date}`;
        dateTimeItem.appendChild(dateText);

        // Create an icon for Time
        const timeIcon = document.createElement('img');
        timeIcon.src = '../IE4717/assets/img/hourglass.png'; // Path to your custom clock icon
        dateTimeItem.appendChild(timeIcon);

        const timeText = document.createElement('span');
        timeText.style.fontSize = '18px'; // Adjust the font size as needed
        timeText.style.color = 'yellow'; // Set the text color to yellow
        timeText.textContent = ` Time: ${jsonObject.time}`;
        dateTimeItem.appendChild(timeText);

        selectedSeatsList.appendChild(dateTimeItem);
    }
    // Check if the seat is already selected
    const isSelected = seat.classList.contains('selected');

    if (isSelected) {
        // Seat is currently selected, so unselect it
        seat.classList.remove('selected');
        
        // Find and remove the corresponding seat ID from the list
        const listItem = Array.from(selectedSeatsList.children).find(item => {
            return item.textContent.includes(`Seat ID: ${seatID}`);
        });

        if (listItem) {
            listItem.remove();
        }
    } else {
        // Seat is not selected, so select it
        seat.classList.add('selected');

        // Add the seat ID to the list
        const listItem = document.createElement('li');

        // Create an icon for Seat
        const seatIcon = document.createElement('img');
        seatIcon.src = '../IE4717/assets/img/ticket.png'; // Path to your custom seat icon
        listItem.appendChild(seatIcon);

        listItem.textContent = ` Seat ID: ${seatID}`;
        selectedSeatsList.appendChild(listItem);

        // Check if Buy button should be displayed
        const buyButton = document.getElementById('buy-button');
        buyButton.style.display = 'block';
    }

}

const seats = document.querySelectorAll('.seat');
seats.forEach(seat => {
    seat.addEventListener('click', toggleSeatColor);
});
