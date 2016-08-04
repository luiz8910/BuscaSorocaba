angular.module('starter.services')
    .factory('$emergencia',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/emergencia', {}, {
            isArray: false
        });
    }]);