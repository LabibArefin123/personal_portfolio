document.addEventListener("DOMContentLoaded", function () {
    const stack = document.querySelector(".hero-card-stack");

    if (!stack) return;

    let cards = [
        stack.querySelector(".main-card"),
        stack.querySelector(".second-card"),
        stack.querySelector(".third-card"),
    ];

    function updateCardClasses() {
        cards.forEach((card) => {
            card.classList.remove("main-card", "second-card", "third-card");
        });

        cards[0].classList.add("main-card");
        cards[1].classList.add("second-card");
        cards[2].classList.add("third-card");
    }

    stack.addEventListener("click", function () {
        const firstCard = cards.shift();
        cards.push(firstCard);
        updateCardClasses();
    });

    setInterval(() => {
        const firstCard = cards.shift();
        cards.push(firstCard);
        updateCardClasses();
    }, 10000);
});
