angular.module('starter.controllers')
    .controller('PerfilCtrl', ['$scope', '$state', '$ionicLoading', '$perfil',
        function ($scope, $state, $ionicLoading, $perfil) {

            var id = window.localStorage['perfil_id'];
            var nome = window.localStorage['perfil_nome'];

            $scope.nome = nome;

            $ionicLoading.show({
                template: "Buscando por " + nome
            });

                $perfil.get({id: id}, function (data) {
                    console.log(data);
                    $scope.nome = nome;
                    $scope.subcategoria = window.localStorage['nome'];
                    $scope.email = data.email;
                    $scope.telefone = data.telefone;
                    $scope.logradouro = data.logradouro;
                    $scope.numero = data.numero;
                    $scope.bairro = data.bairro;
                    $scope.quemSomos = data.quemSomos;
                    $scope.servicos = data.servicos;
                    $ionicLoading.hide();
                });

    }]);