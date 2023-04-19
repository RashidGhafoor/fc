function validateForm() {
  let isValid = true;

  let form = document.forms["form"];
  let InputElements = form.getElementsByTagName("input");

  let username = document.forms["form"]["username"].value;
  let password = document.forms["form"]["password"].value;

  usermsg = document.getElementById("usermsg");
  passmsg = document.getElementById("passmsg");

  console.log(/^[a-zA-Z0-9_]+$/.test(username));

  // username
  if (username == "") {
    usermsg.style.visibility = "visible";
    isValid = false;
  } else if (/^[a-zA-Z0-9_]+$/.test(username) == false) {
    console.log("user");
    usermsg.innerHTML =
      "Username can only contain letters, numbers, and underscores";
    usermsg.style.visibility = "visible";
    isValid = false;
  } else {
    usermsg.style.visibility = "hidden";
  }

  // password
  if (password == "") {
    passmsg.style.visibility = "visible";
    isValid = false;
  } else {
    usermsg.style.visibility = "hidden";
  }

  // email
  if (InputElements.length > 3) {
    let email = document.forms["form"]["email"].value;
    emailmsg = document.getElementById("emailmsg");

    if (email == "") {
      emailmsg.style.visibility = "visible";
      isValid = false;
    } else {
      emailmsg.style.visibility = "hidden";
    }
  }

  return isValid;
}
