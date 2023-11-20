$(document).ready(function() {
    $("#registrationForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../controller/register.php",
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
            }
        });
    });

    $("#loginForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../controller/login.php",
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                if (response === "Login successful") {
                    // Redirect or show employer dashboard
                }
            }
        });
    });
});
