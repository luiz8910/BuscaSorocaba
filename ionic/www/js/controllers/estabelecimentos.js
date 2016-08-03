angular.module('starter.controllers')
    .controller('EstabelecimentosCtrl', ['$scope', '$state', '$estab', '$ionicLoading',
        function ($scope, $state, $estab, $ionicLoading) {

            var id = window.localStorage['key'];
            var nome = window.localStorage['nome'];

            $scope.estabelecimentos = [];
            $scope.nome = nome;

            $ionicLoading.show({
                template: "Buscando por " + nome
            });

                $estab.query({id: id}, function (data) {
                    console.log(data);
                    $scope.estabelecimentos = data;
                    $ionicLoading.hide();
                });

    }]);
