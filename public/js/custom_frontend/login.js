document.addEventListener("DOMContentLoaded", function () {
    let lampOn = false;

    const lampSwitch = document.getElementById("lampSwitch");
    const lamp = document.getElementById("lamp");
    const loginCard = document.getElementById("loginCard");
    const status = document.getElementById("systemStatus");
    const body = document.body;

    lampSwitch.addEventListener("click", function () {
        lampSwitch.classList.add("pull");

        setTimeout(() => {
            lampSwitch.classList.remove("pull");
        }, 200);

        lampOn = !lampOn;

        if (lampOn) {
            body.classList.add("light-on");

            lamp.classList.add("active");

            loginCard.classList.remove("locked");

            status.innerHTML = "System Online";

            status.style.color = "#22c55e";
        } else {
            body.classList.remove("light-on");

            lamp.classList.remove("active");

            loginCard.classList.add("locked");

            status.innerHTML = "System Offline";

            status.style.color = "#ef4444";
        }
    });

    // PASSWORD TOGGLE
    const togglePassword = document.getElementById("togglePassword");

    togglePassword.addEventListener("click", function () {
        const password = document.getElementById("password");

        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });
});
