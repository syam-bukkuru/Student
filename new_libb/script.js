document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".slide");
    let index = 0;

    function showSlides() {
        slides.forEach(slide => slide.classList.remove("active")); // Hide all slides
        slides[index].classList.add("active"); // Show current slide
        index = (index + 1) % slides.length;
        setTimeout(showSlides, 3000); // Change every 3s
    }
    showSlides();
});
