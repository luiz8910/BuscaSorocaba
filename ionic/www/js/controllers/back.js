angular.module('starter.controllers')
    .controller('BackCtrl', ['$scope','$ionicHistory', '$state', '$window',
        function ($scope, $ionicHistory, $state, $window) {
            $scope.myGoBack = function(){
                $ionicHistory.goBack();
            };


            //Não mexe nessa função, pelo amor de Deus, é sério
            $scope.xamps = function () {
                var bugginho = $state.current.name;

                //console.log(bugginho);

                if(bugginho != 'dashboard')
                {
                    return true;
                }

                return false;
            };

            $scope.goHome = function () {
                $window.location.reload(true);
                return $state.go('dashboard');
            };

            $scope.pesquisar = function () {
                var bugginho = $state.current.name;console.log(bugginho);

                if(bugginho != 'dash_pesquisa')
                {
                    return true;
                }

                return false;
            };
    }]);
