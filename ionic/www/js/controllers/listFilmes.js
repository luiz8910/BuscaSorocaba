


angular.module('starter.controllers')
    .controller('FilmeCtrl', function ($scope, $listFilmes, $listShoppings) {

        $scope.Tab1 = function (item) {
            if(item == 1)
            {
                return true;
            }

            return false;
        };

        $scope.Tab2 = function (item) {
            if(item == 2)
            {
                return true;
            }

            return false;
        };

        $scope.Tab3 = function (item) {
            if(item == 3)
            {
                return true;
            }

            return false;
        };

        $listFilmes.query({}, function(data){
            $scope.filmes = data;
            //$ionicLoading.hide();
        });

        $listShoppings.query({}, function (data) {
            $scope.shoppings = data;
        });


        $scope.openCity = function(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    });
