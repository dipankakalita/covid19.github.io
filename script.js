// Filter table

$(document).ready(function () {
  $("#tableSearch").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

if ("serviceWorker" in navigator) {
  navigator.serviceWorker.register("sw.js").then(registration => {
    // console.log("Sw Register");
    // console.log(registration);
  }).catch(error => {
    // console.log("Sw Register Failed!");
    console.log(error);
  });
}