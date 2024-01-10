const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const ImageInput = document.getElementById("author");
const PasswordInput = document.getElementById("password");
// const sendButton = document.getElementById("send-button");



const nameRegex = /^[a-zA-Z]+$/;
const emailRegex = /^[a-zA-Z0-9._-]+@[a-z]+\.[a-zA-Z]{2,}$/; 
const PasswordRegex =  /^[a-zA-Z0-9]+$/;


function validateInput(input, regex) {
  if (regex.test(input.value)) {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
  } else {
    input.classList.remove("is-valid");
    input.classList.add("is-invalid");
  }
}


nameInput.addEventListener("input", () => {
  validateInput(nameInput, nameRegex);
});

emailInput.addEventListener("input", () => {
  validateInput(emailInput, emailRegex);
});


PasswordInput.addEventListener("input", () => {
  validateInput(PasswordInput, PasswordRegex);
});
// 