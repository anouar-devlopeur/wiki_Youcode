const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
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
