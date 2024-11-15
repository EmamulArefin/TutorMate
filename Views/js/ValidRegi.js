function Valid(lform) {
    const name = lform.name.value;
    const gender = lform.gender.value;
    const institution = lform.institution.value;
    const role = lform.role.value;
    const Class = lform.class.value;
    const experience = lform.experience.value;
    const cnum = lform.cnum.value;
    const email = lform.email.value;
    const subject = lform.subject.value;
    const location = lform.location.value;
    const salary = lform.salary.value;
    const password = lform.password.value;
    const cpassword = lform.cpassword.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");
    let e3 = document.getElementById("err3");
    let e4 = document.getElementById("err4");
    let e5 = document.getElementById("err5");
    let e6 = document.getElementById("err6");
    let e7 = document.getElementById("err7");
    let e8 = document.getElementById("err8");
    let e9 = document.getElementById("err9");
    let e10 = document.getElementById("err10");
    let e11 = document.getElementById("err11");
    let e12 = document.getElementById("err12");
    let e13 = document.getElementById("err13");
    let e14 = document.getElementById("err14");


    let flag = true;

    // Clear previous errors
    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";
    e5.innerHTML = "";
    e6.innerHTML = "";
    e7.innerHTML = "";
    e8.innerHTML = "";
    e9.innerHTML = "";
    e10.innerHTML = "";
    e11.innerHTML = "";
    e12.innerHTML = "";
    e13.innerHTML = "";
    e14.innerHTML = "";


    // Validate form fields
    if (name === "") {
        e1.innerHTML = "Please Provide Your Name";
        flag = false;
    }

    if (gender === "") {
        e2.innerHTML = "Please Select Your Gender";
        flag = false;
    }

    if (institution === "") {
        e3.innerHTML = "Please Select Your Institution";
        flag = false;
    }

    if (role === "") {
        e4.innerHTML = "Please Select Your Role";
        flag = false;
    }

    if (Class === "" && role === "Student") {
        e5.innerHTML = "Please Enter Your Class";
        flag = false;
    }

    if (experience === "" && role === "Tutor" ) {
        e14.innerHTML = "Please Enter Your Experience";
        flag = false;
    }

    if (cnum === "" || !validatePhoneNumber(cnum)) {
        e6.innerHTML = "Please Provide a Valid Mobile Number";
        flag = false;
    }

    if (email === "" || !validateEmail(email)) {
        e7.innerHTML = "Please Provide a Valid Email";
        flag = false;
    }

    if (subject === "") {
        e8.innerHTML = "Please Enter your readable subject's";
        flag = false;
    }

    if (location === "") {
        e9.innerHTML = "Please Provide Your Location";
        flag = false;
    }

    if (salary === "") {
        e10.innerHTML = "Please Provide Salary";
        flag = false;
    }

    if (password === "") {
        e11.innerHTML = "Please Enter Your Password";
        flag = false;
    }

    if (password.length < 6) {
        e11.innerHTML = "Password cannot be less than 6 characters";
        flag = false;
    }

    if (cpassword === "") {
        e12.innerHTML = "Confirm Password Cannot Be Empty";
        flag = false;
    }

    if (cpassword !== password) {
        e12.innerHTML = "Password and Confirm Password Do Not Match";
        flag = false;
    }

    // Perform AJAX email check if all validations pass
    if (flag) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../Models/Checkmail.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === "exists") {
                    e7.innerHTML = "Email already exists";
                } else {
                    e13.innerHTML = "Registration Successful.....Let's Nacho";
                    lform.submit();
                }
            }
        };
        xhr.send("Email=" + encodeURIComponent(email));
    }

    return false; // Prevent form submission unless AJAX validation passes
}

function validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function validatePhoneNumber(phoneNumber) {
    const regex = /^(?:\+88\d{11}|\d{11})$/; // Adjust regex if needed for specific phone formats
    return regex.test(phoneNumber);
}
