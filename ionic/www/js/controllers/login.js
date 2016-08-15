angular.module('starter.controllers')
    .controller('LoginCtrl', ['$scope', 'OAuth', '$state', '$login', function ($scope, OAuth, $state, $login) {

        $scope.user = {
            username: 'client@buscasorocaba.com.br',
            password: 'rbts@2016'
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user)
                .then(function (data) {
                $state.go('dashboard');
            }, function (responseError) {
                console.log(responseError);
            })
        };

        return $login.oauth;
    }]);