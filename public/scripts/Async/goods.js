// Асинхронные товары: goods

let goodsBtn = document.querySelectorAll('.goodsBuy')
goodsBtn.forEach((elem) =>{
    elem.addEventListener('click', () => {
        let id = elem.getAttribute('data-id');
        let price = elem.getAttribute('data-price');
        (async () => {
            const response = await fetch(`/async/?action=buy&price=${price}&id=${id}`);
            const answer = await response.json();
            document.getElementById('countBasket').innerText = `(${answer.count})`;
        })();
    })
})