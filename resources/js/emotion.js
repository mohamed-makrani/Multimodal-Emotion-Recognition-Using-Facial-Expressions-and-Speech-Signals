document.getElementById('detectBtn').addEventListener('click', function () {
    const formData = new FormData();
    // formData.append('audio', ...);
    // formData.append('video', ...);

    fetch('/result', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.text())
    .then(html => {
        document.open();
        document.write(html);
        document.close();
    });
});
