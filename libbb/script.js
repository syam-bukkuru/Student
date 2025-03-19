document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".slide");
    let index = 0;

    function showSlides() {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? "1" : "0"; // Smooth transition
        });

        index = (index + 1) % slides.length; // Cycle through images
        setTimeout(showSlides, 3000); // Change image every 3s
    }

    showSlides();

    // 🌸 Flower animation
    function createFlower() {
        let flower = document.createElement("div");
        flower.classList.add("flower");
        flower.style.left = Math.random() * window.innerWidth + "px";
        flower.style.top = "-10px";
        flower.innerHTML = "🌸";
        document.body.appendChild(flower);

        setTimeout(() => flower.remove(), 5000);
    }

    setInterval(createFlower, 1000);
});
