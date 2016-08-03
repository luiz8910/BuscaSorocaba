angular.module('starter.services')
    .factory('SubCategoria',['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/subcategoriaApi/', {}, {
            isArray: false
        });
    }]);