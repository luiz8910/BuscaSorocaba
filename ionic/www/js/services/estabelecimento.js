angular.module('starter.services')
    .factory('$estab',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/comercio/:id', {id: '@id'}, {
            isArray: false
        });
    }])

    .factory('$result', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/list_pesq/:nome', {nome: '@nome'}, {
            isArray: false
        })
    }])
;