function Valid(lform) {
    const name = lform.name.value;
    const institution = lform.institution.value;
    const clas = lform.class.value;
    const cnum = lform.cnum.value;
    const subject = lform.subject.value;
    const location = lform.location.value;
    const salary = lform.salary.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");
    let e3 = document.getElementById("err3");
    let e4 = document.getElementById("err4");
    let e5 = document.getElementById("err5");
    let e6 = document.getElementById("err6");
    let e7 = document.getElementById("err7");



    let flag = true;

    // Clear previous errors
    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";
    e5.innerHTML = "";
    e6.innerHTML = "";
    e7.innerHTML = "";


    // Validate form fields
    if (name === "") {
        e1.innerHTML = "Please Provide Your Name";
        flag = false;
    }

    if (institution === "") {
        e2.innerHTML = "Please Enter Your Institution Name";
        flag = false;
    }

    if (clas === "") {
        e3.innerHTML = "Please Enter Your Current Class";
        flag = false;
    }

    if (cnum === "" || !validatePhoneNumber(cnum)) {
        e4.innerHTML = "Please Provide a Valid Mobile Number";
        flag = false;
    }

    if (subject === "") {
        e5.innerHTML = "Please Enter your readable subject's";
        flag = false;
    }

    if (location === "") {
        e6.innerHTML = "Please Provide Your Location";
        flag = false;
    }

    if (salary === "") {
        e7.innerHTML = "Please Provide Salary";
        flag = false;
    }

    if(flag){return true;}
    else{return false;}

}
