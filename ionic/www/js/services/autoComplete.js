angular.module('starter.services')
    .factory('$autoComplete',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/auto/:str', {str: '@str'}, {
            isArray: false
        });
    }]);