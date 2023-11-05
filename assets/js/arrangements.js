const getHallsEndpoint = "getHalls.php";
// let seatingArray = [0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0];
async function fetchHalls(hallId, dates, timings, location_id) {
    const url = `${getHallsEndpoint}?hall_id=${hallId}&location_id=${location_id}&dates=${dates}&timings=${timings}`;
    try {
        const response = await fetch(url);
        const data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching arrangements:", error);
        return null;
    }
}
const hallId = localStorage.getItem('hall_id');
const location_id = localStorage.getItem('location_id');
const jsonObject = JSON.parse(localStorage.selectedDateTime);
const dates = jsonObject.date;
const timings = jsonObject.time;
// console.log(localStorage)

if (hallId && dates && timings && location_id) {
    // console.log(hallId);

    // Function to format the date to "YYYY-MM-DD" format
    const formatDate = (inputDate) => {
        const date = new Date(inputDate);
        console.log(inputDate)
        if (!isNaN(date.getTime())) {
            // Valid date
            date.setFullYear(2023);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is 0-indexed
            const day = String(date.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;
            return formattedDate;
        } else {
            console.error('Invalid date');
            // Handle the error or show a message to the user
            return null;
        }
    };

    // Function to format the time to 24-hour format
    const formatTime = (inputTime) => {
        const timeRegex = /^(\d{1,2}):(\d{2})\s*([APap][Mm])?$/;
        const match = inputTime.match(timeRegex);
        if (match) {
            // Valid time
            let hours = parseInt(match[1], 10);
            const minutes = match[2];
            const period = match[3];
            if (period && period.toLowerCase() === 'pm' && hours < 12) {
                hours += 12;
            }
            const formattedTime = `${String(hours).padStart(2, '0')}:${minutes}:00`;
            return formattedTime;
        } else {
            console.error('Invalid time');
            // Handle the error or show a message to the user
            return null;
        }
    };

    // Format the date and time
    const formattedDate = formatDate(dates); // Format the date
    const formattedTime = formatTime(timings); // Format the time

    // if (formattedDate && formattedTime) {
        // fetch arrangement
        fetchHalls(hallId, formattedDate, formattedTime, location_id)
            .then((data) => {
                if (data !== null) {
                    // everything = data;
                    seatingArray = JSON.parse(data.arrangements);
                    // console.log(seatingArray)
                    // const zeroArray = seatingArray.split(',').map(Number);
                    localStorage.setItem('seatingArray', seatingArray);
                    // console.log(localStorage)
                    // const zeroString = localStorage.getItem('seatingArray');
                    // const zeroArray = zeroString.split(',').map(Number);
                    // arrange(zeroArray); 
                    // console.log("fecthed")
                    // location.reload();
                    
                }

            })
            .finally(() => {
                const zeroString = localStorage.getItem('seatingArray');
                const zeroArray = zeroString.split(',').map(Number);
                // console.log(zeroArray)
                arrange(zeroArray); // everytime i want to have a new arrangment i do this

                const seats = document.querySelectorAll('.seat');
                seats.forEach(seat => {

                    seat.addEventListener('click', toggleSeatColor);
                    console.log(localStorage.seatingArray);
                });
            });

        
    // }
}
// const zeroString = localStorage.getItem('seatingArray');
// const zeroArray = zeroString.split(',').map(Number);
// // console.log(zeroArray)
// arrange(zeroArray); // everytime i want to have a new arrangment i do this


function arrange(zeroArray){
    let seatingArray = zeroArray;
    // Get the seating plan container element
    const seatingPlanContainer = document.querySelector('.seating-plan');
    console.log(localStorage)
    var hall_id = localStorage.getItem("hall_id");
    // Loop through the array and create rows and seats
    if (hall_id == 1){
        for (let i = 0; i < seatingArray.length; i++) {
          // Create a new row div for every 10 seats
          if (i % 5 === 0) {
            const rowDiv = document.createElement('div');
            rowDiv.classList.add('row');
            seatingPlanContainer.appendChild(rowDiv);
          }
        
          // Create a new seat div
          const seatDiv = document.createElement('div');
          seatDiv.id = 'seat' + (i + 1);
        
          // Check if the seat is booked and add the appropriate class
          if (seatingArray[i] === 1) {
            seatDiv.classList.add('seatBooked');
          } else {
            seatDiv.classList.add('seat');
          }
        
          // Append the seat to the last row
          const lastRow = seatingPlanContainer.lastChild;
          lastRow.appendChild(seatDiv);
        }
    } else if (hall_id == 2) {
        for (let i = 0; i < seatingArray.length; i++) {
            // Create a new row div for every 10 seats
            if (i % 7 === 0) {
              const rowDiv = document.createElement('div');
              rowDiv.classList.add('row');
              seatingPlanContainer.appendChild(rowDiv);
            }
          
            // Create a new seat div
            const seatDiv = document.createElement('div');
            seatDiv.id = 'seat' + (i + 1);
          
            // Check if the seat is booked and add the appropriate class
            if (seatingArray[i] === 1) {
              seatDiv.classList.add('seatBooked');
            } else {
              seatDiv.classList.add('seat');
            }
          
            // Append the seat to the last row
            const lastRow = seatingPlanContainer.lastChild;
            lastRow.appendChild(seatDiv);
          }
    } else {
        for (let i = 0; i < seatingArray.length; i++) {
            // Create a new row div for every 10 seats
            if (i % 10 === 0) {
              const rowDiv = document.createElement('div');
              rowDiv.classList.add('row');
              seatingPlanContainer.appendChild(rowDiv);
            }
          
            // Create a new seat div
            const seatDiv = document.createElement('div');
            seatDiv.id = 'seat' + (i + 1);
          
            // Check if the seat is booked and add the appropriate class
            if (seatingArray[i] === 1) {
              seatDiv.classList.add('seatBooked');
            } else {
              seatDiv.classList.add('seat');
            }
          
            // Append the seat to the last row
            const lastRow = seatingPlanContainer.lastChild;
            lastRow.appendChild(seatDiv);
          }
    }
}
// Your array of seating information
// location.reload();

function toggleSeatColor(event) {
    const seat = event.target;
    console.log(seat);

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
        dateText.style.fontSize = '18px'; 
        dateText.style.color = '#FCC300';         
        dateText.textContent = `Date: ${jsonObject.date}`;
        dateTimeItem.appendChild(dateText);

        const timeIcon = document.createElement('img');
        timeIcon.src = '../IE4717/assets/img/hourglass.png'; 
        dateTimeItem.appendChild(timeIcon);

        const timeText = document.createElement('span');
        timeText.style.fontSize = '18px'; 
        timeText.style.color = '#FCC300'; 
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
        
        // Update the seatingArray to 0 for a deselected seat
        const seatNumber = parseInt(seatID.replace('seat', ''));
        let seatingArray = localStorage.seatingArray.split(',').map(Number);
        seatingArray[seatNumber - 1] = 0;
        console.log(seatingArray)
        const stringToSave = seatingArray.join(',');
        localStorage.setItem('seatingArray', stringToSave);
    } else {
        // Seat is not selected, so select it
        seat.classList.add('selected');
        const listItem = document.createElement('li');
    

        const seatIcon = document.createElement('img');
        seatIcon.src = '../IE4717/assets/img/ticket.png'; 
        listItem.appendChild(seatIcon);
    
        listItem.textContent = ` Seat ID: ${seatID}`;
        selectedSeatsList.appendChild(listItem);
    
        // Check if Buy button should be displayed
        const buyButton = document.getElementById('buy-button');
        buyButton.style.display = 'block';
    
        // Update the seatingArray to 2 for a selected seat
        const seatNumber = parseInt(seatID.replace('seat', ''));
        let seatingArray = localStorage.seatingArray.split(',').map(Number);
        seatingArray[seatNumber - 1] = 2;
        console.log(seatingArray)
        const stringToSave = seatingArray.join(',');
        localStorage.setItem('seatingArray', stringToSave);
    }
    console.log(localStorage)
    // Combine the seatingArray into a string and save to localStorage without trailing comma
    // const stringToSave = seatingArray.join(',');
    // localStorage.setItem('seatingArray', stringToSave);
    // console.log(stringToSave)
    // console.log(localStorage.seatingArray)

}
// console.log(document.querySelectorAll('.seat'));
// console.log(document.querySelectorAll('.seat'))
// const seats = document.querySelectorAll('.seat');
// seats.forEach(seat => {

//     seat.addEventListener('click', toggleSeatColor);
//     console.log(localStorage.seatingArray);
// });