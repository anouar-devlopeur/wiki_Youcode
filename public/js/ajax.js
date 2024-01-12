var searchinput = document.querySelector("#searchResults");
var boxsearch = document.querySelector(".wrapper-box");

searchinput.addEventListener("input", () => {
  let xml = new XMLHttpRequest();
  let searchvalue = searchinput.value;
  if (searchvalue == "") {
    boxsearch.innerHTML = "";
  }

  xml.onreadystatechange = function () {
    if (this.readyState === 4) {
      if (this.status === 200) {
        let response = JSON.parse(this.response);

        console.log(response);

        if (response && response.length > 0) {
          boxsearch.innerHTML = `
          <div>${response[0].title}</div>
          `;
        } else {
          boxsearch.innerHTML = "";
        }
      }
    }
  };

  xml.open("POST", "http://localhost/wiki/pages/search", true);

  let data = {
    search: searchvalue,
  };
  data = JSON.stringify(data);
  console.log(data);
  xml.send(data);
});
