<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>審計新村</title>
    <link rel="stylesheet" href="/css/index.css">
</head>

<body>
    <main class="loading-page">
        <div class="container">
            <div>
                <img src="./img/Logo-img.png" alt="">
                <img src="./img/Logo-text.png" alt="">
            </div>
            <div class="loading-bar">
                <div id="loading"></div>
                <div id="loading_percent">0 %</div>
            </div>
            <span>走吧，一起到審計新村逛逛！</span>
        </div>
    </main>

    <script>
        const container = document.querySelector('.container');
        const random = Math.floor(Math.random() * 21) + 10;
        let count = 0;
        const loading_timer = setInterval(() => {
            count++;
            loading.style.width = `${count}%`;
            loading_percent.innerText = `${count} %`

            if (count >= 100) {
                container.classList.add('complete');
                clearInterval(loading_timer);
                setTimeout(() => {
                    location.href = "/index";
                }, 1000);
            }
        }, random);
    </script>
</body>

</html>