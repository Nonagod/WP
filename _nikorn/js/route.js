
let auto = '<i class="fas fa-car module-icon"></i>',
    mt = '<i class="fas fa-bus module-icon"></i>',
    pd = '<i class="fas fa-walking module-icon"></i>';

let arrObj = [
    ['Зеленоград, корпус 250',[56.005953, 37.203224]],
    ['Зеленоград, корпус 1004',[55.985091, 37.179707]],
    ['Зеленоград, корпус 1204',[55.995533, 37.190792]],
    ['Зеленоград, корпус 1613',[55.974388, 37.155021]],
    ['Зеленоград, корпус 1825',[55.979309, 37.166286]],
    ['Зеленоград, корпус 524',[55.991652, 37.254096]],
    ['Андреевка, ЖК «Уютный», улица жилинская, дом 27к6',[55.982019, 37.130452]],
];

$(function(){
    $('.wstd-route-btn').click(function() {
        $('.wstd-route-module .card-input').html($('.card-list li:first-child').html());
        $('.module-item').slideUp();
        $('.container-module-wstd').slideToggle(300, function() {
            if ($(this).is(':visible'))
                $(this).css('display','flex');
        });
    })

    $('.wstd-route-module .card-input').html($('.card-list li:first-child').html());
    $('.card-grp').click(function(e) {
        $('.card-list').toggleClass('visible');
    });
    $('.card-list li').click(function(e) {
        $('.card-list').removeClass('visible');
        $('.card-input').html($(this).html());

        let ind = `.module-item[data-id="${$(this).attr('data-id')}"]`;
        $('.module-item').hide();
        $('#module-el').find(ind).show()
    });
});

function createElemMed(arr, term, label, text) {
    let wrap = document.createElement('div');
    wrap.classList.add('btnCoord-wrap');

    let el = document.createElement('a');
    el.innerHTML = label
    el.classList.add('js-btnCoord')
    el.setAttribute('href', ' ');
    el.setAttribute('data-coord', `${arr[1][0]},${arr[1][1]}`);
    el.setAttribute('data-mod', term);

    let textEl = document.createElement('p');
    textEl.classList.add('btnCoord-text')
    textEl.innerHTML = text;

    wrap.appendChild(el)
    wrap.appendChild(textEl)

    return wrap;
}

arrObj.forEach((el, index) => {
    let liElem = document.createElement('li')
    liElem.innerHTML=el[0]
    liElem.setAttribute('data-id', index)
    $('.card-list').append(liElem);

    let div = document.createElement('div');
    div.setAttribute('data-id', index);
    div.classList.add('module-item');
    div.appendChild(createElemMed(el, 'auto', auto, 'На личном транспорте'));
    div.appendChild(createElemMed(el, 'mt', mt, 'Общественный транспорт'))
    div.appendChild(createElemMed(el, 'pd', pd, 'Пешком'))
    $('#module-el').append(div);

})

$('.module-item').hide();

$('.js-btnCoord').on('click', linkCoordHandler)

let options = {
    enableHighAccuracy: true,
    timeout: 10 * 1000,
    maximumAge: 5 * 60 * 1000
};

function linkCoordHandler(e) {
    e.preventDefault();

    let coordThis;

    if (navigator || navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error, options);
    } else {
        alert('Невозможно получить данные геолокации на вашем устройстве');
    }

    function success(position) {
        coordThis = position.coords.latitude + ',' + position.coords.longitude;

        let coord = e.currentTarget.getAttribute('data-coord');
        let type = e.currentTarget.getAttribute('data-mod');
        let href = `https://yandex.ru/maps/?rtext=${coordThis}~${coord}&rtt=${type}`;

        let open = window.open(href);
        if (open == null || typeof(open)=='undefined') {
            document.location = href;
        } else {
            window.open(href);
        }
    }

    function error(error) {
        console.log("error - " + error.code)
        // error.code can be:
        //   0: unknown error
        //   1: permission denied
        //   2: position unavailable (error response from location provider)
        //   3: timed out
        alert('Включите разрешение получения геолокации на вашем устройстве для веб-браузера');
        return;
    }
}

