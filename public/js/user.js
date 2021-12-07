const countriesList = document.getElementById("user-edit-country");
const ownCountries = document.querySelector("#user-have-country").value;
const loadingCountries = document.getElementById("loading-country");
let countries;
countriesList.classList.add("hidden");
document.getElementById("submit-edit-user").disabled = true;
fetch("https://restcountries.com/v3.1/all")
    .then((res) => res.json())
    .then((data) => initialize(data))
    .catch((err) => console.log("Error:", err));

function initialize(countriesData) {
    countriesList.classList.remove("hidden");
    loadingCountries.classList.add("hidden");
    document.getElementById("submit-edit-user").disabled = false;
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
