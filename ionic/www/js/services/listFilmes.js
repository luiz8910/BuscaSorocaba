angular.module('starter.services')
    .factory('$listFilmes', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/listFilmes', {}, {
            isArray: false
        });
    }])

    .factory('$listShoppings', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/listShoppings', {}, {
            isArray: false
        });

    }])



    ;