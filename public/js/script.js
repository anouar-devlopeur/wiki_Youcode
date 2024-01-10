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


// update Catagorie 
const update_btn = document.querySelectorAll(".update_btn");
const Catagorie_id = document.querySelector("#idCategorie");
const Catagorie_input = document.querySelector("#Categorie");
// const Parol = document.querySelector("#msg");

for (let i = 0; i < update_btn.length; i++) {
  update_btn[i].addEventListener("click", () => {
   
        // console.log(update_btn[i].dataset.key);
        console.log(update_btn[i].getAttribute("data-key"));
// You can access these data attributes data-key or data-name .. using the dataset
        Catagorie_id.value = update_btn[i].getAttribute("data-key");
        Catagorie_input.value = update_btn[i].getAttribute("value");

       
    });
}
//update Tags
const update_Tags=document.querySelectorAll(".update_tags");
const Tags_id=document.querySelector("#idTags");
const Tags_NAME=document.querySelector("#Tags");
for(let i=0;i<update_Tags.length;i++){
  // arryfunction
  update_Tags[i].addEventListener("click",()=>{
     console.log( update_Tags[i].getAttribute("data-key"));
     Tags_id.value=update_Tags[i].getAttribute("data-key");
     Tags_NAME.value=update_Tags[i].getAttribute("value");
  })
}
// Arrchive Wiki
const Archive_Wiki=document.querySelectorAll(".Archive_Wiki");
const idWiki=document.querySelector("#idWiki");
const content=document.querySelector("#content");
for(let i=0;i<Archive_Wiki.length;i++){
  // arryfunction
  Archive_Wiki[i].addEventListener("click",()=>{
     console.log( Archive_Wiki[i].getAttribute("data-key"));
     idWiki.value=Archive_Wiki[i].getAttribute("data-key");
     content.value=Archive_Wiki[i].getAttribute("value");
  })
}
