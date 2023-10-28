const getHallsEndpoint = "getHalls.php";
// let seatingArray = [0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0];
async function fetchHalls(hallId, dates, timings) {
    const url = `${getHallsEndpoint}?hall_id=${hallId}&dates=${dates}&timings=${timings}`;
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
const jsonObject = JSON.parse(localStorage.selectedDateTime);
const dates = jsonObject.date;
const timings = jsonObject.time;
// console.log(localStorage)

if (hallId && dates && timings) {
    console.log(hallId);

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

    if (formattedDate && formattedTime) {
        console.log(formattedDate); // The date is in "YYYY-MM-DD" format
        console.log(formattedTime); // The time is in 24-hour format
        // console.log(URL)
        // You can proceed with the fetchHalls function with the formattedDate and formattedTime
        fetchHalls(hallId, formattedDate, formattedTime)
            .then((data) => {
                if (data !== null) {
                    // everything = data;
                    seatingArray = JSON.parse(data.arrangements);
                    localStorage.setItem('seatingArray', seatingArray);
                    const zeroString = localStorage.getItem('seatingArray');
                    const zeroArray = zeroString.split(',').map(Number);
                    arrange(zeroArray);
                    // location.reload();
                    
                }
            });
    }
}
function arrange(zeroArray){
    let seatingArray = zeroArray;
    // Get the seating plan container element
    const seatingPlanContainer = document.querySelector('.seating-plan');
    
    // Loop through the array and create rows and seats
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
// Your array of seating information
// location.reload();