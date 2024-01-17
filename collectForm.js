let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    const slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); // Change slide every 2 seconds
}

<script>
    function submitForm(event) {
        event.preventDefault(); // prevent the default form submission

        // Collect form data
        var formData = new FormData(document.forms["form1"]);

        // Make an AJAX request to collectserver.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "collectserver.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // After successful processing on the server, redirect to requestsent.html
                window.location.href = "requestsent.html";
            }
        };
        xhr.send(formData);
    }
</script>
