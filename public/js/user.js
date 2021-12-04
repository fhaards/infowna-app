const countriesList = document.getElementById("user-edit-country");
const ownCountries = document.querySelector("#user-have-country").value;

let countries;
let loadingOptions = "<option> Loading ... </option>";
countriesList.innerHTML = loadingOptions;

fetch("https://restcountries.com/v3.1/all")
    .then((res) => res.json())
    .then((data) => initialize(data))
    .catch((err) => console.log("Error:", err));

function initialize(countriesData) {
    countries = countriesData;
    let options = "";
    var getCountryName;
    for (let i = 0; i < countries.length; i++) {
        getCountryName = countries[i].name.common;
        options += `<option value="${getCountryName}">${getCountryName}</option>`;
    }

    countriesList.innerHTML = options;
    if (ownCountries !== null) {
        countriesList.value = ownCountries;
    }
    
    // countries.forEach(
    //     (country) =>
    //         (options += `<option value="${country.name["common"]}">${country.name["common"]}</option>`)
    // );
}
