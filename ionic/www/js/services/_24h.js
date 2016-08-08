angular.module('starter.services')
    .factory('$_24h',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/sub24h', {}, {
            isArray: false
        });
    }]);