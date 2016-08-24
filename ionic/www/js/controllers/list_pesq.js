angular.module('starter.controllers')
    .controller('list_pesq_Ctrl', ['$scope', '$state', '$ionicLoading', '$result',
        function ($scope, $state, $ionicLoading, $result) {

            var nome = window.localStorage['list_pesq'];

            $result.query({nome: nome}, function (data) {
                $scope.nome = nome;
                $scope.result = data;
                $ionicLoading.hide();
            });

            $scope.exibirPerfil = function (data) {
                window.localStorage['perfil_id'] = data.id;
                window.localStorage['perfil_nome'] = data.nome;
            };


            //$ionicLoading.show({
            //    template: "Carregando..."
            //});

        }]);