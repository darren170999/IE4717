document.addEventListener("DOMContentLoaded", function() {
    // Retrieve values from localStorage
    const movieTitle = localStorage.getItem('movie_title');
    const jsonObject = JSON.parse(localStorage.selectedDateTime);
    const dates = jsonObject.date;
    const timings = jsonObject.time;
    const ticketNumbersArr = localStorage.getItem('seatingArray');
    const integers = ticketNumbersArr.split(',').map(Number);
    const ratings = localStorage.getItem('ratings');
    const hall = localStorage.getItem('hall_id');
    // Find the indices where the value is 2
    const indicesWithValue2 = [];
    for (let i = 0; i < integers.length; i++) {
        if (integers[i] === 2) {
            indicesWithValue2.push(i);
        }
    }
    const price = parseFloat(localStorage.getItem('price'));
    const calculatedPrice = price * indicesWithValue2.length;
    const total = calculatedPrice + 1.00;
    localStorage.setItem('total', total);
    if (movieTitle) {
        document.querySelector('.movie-info').innerHTML = `
            <strong>${movieTitle}</strong><br>
            Ratings: ${ratings}
        `;
        document.querySelector('.booking-info').innerHTML = `
            ${dates} ${timings} <br>
            Hall: ${hall} <br>
            Seat ID: ${indicesWithValue2}
        `;
        
        document.querySelectorAll('.price-line')[1].innerHTML = `
            <span>${indicesWithValue2.length} x Ticket(s)</span>
            <span>S$${calculatedPrice}</span>
        `;
        
        document.querySelectorAll('.price-line')[2].innerHTML = `
            <span>Convenience Fee</span>
            <span>S$${1.00}</span>
        `;
        
        document.querySelector('.total-price .price-line').innerHTML = `
            <span>TOTAL PRICE</span>
            <span>S$${total}</span>
        `;
    }
});
