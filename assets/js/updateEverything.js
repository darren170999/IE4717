document.addEventListener("DOMContentLoaded", function() {
    const buyButton = document.getElementById("buy-button");
    // console.log(buyButton)
    if(buyButton){
        buyButton.addEventListener("click", function(event){
            event.preventDefault();
            const updateArrangementsEndpoint = "updateArrangements.php";
            
            async function fetchHalls(arrangements, hallId, dates, timings) {
                // console.log(arrangements); // The date is in "YYYY-MM-DD" format
                // console.log(hallId); // The time is in 24-hour format
                // console.log(dates)
                // console.log(timings)
                const url = `${updateArrangementsEndpoint}?hall_id=${hallId}&dates=${dates}&timings=${timings}&arrangements=${arrangements}`;
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
            const arrangements = localStorage.seatingArray.split(",").map(Number);
            // Step 2: Convert the JavaScript array into a JSON array
            const arrangement = JSON.stringify(arrangements);
            // console.log(localStorage)
            
            if (arrangement && hallId && dates && timings) {
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
                    console.log(arrangement)
                    console.log(hallId)
                    // You can proceed with the fetchHalls function with the formattedDate and formattedTime
                    fetchHalls(arrangement, hallId, formattedDate, formattedTime)
                        .then((data) => {
                            if (data !== null) {
                                everything = data;
                                console.log(data)
                                window.location.href = "payment.php";
                                // seatingArray = JSON.parse(data.arrangements);
                                // localStorage.setItem('seatingArray', seatingArray);
                            }
                        });
                }
            }
        })
    }
})        
        