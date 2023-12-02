// Function to perform AJAX requests
function ajaxRequest(url, method, data, successCallback, errorCallback) {
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                successCallback(xhr.responseText);
            } else {
                errorCallback(xhr.status);
            }
        }
    };

    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);
}

// Function to validate NULL values
function validateNull(value) {
    return value.trim() !== "";
}

// Function to add a new employee
function addEmployee() {
    var name = document.getElementById("add-name").value;
    var contact_no = document.getElementById("add-contact_no").value;
    var username = document.getElementById("add-username").value;
    var password = document.getElementById("add-password").value;

    // Validate NULL values
    if (!validateNull(name) || !validateNull(contact_no) || !validateNull(username) || !validateNull(password)) {
        alert("Please fill in all fields.");
        return;
    }

    // Perform AJAX request to add employee
    var data = "name=" + name + "&contact_no=" + contact_no + "&username=" + username + "&password=" + password;
    
    ajaxRequest("server.php?action=addEmployee", "POST", data, function (response) {
        // Handle success
        alert("Employee added successfully!");
    }, function (status) {
        // Handle error
        alert("Error adding employee. Status: " + status);
    });
}

// Function to update an employee
function updateEmployee() {
    var id = document.getElementById("update-id").value;
    var name = document.getElementById("update-name").value;
    var contact_no = document.getElementById("update-contact_no").value;
    var username = document.getElementById("update-username").value;
    var password = document.getElementById("update-password").value;

    // Validate NULL values
    if (!validateNull(id) || !validateNull(name) || !validateNull(contact_no) || !validateNull(username) || !validateNull(password)) {
        alert("Please fill in all fields.");
        return;
    }

    // Perform AJAX request to update employee
    var data = "id=" + id + "&name=" + name + "&contact_no=" + contact_no + "&username=" + username + "&password=" + password;
    
    ajaxRequest("server.php?action=updateEmployee", "POST", data, function (response) {
        // Handle success
        alert("Employee updated successfully!");
    }, function (status) {
        // Handle error
        alert("Error updating employee. Status: " + status);
    });
}

// Function to search for an employee
function searchEmployee() {
    var searchTerm = document.getElementById("search").value;

    // Perform AJAX request to search for employee
    ajaxRequest("server.php?action=searchEmployee&searchTerm=" + searchTerm, "GET", null, function (response) {
        // Handle success
        document.getElementById("employee-list").innerHTML = response;
    }, function (status) {
        // Handle error
        alert("Error searching for employee. Status: " + status);
    });
}
