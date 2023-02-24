// Fitur preview gambar
let inputGambarProfile = document.getElementById('gambar_profil');
let displayGambarProfile = document.getElementById('display_gambar_profil');

if (inputGambarProfile) {
    inputGambarProfile.addEventListener("change", previewGambar);

    function previewGambar(){
        const [file] = inputGambarProfile.files;
        displayGambarProfile.src = URL.createObjectURL(file);
    }

    // Ketika gambar di klik, file upload akan terbuka
    displayGambarProfile.addEventListener('click', () => inputGambarProfile.click());
}

// Membuat gambar background profile bisa di klik
let pilihanBg = document.getElementsByClassName("pilihan-background-profil");
let inputanBg = document.getElementById("background_profil");

if (pilihanBg) {
    [...pilihanBg].forEach(element => element.addEventListener("click", updateBg));

    function updateBg(){
        inputanBg.value = this.children[0].innerHTML;
    }
}

// Delete modal
let btnHapus = document.getElementsByClassName('btn-hapus');
let formDelete = document.getElementById('deleteForm');

if (btnHapus) {
    [...btnHapus].forEach(element => element.addEventListener("click", inputId))

    function inputId(){
        let idHapus = this.getAttribute('data-id');
        formDelete.setAttribute('action', '/users/' + idHapus);
    }
}