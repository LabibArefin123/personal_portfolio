(() => {
    window.initContactCounter = (fields, elements) => {
        const message = fields.message;
        const counter = elements.characterCount;

        if (!message || !counter) return;

        const updateCounter = () => {
            counter.textContent = `${message.value.length} / 5000`;
        };

        message.addEventListener("input", updateCounter);

        updateCounter();
    };
})();
