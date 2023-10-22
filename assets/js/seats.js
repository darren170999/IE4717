function toggleSeatColor(event) {
    const seat = event.target;
    seat.classList.toggle('selected');
    const seatID = seat.id;
    const selectedSeatsList = document.getElementById('selected-seats-list');
    if (selectedSeatsList.children.length === 0) {
        const dateTimeItem = document.createElement('li');
        dateTimeItem.textContent = `Selected DateTime: ${localStorage.selectedDateTime}`;
        selectedSeatsList.appendChild(dateTimeItem);
    }
    
    const listItem = document.createElement('li');
    listItem.textContent = `Seat ID: ${seatID}`;
    selectedSeatsList.appendChild(listItem);

    const buyButton = document.getElementById('buy-button');
    buyButton.style.display = 'block';
}

const seats = document.querySelectorAll('.seat');
seats.forEach(seat => {
    seat.addEventListener('click', toggleSeatColor);
});

