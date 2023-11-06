document.addEventListener("DOMContentLoaded", function() {
    const buyButton = document.getElementById("buy-button");
    if(buyButton){
        buyButton.addEventListener("click", function(event){
            event.preventDefault();
            const updateArrangementsEndpoint = "updateArrangements.php";
            async function fetchHalls(arrangements, hallId, dates, timings, location_id) {
                const url = `${updateArrangementsEndpoint}?hall_id=${hallId}&dates=${dates}&timings=${timings}&arrangements=${arrangements}&location_id=${location_id}`;
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
            const arrangements = localStorage.seatingArray.split(",").map(Number);
            const arrangement = JSON.stringify(arrangements);
            
            if (arrangement && hallId && dates && timings && location_id) {
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
                    fetchHalls(arrangement, hallId, formattedDate, formattedTime, location_id)
                    .then((data) => {
                        if (data !== null) {
                            console.log("Data received:", data);
                            if (data.error) {
                                console.error("Error from the server:", data.error);
                            } else {
                                everything = data;
                                window.location.href = "payment.php";
                            }
                        } else {
                            console.error("No data received from the server.");
                        }
                    })
                    .catch((error) => {
                        console.error("Fetch error:", error);
                    });
                }
            }
        })
    }
})        
        