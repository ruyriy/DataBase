function readFromPastebin(pasteURL) {
    var corsAnywhereUrl = 'https://cors-anywhere.herokuapp.com/' + pasteURL;

    var xmlHttp = new XMLHttpRequest();
    var htmlDoc = document.implementation.createHTMLDocument("YouTube Links");
    var regex = new RegExp('"url":"\\/watch[^"]+"', 'g');
    var i = 0;

    try {
        // Открытие URL с использованием GET-запроса
        xmlHttp.open("GET", corsAnywhereUrl, false);
        xmlHttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xmlHttp.send();

        // Проверка статуса ответа
        if (xmlHttp.status === 200) {
            htmlDoc.body.innerHTML = xmlHttp.responseText;

            // Поиск URL видео на странице
            var matches = htmlDoc.body.innerHTML.match(regex);

            // Возвращаем массив найденных ссылок
            return matches.map(function(match) {
                i++;
                return "https://www.youtube.com" + match.substring(7);
            });
        } else {
            throw new Error("Ошибка при получении данных с указанного URL.");
        }
    } catch (e) {
        throw new Error("Произошла ошибка: " + e.message);
    }
}

// При загрузке страницы
window.onload = function() {
    // Получение параметра из URL
    var urlParams = new URLSearchParams(window.location.search);
    var pasteURL = urlParams.get('pasteURL');

    if (pasteURL) {
        try {
            var links = readFromPastebin(pasteURL);
            // Здесь можно добавить код для отображения найденных ссылок на странице
            console.log(links);
        } catch (error) {
            console.error(error.message);
        }
    } else {
        console.error("Параметр pasteURL не указан в URL.");
    }
};
