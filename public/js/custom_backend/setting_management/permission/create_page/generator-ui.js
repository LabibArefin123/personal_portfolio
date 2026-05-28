document.addEventListener("DOMContentLoaded", function () {
    const style = document.createElement("style");

    style.innerHTML = `

    .permission-generator-card {

        border-radius:18px;
    }

    .permission-input {

        height:52px;

        border-radius:14px;
    }

    .permission-counter-badge {

        background:#0d6efd;
        color:#fff;

        padding:8px 16px;

        border-radius:30px;

        font-size:14px;
        font-weight:700;
    }

    .generated-permission-list {

        display:flex;
        flex-direction:column;

        gap:14px;

        max-height:450px;

        overflow-y:auto;
    }

    .generated-permission-item {

        cursor:pointer;
        margin:0;
    }

    .generated-permission-item input {

        display:none;
    }

    .generated-permission-content {

        display:flex;
        align-items:center;

        gap:14px;

        padding:14px 18px;

        border:1px solid #dee2e6;

        border-radius:14px;

        transition:0.25s ease;
    }

    .generated-permission-item:hover .generated-permission-content {

        border-color:#0d6efd;
    }

    .generated-circle {

        width:22px;
        height:22px;

        border-radius:50%;

        border:2px solid #ced4da;

        transition:0.25s ease;

        flex-shrink:0;
    }

    .generated-permission-item input:checked
    + .generated-permission-content {

        border-color:#0d6efd;

        background:rgba(13,110,253,0.05);
    }

    .generated-permission-item input:checked
    + .generated-permission-content .generated-circle {

        background:#0d6efd;

        border-color:#0d6efd;
    }

    .selected-permission-wrapper {

        display:flex;
        flex-wrap:wrap;

        gap:10px;
    }

    .selected-permission-badge {

        background:#0d6efd;
        color:#fff;

        padding:10px 16px;

        border-radius:40px;

        display:flex;
        align-items:center;

        gap:10px;

        font-size:13px;

        cursor:pointer;
    }

    .selected-permission-badge:hover {

        background:#0b5ed7;
    }

    .permission-modal-content {

        border-radius:20px;

        border:none;
    }

    .save-final-btn {

        border-radius:12px;

        padding:12px 22px;

        font-weight:600;
    }

    `;

    document.head.appendChild(style);
});
