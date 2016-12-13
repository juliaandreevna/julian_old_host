ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("map", {
            center: [coord[0], coord[1]],
            zoom: 14
        }),
        myPlacemark = new ymaps.Placemark([coord[0], coord[1]], {
            // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
            balloonContentHeader: "JULIAN RADIO",
            balloonContentBody: phone,
            balloonContentFooter: "",
            hintContent: "JULIAN RADIO"
        });

    myMap.geoObjects.add(myPlacemark);

    myMap.controls
        // Кнопка изменения масштаба.
        .add('zoomControl', { left: 5, top: 5 })
        // Список типов карты
        .add('typeSelector')
        // Стандартный набор кнопок
        .add('mapTools', { left: 35, top: 5 });

    
    // Показываем хинт на карте (без привязки к геообъекту).
    myMap.hint.show(myMap.getCenter(), "JULIAN RADIO", {
        // Опция: задержка перед открытием.
        showTimeout: 1500
    });
}