// Project Huddle redirect to TEST enviormnment

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

// Select all of the read more buttons and hidden content
const readMoreButtons = document.querySelectorAll(".read-more");
const hiddenContents = document.querySelectorAll(".hide");
// Now loop over the read more buttons
readMoreButtons.forEach((readMoreButton, index) => {
    // Add onclick event listeners to all of them
    readMoreButton.addEventListener("click", () => {
        // Change content of read more button to read less based on the textContent
        if (readMoreButton.textContent === "Read More")
        {
            readMoreButton.textContent = "Read Less";
            }
        else
        {
            readMoreButton.textContent = "Read More";
        }
        // Toggle class based on index
        hiddenContents[index].classList.toggle("hide");
    })
})
