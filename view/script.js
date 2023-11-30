$(document).ready(function () {
    // Assuming your form has an id="order-form"
    $('#order-form').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'path/to/your/php/script.php',
            data: formData,
            success: function (response) {
                // Replace the existing content with the updated receipt
                $('#receipt-container').html(response);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });
});
