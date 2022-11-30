window.onscroll = function() {
    getMyStickyHeader()
};
const navbar = document.getElementById("navbar");
const stickyHeader = navbar.offsetTop;

function getMyStickyHeader() {
    if (window.pageYOffset >= stickyHeader) {
        navbar.classList.add("stickyHeader")
    } else {
        navbar.classList.remove("stickyHeader");
    }
}