document.addEventListener("DOMContentLoaded", function() {
    const delButton = document.getElementById("deleteAccountButton");
    if(delButton){
        delButton.addEventListener("click", function(event){
            event.preventDefault();
            const deleteAccountEndpoint = "deleteAccount.php";
            async function fetchHalls(arrangements, hallId, dates, timings, location_id, username, total) {
                const url = `${deleteAccountEndpoint}?hall_id=${hallId}&dates=${dates}&timings=${timings}&arrangements=${arrangements}&location_id=${location_id}&username=${username}&total=${total}`;
                console.log(url)
                try {
                const response = await fetch(url);
                const data = await response.json();
                return data;
                } catch (error) {
                    console.error("Error fetching arrangements:", error);
                    return null;
                }
            }
        })
    }
})