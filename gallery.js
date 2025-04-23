// Open Lightbox
function openLightbox(element) {
    const img = element.querySelector("img");
    const caption = element.querySelector(".caption").innerText;
    
    document.getElementById("lightbox").style.display = "flex";
    document.getElementById("lightbox-img").src = img.src;
    document.getElementById("lightbox-caption").innerText = caption;
}

// Close Lightbox
function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
}
