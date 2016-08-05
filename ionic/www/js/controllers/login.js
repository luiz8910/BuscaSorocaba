angular.module('starter.controllers')
    .controller('LoginCtrl', ['$scope', 'OAuth', '$state', function ($scope, OAuth, $state) {

        $scope.user = {
            username: 'joao@bolsafamilia.com.br',
            password: 'dilma123'
        };

        $scope.login = function () {
            OAuth.getAccessToken($scope.user)
                .then(function (data) {
                $state.go('dashboard');
            }, function (responseError) {
                console.log(responseError);
            })
        }
    }]);