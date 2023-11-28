
function showSuccessPopup() {
    var successPopup = document.getElementById("successPopup");
    if (successPopup) {
        successPopup.style.display = "block";
        setTimeout(function() {
            successPopup.style.display = "none";
        }, 3000);
    }
}