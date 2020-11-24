jQuery(function ($) {
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#startDate").value = today;
});

