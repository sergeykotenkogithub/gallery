<div class="container">
    <div class="container">
        <input name="arg1" type="text" id="arg1">
        <input class="operation" type="submit" name="operation" value='+'>
        <input class="operation" type="submit" name="operation" value='*'>
        <input class="operation" type="submit" name="operation" value='/'>
        <input class="operation" type="submit" name="operation" value='-'>
        <input name="arg2" type="text" id="arg2">
        =
        <input style="width:200px;" name="result" class="result" type="text" id="result" value="">
    </div>

    <script>
        let operation = document.querySelectorAll("input[name='operation']");
        let result = document.querySelector('.result');
        let arg1 = document.getElementById('arg1');
        let arg2 = document.getElementById('arg2');

        document.addEventListener("DOMContentLoaded", () => {

            for (let item of operation) {
                item.addEventListener("click", e => {
                    e.preventDefault()
                    as(item);
                })
            }
        })

        async function as(item) {
            const response = await fetch('/apicalc', {
                method: 'POST',
                headers: new Headers({
                    'Content-Type': 'application/json'
                }),
                body: JSON.stringify({
                    arg1: arg1.value,
                    arg2: arg2.value,
                    operation: item.value,
                }),
            });
            const answer = await response.json();
            result.value = answer;
        };

    </script>
</div>