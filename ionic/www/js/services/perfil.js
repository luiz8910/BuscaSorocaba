angular.module('starter.services')
    .factory('$perfil',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/perfil/:id', {id: '@id'}, {
            isArray: false
        });
    }]);