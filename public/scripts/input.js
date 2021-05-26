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

// Сортировка

let sort = document.querySelector('.sort') //
let sortName = document.querySelector('.sortName') //
let gallery = document.querySelector('.gallery')
let gallerySort = document.querySelector('.gallerySort')
sort.addEventListener('click',evt => {
    gallerySort.style.display = 'block';
    gallery.style.display = 'none';
})

sortName.addEventListener('click',evt => {
    gallerySort.style.display = 'none';
    gallery.style.display = 'block';
})
