const advertisementEndpoint = "getAdvertisements.php";
let images = [];
let index = 0;

function fetchAdvertisements() {
    fetch(advertisementEndpoint)
        .then((response) => response.json())
        .then((data) => {
            images = data; // Update the images array with the fetched data
        })
        .catch((error) => console.error("Error fetching advertisements:", error))
        .finally(() => {
            changeBackground(); // Start the background rotation after fetching the images
        });
}

function changeBackground() {
    if (images.length > 0) {
        const imageURL = `data:image/jpeg;base64,${images[index].data}`;
        document.getElementById('background-carousel').style.backgroundImage = `url(${imageURL})`;

        index = (index + 1) % images.length;
    }

    setTimeout(changeBackground, 10000); // Change image every 10 seconds
}

// Call the fetchAdvertisements function to populate the images array
fetchAdvertisements();
