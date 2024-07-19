function previewImage(event) {
    const input = event.target;
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('image-preview');
            preview.style.display = 'block';
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        
        reader.readAsDataURL(file);
    }

    document.getElementById('gallery-logo').style.display = 'none';
}