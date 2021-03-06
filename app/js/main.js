function showHide(){
    password = document.getElementById("password");
    if (password.type === "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }
}
function signUpshowHide(){
    password = document.getElementById("signup_password");
    if (password.type === "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }
}
function signUpShowHideConfirm(){
    password = document.getElementById("c_password");
    if (password.type === "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }
}
function validateLogin(){
    email = document.getElementById("email");
    password = document.getElementById("password");
    email_error = document.getElementById("email_error");
    password_error = document.getElementById("password_error");
    email_error.style.display="none";
    password_error.style.display="none";
    form = document.getElementById("player_login_form");
    is_validate = true;
    if(email.value.trim()==""){
        email_error.innerHTML = "E-mail can't be empty";
        email_error.style.display = "block";
        is_validate= false;
    }
    if(password.value == ""){
        password_error.innerHTML = "Password can't be empty";
        password_error.style.display = "block";
        is_validate = false;
    }
    if(is_validate){
        form.submit();
    }
}

function validateRegistration(){
    username = document.getElementById("username");
    email = document.getElementById("signup_email");
    password = document.getElementById("signup_password");
    c_password = document.getElementById("c_password");

    username_error = document.getElementById("username_error");
    email_error = document.getElementById("signup_email_error");
    password_error = document.getElementById("signup_password_error");

    username_error.style.display = "none";
    email_error.style.display= "none";
    password_error.style.display= "none";

    form = document.getElementById("player_registeration_form");

    is_validate = true;
    if(username.value.trim()==""){
        username_error.innerHTML = "E-mail can't be empty";
        username_error.style.display = "block";
        is_validate= false;
    }
    if(email.value.trim()==""){
        email_error.innerHTML = "E-mail can't be empty";
        email_error.style.display = "block";
        is_validate= false;
    }
    if(password.value == "" || c_password.value == ""){
        password_error.innerHTML = "Password can't be empty";
        password_error.style.display = "block";
        is_validate = false;
    }else{
        if (password.value.length < 8){
            password_error.innerHTML = "Password can't be less then 8";
            password_error.style.display = "block";
            is_validate=false;
        }
        if (String(password.value) !== String(c_password.value)){
            password_error.innerHTML = "Password and confirm password don't match";
            password_error.style.display = "block";
            is_validate=false;
        }
    }
    // console.log(String(password.value) !== String(c_password.value));
    
        if(is_validate){
            form.submit();
            // console.log("form has been submited");
        }
}
function Logoutconfirmation(){
    result = confirm("Are you sure you want to logout!");
    if (result){
        return true;
    }
    else{
        return false;
    }
}

function addQnsAnsValidation(){
    qns = document.getElementById('question');
    ans1 = document.getElementById('answer1');
    ans2 = document.getElementById('answer2');
    ans3 = document.getElementById('answer3');
    c_ans = document.getElementById('correctAns');
    qns_error = document.getElementById('qns_error');
    ans_error = document.getElementById('ans1_error');
    ans_error = document.getElementById('ans2_error');
    ans_error = document.getElementById('ans3_error');
    ans_error = document.getElementById('ans4_error');
    form = document.getElementById('addQnsAnsForm');

    qns_error.style.display = "none";
    ans_error.style.display = "none";

    is_validate = true;
    if(qns.value.trim()==""){
        qns_error.innerHTML = "Question cant be empty";
        qns_error.style.display = "block";
        qns_error.style.color = "red";
        is_validate= false;
    }
    if(ans1.value.trim()==""){
        ans1_error.innerHTML = "Answers one can't be empty";
        ans1_error.style.display = "block";
        ans1_error.style.color = "red";
        is_validate= false;
    }
    if(ans2.value.trim()==""){
        ans2_error.innerHTML = "Answers two can't be empty";
        ans2_error.style.display = "block";
        ans2_error.style.color = "red";
        is_validate= false;
    }
    if(ans3.value.trim()==""){
        ans3_error.innerHTML = "Answers three can't be empty";
        ans3_error.style.display = "block";
        ans3_error.style.color = "red";
        is_validate= false;
    }
    if(c_ans.value.trim()==""){
        ans4_error.innerHTML = "Correct  Answers can't be empty";
        ans4_error.style.display = "block";
        ans4_error.style.color = "red";
        is_validate= false;
    }
    
    if(is_validate){
        form.submit();
    }
}

function validate_feedback(){
    title = document.getElementById('title');
    msg = document.getElementById('msg');
    error_title = document.getElementById('error_title');
    error_msg = document.getElementById('error_msg');
    is_valide = true;
    error_title.style.display = 'none';
    error_msg.style.display = 'none';
    if(title.value.trim() == ''){
        error_title.innerHTML = "Title can't be empty.";
        error_title.style.display = 'block';
        is_valide= false;
    }
    if(msg.value.trim() == ''){
        error_msg.innerHTML = "Message can't be empty.";
        error_msg.style.display = 'block';
        is_valide = false;
    }
    if(is_valide){
        document.getElementById('feedbackForm').submit();
    }

}