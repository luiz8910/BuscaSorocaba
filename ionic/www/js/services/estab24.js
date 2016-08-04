angular.module('starter.services')
    .factory('$estab24',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/estab24/:id', {id: '@id'}, {
            isArray: false
        });
    }]);