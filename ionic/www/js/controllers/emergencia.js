angular.module('starter.controllers')
    .controller('EmergenciaCtrl', ['$scope', '$state','$ionicLoading', '$emergencia',
        function ($scope, $state, $ionicLoading, $emergencia) {
            $scope.sub = [];

            $ionicLoading.show({
                template: "Carregando..."
            });

            $emergencia.query({}, function (data) {
                $scope.sub = data;
                $ionicLoading.hide();
            });
    }]);
