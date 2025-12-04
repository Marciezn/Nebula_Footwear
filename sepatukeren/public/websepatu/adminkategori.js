function previewIcon(event) {
    let imgPreview = document.getElementById("previewIcon");
    imgPreview.src = URL.createObjectURL(event.target.files[0]);
    imgPreview.style.display = 'block';
}