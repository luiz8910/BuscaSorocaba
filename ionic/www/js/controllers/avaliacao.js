angular.module('starter.controllers')
    .controller('avaliacaoCtrl', ['$scope', '$state','$ionicLoading', '$ionicPopup', '$timeout',
        function ($scope, $state, $ionicLoading, $ionicPopup, $timeout) {
            // Triggered on a button click, or some other target
                $scope.showPopup = function() {
                    $scope.data = {};

                    // An elaborate, custom popup
                    var myPopup = $ionicPopup.show({
                        template:
                        '<label for="radio-label-1">Texto</label>' +
                        '<input id="radio-label-1" class="radiobox" type="radio" ng-model="data.wifi">',
                        title: 'Enter Wi-Fi Password',
                        subTitle: 'Please use normal things',
                        scope: $scope,
                        buttons: [
                            { text: 'Cancel' },
                            {
                                text: '<b>Save</b>',
                                type: 'button-positive',
                                onTap: function(e) {
                                    if (!$scope.data.wifi) {
                                        //don't allow the user to close unless he enters wifi password
                                        e.preventDefault();
                                    } else {
                                        return $scope.data.wifi;
                                    }
                                }
                            }
                        ]
                    });

                    myPopup.then(function(res) {
                        console.log('Tapped!', res);
                    });

                    $timeout(function() {
                        myPopup.close(); //close the popup after 5 seconds for some reason
                    }, 5000);
                };

                // A confirm dialog
                $scope.showConfirm = function() {
                    var confirmPopup = $ionicPopup.confirm({
                        title: 'Consume Ice Cream',
                        template: 'Are you sure you want to eat this ice cream?'
                    });

                    confirmPopup.then(function(res) {
                        if(res) {
                            console.log('You are sure');
                        } else {
                            console.log('You are not sure');
                        }
                    });
                };

                // An alert dialog
                $scope.showAlert = function() {
                    var alertPopup = $ionicPopup.alert({
                        title: 'Don\'t eat that!',
                        template: 'It might taste good'
                    });

                    alertPopup.then(function(res) {
                        console.log('Thank you for not eating my delicious ice cream cone');
                    });
                };

            //$scope.sub = [];
            //
            //$ionicLoading.show({
            //    template: "Carregando..."
            //});

            //$_24h.query({}, function (data) {
            //    $scope.sub = data;
            //    $ionicLoading.hide();
            //});
    }]);
