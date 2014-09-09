//novosib.js
ymaps.ready(init);
    function init () {
        var myMap = new ymaps.Map("map", {
                center: [ 55.033478 , 82.923247],
                zoom: 15,
            // Включим поведения по умолчанию (default)
            // и добавим масштабирование колесом мыши.
            behaviors:['default', 'scrollZoom']
            }),  

        // Метка, содержимое балуна которой загружается с помощью AJAX. Новосибирск
            placemark2 = new ymaps.Placemark([55.033897 , 82.930196], {
                iconContent: "Автомат5+",            
            }, {
                preset: "twirl#blueStretchyIcon",
                
            });  

        myMap.geoObjects.add(placemark2); 

        //Управление
        // В метод add можно передать строковый идентификатор
        // элемента управления и его параметры.
        myMap.controls
            // Кнопка изменения масштаба.
            .add('zoomControl', { left: 5, top: 5 })

        myMap.controls
            .add(trafficControl)
            // В конструкторе элемента управления можно задавать расширенные
            // параметры, например, тип карты в обзорной карте.
            .add(new ymaps.control.MiniMap({
                type: 'yandex#publicMap'
            }));
    }