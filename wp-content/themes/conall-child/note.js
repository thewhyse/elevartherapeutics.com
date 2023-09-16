function openTest() {
    window.open("https://test-elevartherapeutics.pantheonsite.io/", "_self");
}

var domain_name = document.location.hostname;
var message = "If you are reviewing Elevar Corporate website, please use https://test-elevartherapeutics.pantheonsite.io instead."
if (domain_name == "dev-elevartherapeutics.pantheonsite.io") {
    alert(message);
    if (confirm("Do you want to automatically be transferred?") == true) {
        openTest();
    }
}
