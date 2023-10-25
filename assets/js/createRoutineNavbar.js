document.addEventListener('DOMContentLoaded', function() {
    const currentDate = new Date();
    const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    
    for (let i = 0; i < 7; i++) {
        const nextDate = new Date(currentDate);
        nextDate.setDate(currentDate.getDate() + i);
        const dayOfWeek = daysOfWeek[nextDate.getDay()];
        const formattedDate = nextDate.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
        
        const button = document.createElement('button');
        button.className = 'tab-button';
        button.setAttribute('data-day', dayOfWeek);
        button.textContent = formattedDate;
        document.querySelector('.navbar').appendChild(button);
    }
});
