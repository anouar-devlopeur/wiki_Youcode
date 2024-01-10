

// update Catagorie 
const update_btn = document.querySelectorAll(".update_btn");
const Catagorie_id = document.querySelector("#idCategorie");
const Catagorie_input = document.querySelector("#Categorie");
const dateInput = document.querySelector("#date");

for (let i = 0; i < update_btn.length; i++) {
    update_btn[i].addEventListener("click", () => {
        const key = update_btn[i].getAttribute("data-key");
        const value = update_btn[i].getAttribute("value");
        const date = update_btn[i].getAttribute("data-date");

        Catagorie_id.value = key;
        Catagorie_input.value = value;
        dateInput.value = date;
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
