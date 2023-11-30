<html>
<head>
    <title>Signup</title>
    <script>
        function validateForm() {
            var userName = document.getElementById('UserName').value;
            var fullName = document.getElementById('Full_Name').value;
            var gender = document.querySelector('input[name="gender"]:checked');
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;
            var phoneNumber = document.getElementById('number').value;
            // Regular expressions for validation
            var userNameRegex = /^[A-Za-z0-9]+$/;
            var fullNameRegex = /^[A-Za-z]+(\s[A-Za-z]+)+$/;
            var emailRegex = /\S+@\S+\.\S+/;
            var passwordRegex = /[A-Za-z0-9_ ]{10,}/;
            var phoneNumberRegex = /^01[0-9]{9}$/;
            // Validate User Name
            if (!userNameRegex.test(userName)) {
                alert('Please enter a valid User Name with letters and numbers only.');
                return false;
            }
            // Validate Full Name
            if (!fullNameRegex.test(fullName)) {
                alert('Please enter at least two words with letters and spaces only.');
                return false;
            }
            // Validate Gender
            if (!gender) {
                alert('Please select a gender.');
                return false;
            }
            // Validate Email
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }
            // Validate Password
            if (!passwordRegex.test(password)) {
                alert('Password must be at least 10 characters and can only contain letters, numbers, underscore, and space.');
                return false;
            }
            // Validate Confirm Password
            if (password !== confirmPassword) {
                alert('Error: Passwords do not match.');
                return false;
            }
            // Validate Phone Number
            if (!phoneNumberRegex.test(phoneNumber)) {
                alert('Please enter a valid 11-digit phone number starting with "01".');
                return false;
            }
            return true;
        }
    </script>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">
    <ul class="navbar" style="list-style-type: none; margin: 0; padding: 0; background-color: black; overflow: hidden;">
        <li>
              <img src="logo.jpg" alt="Famished Logo" style="height: 100px;">
        </li>
       
        <li style="float: right;"><a class="login-button" href="../view/Login.html" style="background-color: #555; border: none; color: white; text-align: center; text-decoration: none; display: inline-block; padding: 14px 16px; margin: 8px 4px; cursor: pointer;">Login</a></li>
        <li style="float: right;"><a class="signup-button" href="../view/Signup.html" style="background-color: #555; border: none; color: white; text-align: center; text-decoration: none; display: inline-block; padding: 14px 16px; margin: 8px 4px; cursor: pointer;">Signup</a></li>

    </ul>
                       
        <div class="container">
        <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
            </div>
            <div class="panel-body">

            <fieldset>
                    <legend><h3>Sign Up</h3></legend>
                    <form action="../controller/connect.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="UserName">User Name</label>
                    <input type="text" class="form-control" id="UserName" name="UserName" pattern="[A-Za-z0-9]+" title="Please enter a one-word username with letters and numbers only" required />
                </div>

                <div class="form-group">
                    <label for="Full_Name">Full Name</label>
                    <input type="text" class="form-control" id="Full_Name" name="Full_Name" pattern="[A-Za-z]+(\s[A-Za-z]+)+" title="Please enter at least two words with letters and spaces only" required />
                </div>

                <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                    <label for="male" class="radio-inline"><input type="radio" name="gender" value="male" id="male" required />Male</label>
                    <label for="female" class="radio-inline"><input type="radio" name="gender" value="female" id="female" required />Female</label>
                    <label for="others" class="radio-inline"><input type="radio" name="gender" value="others" id="others" required />Others</label>
                </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" pattern="[A-Za-z0-9_ ]{10,}" title="Password must be at least 10 characters and can only contain letters, numbers, underscore, and space" required />
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" pattern="[A-Za-z0-9_ ]{10,}" title="Please enter the same password as above" required />
                </div>

                <div class="form-group">
                  <label for="number">Phone Number</label>
                  <input type="text" class="form-control" id="number" name="number" pattern="01[0-9]{9}" title="Please enter a valid 11-digit phone number starting with '01'" required />
                </div>
                  <input type="submit" value="Sign Up">
				          <p>Already have an acccount?<a href="../view/login.html">Log In</a></p>
                </form>
          </fieldset>
            </div>            
        </div>
        </div>      
        </div>
</body>
</html>
