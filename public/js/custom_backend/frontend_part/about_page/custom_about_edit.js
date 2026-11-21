document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("image");
    const imagePreview = document.getElementById("aboutImagePreview");

    if (imageInput && imagePreview) {
        imageInput.addEventListener("change", function () {
            const file = this.files && this.files[0];

            if (!file) {
                return;
            }

            if (!file.type.startsWith("image/")) {
                this.value = "";
                return;
            }

            const reader = new FileReader();

            reader.onload = function (event) {
                imagePreview.src = event.target.result;
            };

            reader.readAsDataURL(file);
        });
    }
});
