angular.module('starter.controllers')
    .controller('AutoCompleteCtrl', ['$scope', '$state', '$ionicLoading', '$autoComplete',
        function ($scope, $state, $ionicLoading, $autoComplete) {

            $scope.ajusteTecnico = function (bug) {

                if (bug == null) {
                    return false;
                }
                else {
                    return true;
                }
            };

            $scope.lista = function(item){
                window.localStorage['list_pesq'] = item;
                $state.go('list_pesq');
            };


            $scope.pesquisa = function () {

                if ($scope.str) {
                    $autoComplete.query({str: $scope.str}, function (data) {
                        $scope.result = data;console.log(data);
                    });
                }
                else{
                    $scope.result = null;
                }

            };


            //$ionicLoading.show({
            //    template: "Carregando..."
            //});

            //$ionicLoading.hide();

        }]);
