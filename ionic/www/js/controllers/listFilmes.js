//angular.module('starter.controllers')
//    .controller('FilmeCtrl', ['$scope', '$state', '$ionicLoading', '$listFilmes',
//        function ($scope, $state, $ionicLoading, $listFilmes)
//        {
//            $ionicLoading.show({
//                template: 'Carregando'
//            });
//
//            $listFilmes.query({}, function(data){
//                $scope.filmes = data;
//                $ionicLoading.hide();
//            });
//        }]);

angular.module('ui-bootstrap')
    .controller('FilmeCtrl', function ($scope, $window) {
        $scope.tabs = [
            { title:'Dynamic Title 1', content:'Dynamic content 1' },
            { title:'Dynamic Title 2', content:'Dynamic content 2', disabled: true }
        ];

        $scope.alertMe = function() {
            setTimeout(function() {
                $window.alert('You\'ve selected the alert tab!');
            });
        };

        $scope.model = {
            name: 'Tabs'
        };
    });
