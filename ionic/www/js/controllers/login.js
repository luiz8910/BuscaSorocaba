angular.module('starter.controllers', ['ionic'])
    .controller('LoginCtrl', ['$scope', 'OAuth', '$state', '$login', '$ionicPlatform', '$ionicHistory',
        function ($scope, OAuth, $state, $login, $ionicPlatform, $ionicHistory) {

        $scope.user = {
            username: 'client@buscasorocaba.com.br',
            password: 'rbts@2016'
        };

            $ionicPlatform.registerBackButtonAction(function(e) {
                if($state.current.name == 'dashboard'){
                    ionic.Platform.exitApp();
                }
                else{
                    $ionicHistory.goBack();
                }

            }, 101);

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