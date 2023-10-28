document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById("locationModal");
    const closeBtn = document.querySelector(".close");
    const modalTitle = document.getElementById("modal-title");
    const modalAddress = document.getElementById("modal-address");
    const modalEmail = document.getElementById("modal-email");
    const modalBusinessNumber = document.getElementById("modal-business-number");
    const modalOpeningHours = document.getElementById("modal-opening-hours");

    const locationDetails = {
        "GREAT WORLD CITY": {
            address: "1 Kim Seng Promenade, #03-125, Singapore 237994",
            email: "support_greatworld@pureframe.com",
            businessNumber: "+65 1234-3333",
            openingHours: "Daily 10:00 AM to 12:00 AM"
        },
        "JURONG POINT": {
            address: "1 Jurong West Central 1, #03 - 26 26A, Singapore 648886",
            email: "support_jurongpoint@pureframe.com",
            businessNumber: "+65 1234-4444",
            openingHours: "Daily 10:00 AM to 12:00 AM"
        },
        "TIONG BAHRU PLAZA": {
            address: "302 Tiong Bahru Rd, #04 - 105, Singapore 168732",
            email: "support_tiongbahru@pureframe.com",
            businessNumber: "+65 1234-5555",
            openingHours: "Daily 10:00 AM to 12:00 AM"
        },
        "JUNCTION 8 BISHAN": {
            address: "9 Bishan Pl, #04-03 Bishan Bus Interchange, Singapore 579837",
            email: "support_junction8@pureframe.com",
            businessNumber: "+65 1234-6666",
            openingHours: "Daily 10:00 AM to 12:00 AM"
        },
        "SUNTEC CITY": {
            address: "3 Temasek Blvd, #03-373, Singapore 038983",
            email: "support_suntec@pureframe.com",
            businessNumber: "+65 1234-7777",
            openingHours: "Daily 10:00 AM to 12:00 AM"
        },
        "i12 KATONG": {
            address: "112, 05-01 E Coast Rd, Katong 112, 428802",
            email: "support_katong@pureframe.com",
            businessNumber: "+65 1234-8888",
            openingHours: "Daily 10:00 AM to 12:00 AM"
        }
    };

    // Get all location buttons and loop through them
    const locationBtns = document.querySelectorAll(".location-btn");
    locationBtns.forEach((btn) => {
        btn.addEventListener("click", function() {
            const locationName = this.innerText;
            const details = locationDetails[locationName];
            if (details) {
                modalTitle.innerText = `LOCATION: ${locationName}`;
                modalAddress.innerText = `Address: ${details.address}`;
                modalEmail.innerText = `Email Address: ${details.email}`;
                modalBusinessNumber.innerText = `Business Number: ${details.businessNumber}`;
                modalOpeningHours.innerText = `Opening Hours: ${details.openingHours}`;
            }
            modal.style.display = "block";
        });
    });

    // When the user clicks on <span> (x), close the modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});
