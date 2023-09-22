/* // Project Huddle redirect to TEST enviormnment

function openTest() {
    window.open("https://test-elevartherapeutics.pantheonsite.io/", "_self");
}

var domain_name = document.location.hostname;
var message = "If you here to review/approve ELE-23-PRS0359 Elevar Q3 Corporate Website Updates, please use the following link, as the DEV server enviornment is only for reviewing ELE-23-PRS0330 Elevar Q3 ESMO 2023 Landing page;  https://test-elevartherapeutics.pantheonsite.io"
if (domain_name == "dev-elevartherapeutics.pantheonsite.io") {
    alert(message);
    if (confirm("Do you want to automatically be transferred?") == true) {
        openTest();
    }
}
 */

// Select all of the read more buttons and hidden content
const readMoreButtons = document.querySelectorAll(".read-more");
const hiddenContents = document.querySelectorAll(".hide");
/* const textContent = 'READ MORE'; */
// Now loop over the read more buttons
readMoreButtons.forEach((readMoreButton, index) => {
    // Add onclick event listeners to all of them
    readMoreButton.addEventListener("click", () => {
        // Toggle class based on index
        hiddenContents[index].classList.toggle('hide');
        // Change content of read more button to read less based on the textContent
        if (readMoreButton.innerHTML === 'READ MORE') {
            readMoreButton.innerHTML = 'READ LESS';
            }
        else {
            readMoreButton.innerHTML = 'READ MORE';
        }
    })
})
