// Project Huddle redirect to TEST enviormnment

const veevaText = document.getElementById("veevaID");
var elevarurl = document.URL;
slugContainsEvents = "elevar-events"
var veeva1 = "US-ELVR-23-0075";
var veeva2 = "US-ELVR-23-0047";
if (window.location.href.indexOf(slugContainsEvents) > -1) {
    veevaText.innerHTML = veeva2;
    }
else {
    veevaText.innerHTML = veeva1;
}

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
