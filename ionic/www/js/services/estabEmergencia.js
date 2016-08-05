angular.module('starter.services')
    .factory('$estabEmergencia',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/estabEmergencia/:id', {id: '@id'}, {
            isArray: false
        });
    }]);