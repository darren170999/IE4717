// Define a function to refresh the page
function refreshPage() {
    if(localStorage.getItem("counter") === 1){
        localStorage.setItem("counter", 2)
        location.reload(); // This will reload the current page
    }
}

refreshPage();