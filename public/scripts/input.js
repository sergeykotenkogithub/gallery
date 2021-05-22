const formImage = document.getElementById('fi');
const formPreview = document.getElementById('fr');

formImage.addEventListener('change', () => {
    uploadFile(fi.files[0]);
});

function uploadFile(file) {
    var reader = new FileReader ();
    reader.onload = function (e){
        formPreview.innerHTML = `<img src="${e.target.result}" alt=Фото>`;
    };
    reader.onerror = function(e) {
        console.log('Ошибка');        
    }
    reader.readAsDataURL(file);
}