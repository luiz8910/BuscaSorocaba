angular.module('starter.controllers')
    .controller('FilmeCtrl', function ($scope, $listFilmes, $listShoppings, $list_sessao, $list_sala) {

        $scope.detalhesFilme = function (data) {
            window.localStorage['idFilme'] = data.id;
            window.localStorage['nomeFilme'] = data.nome;
            //console.log(data);
        };

        $listFilmes.query({}, function (data) {
            $scope.filmes = data;
            $scope.nomeFilme = window.localStorage['nomeFilme'];
            $scope.id = window.localStorage['idFilme'];
            //$ionicLoading.hide();
        });

        $listShoppings.query({}, function (data) {
            $scope.shoppings = data;
        });


        $scope.openShop = function (evt, shopName, id) {
            var shop = [window.localStorage['idFilme'], id];

            $list_sessao.query({shop: shop}, function (items) {


                for (i = 0; i < items.length; i++) {

                    $list_sala.get({id: items[i].salas_id}, function (data) {

                        window.localStorage['salas_id'] = data.numero;

                    });

                    gambiarraParaAcertarAMalditaSala(items, i);

                }


                // Já sabe neh,
                // se mexer nessa funcão vc fica broxa
                // com certeza...
                function gambiarraParaAcertarAMalditaSala(items, i)
                {
                    setTimeout(function () {
                        items[i].salas_id = window.localStorage['salas_id'];
                    }, 2000);

                }

                $scope.sessoes = items;

            });

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
            document.getElementById(shopName).style.display = "block";
            //evt.currentTarget.className += " active";
        }
    });
