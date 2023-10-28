// JavaScript for the accordion
document.addEventListener("DOMContentLoaded", function() {
    const accordions = document.querySelectorAll(".accordion");
  
    accordions.forEach((accordion) => {
      accordion.addEventListener("click", function() {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    });
  
    // JavaScript for Edit and Save buttons
    const editBtn = document.getElementById("editBtn");
    const saveBtn = document.getElementById("saveBtn");
  
    const nameSpan = document.getElementById("nameSpan");
    const nameInput = document.getElementById("nameInput");
  
    const emailSpan = document.getElementById("emailSpan");
    const emailInput = document.getElementById("emailInput");
  
    const contactSpan = document.getElementById("contactSpan");
    const contactInput = document.getElementById("contactInput");

    const genreSpan = document.getElementById("genreSpan");
    const genreInput = document.getElementById("genreInput");
  
    editBtn.addEventListener("click", function() {
      // Hide spans and show input fields
      nameSpan.style.display = "none";
      nameInput.style.display = "block";
      nameInput.value = nameSpan.textContent;
  
      emailSpan.style.display = "none";
      emailInput.style.display = "block";
      emailInput.value = emailSpan.textContent;
  
      contactSpan.style.display = "none";
      contactInput.style.display = "block";
      contactInput.value = contactSpan.textContent;
  
      genreSpan.style.display = "none";
      genreInput.style.display = "block";
      genreInput.value = genreSpan.textContent;

      // Swap buttons
      editBtn.style.display = "none";
      saveBtn.style.display = "block";
    });
  
    saveBtn.addEventListener("click", function() {
      // Update spans from input fields
      nameSpan.textContent = nameInput.value;
      emailSpan.textContent = emailInput.value;
      contactSpan.textContent = contactInput.value;
      genreSpan.textContent = genreInput.value;

      // Hide input fields and show spans
      nameInput.style.display = "none";
      nameSpan.style.display = "block";
  
      emailInput.style.display = "none";
      emailSpan.style.display = "block";
  
      contactInput.style.display = "none";
      contactSpan.style.display = "block";

      genreInput.style.display = "none";
      genreSpan.style.display = "block";
  
      // Swap buttons
      saveBtn.style.display = "none";
      editBtn.style.display = "block";
    });
  });
  
  
// JavaScript for the Modal
document.addEventListener("DOMContentLoaded", function() {
   // Get the modal
   const modal = document.getElementById("myModal");

   // Get the modal title
   const modalTitle = document.getElementById("modal-title");
 
   // Get all the posters
   const oppenheimerPoster = document.getElementById("oppenheimer-poster");
   const blackPantherPoster = document.getElementById("blackpanther-poster");
   const barbiePoster = document.getElementById("barbie-poster");
 
   // When Oppenheimer poster is clicked
   oppenheimerPoster.addEventListener("click", function() {
     modal.style.display = "block";
     modalTitle.innerHTML = '<span style="color:#FFC300; font-weight: bold;">OPPENHEIMER</span>';
   });
 
   // When Black Panther poster is clicked
   blackPantherPoster.addEventListener("click", function() {
     modal.style.display = "block";
     modalTitle.innerHTML = '<span style="color:#FFC300; font-weight: bold;">BLACK PANTHER</span>';
   });
 
   // When Barbie poster is clicked
   barbiePoster.addEventListener("click", function() {
     modal.style.display = "block";
     modalTitle.innerHTML = '<span style="color:#FFC300; font-weight: bold;">BARBIE</span>';
   });
 
   // Get the close button
   const closeBtn = document.querySelector(".close");
 
   // Close the modal when the close button is clicked
   closeBtn.addEventListener("click", function() {
     modal.style.display = "none";
   });
 
   // Close the modal when clicking outside of it
   window.addEventListener("click", function(event) {
     if (event.target === modal) {
       modal.style.display = "none";
     }
   });
});