define([
    'jquery',
    'jquery/ui'
], function($) {
    'use strict';
    console.log('I WAS THE POULAY MAN');
    $.widget('esgi.storesAjax', {

        options: {
            url: '',
            map: '#google'
        },

        _create: function() {
            console.log('COUCOU stores-ajax maggle', this, this.options);
/*function initMap() {
                const uluru = { lat: -25.363, lng: 131.044 };
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: uluru
                });
                const marker = new google.maps.Marker({
                    position: uluru,
                    map
                });
            }
            $.ajax({
                showLoader: true,
                url: this.options.url,
                data: 'ajax=1',
                type: 'GET',
                dataType: 'json'
            }).done(function (data) {
                console.log('COUCOU AJAX RES', data);
            });*/
        }

    });

    return $.esgi.storesAjax;
});
