// File: resources/js/filament/custom.js
document.addEventListener("DOMContentLoaded", function () {
    const genderSelect = document.querySelector('select[name="gender"]');
    const buildingSelect = document.querySelector('select[name="gedung"]');
    
    const buildingOptionsPutra = [
        'Gedung Laag (A01)', 
        'Gedung Larat (A02)',
        // Tambahkan opsi gedung lainnya untuk gender Putra
    ];

    const buildingOptionsPutri = [
        'Gedung A11', 
        'Gedung B06',
        // Tambahkan opsi gedung lainnya untuk gender Putri
    ];

    genderSelect.addEventListener("change", function () {
        const gender = this.value;
        const buildingOptions = gender === 'Putra' ? buildingOptionsPutra : buildingOptionsPutri;

        // Bersihkan opsi yang ada
        buildingSelect.innerHTML = '';

        // Tambahkan opsi baru berdasarkan gender yang dipilih
        buildingOptions.forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option;
            optionElement.textContent = option;
            buildingSelect.appendChild(optionElement);
        });
    });

    // Trigger perubahan saat halaman dimuat ulang
    genderSelect.dispatchEvent(new Event('change'));
});
