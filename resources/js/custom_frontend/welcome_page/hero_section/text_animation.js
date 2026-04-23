document.addEventListener("DOMContentLoaded", function () {
    const textEl = document.getElementById("robotText");
    const text = "Labib Arefin";

    let index = 0;
    let isDeleting = false;

    function typeLoop() {
        if (!textEl) return;

        if (!isDeleting) {
            index++;
            textEl.textContent = text.substring(0, index);

            // 👉 pause when full text is typed
            if (index === text.length) {
                isDeleting = true;
                setTimeout(typeLoop, 1800); // longer pause (easy to read)
                return;
            }
        } else {
            index--;
            textEl.textContent = text.substring(0, index);

            // 👉 pause when empty
            if (index === 0) {
                isDeleting = false;
                setTimeout(typeLoop, 900); // small breathing gap
                return;
            }
        }

        // 👉 human-like random speed
        let baseSpeed = isDeleting ? 120 : 200;

        // add slight randomness (more natural)
        let variation = Math.random() * 60;

        setTimeout(typeLoop, baseSpeed + variation);
    }

    typeLoop();
});
