angular.module('starter.services')

    .factory('$list_sessao', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/list_sessao/:shop', {shop: '@shop'},
            {
                isArray: false
            }
        );

    }])

    .factory('$list_sala', ['$resource', 'appConfig', function ($resource, appConfig) {
        return $resource(appConfig.baseUrl + '/api/estabelecimentos/list_sala/:id',{id: '@id'},
            {
                isArray: false
            }
        );

    }])


;