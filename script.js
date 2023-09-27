document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#datepicker-checkin", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: [
            function(date) {
                return (date.getDay() === 0 || date.getDay() === 6);  // Disable weekends
            }
        ]
    });

    flatpickr("#datepicker-checkout", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: [
            function(date) {
                return (date.getDay() === 0 || date.getDay() === 6);  // Disable weekends
            }
        ]
    });

});
