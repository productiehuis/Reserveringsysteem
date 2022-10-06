window.onscroll = function() {
    getMyStickyHeader()
};
var navbar = document.getElementById("navbar");
var stickyHeader = navbar.offsetTop;
function getMyStickyHeader() {
    if (window.pageYOffset >= stickyHeader) {
        navbar.classList.add("stickyHeader")
    } else {
        navbar.classList.remove("stickyHeader");
    }
}