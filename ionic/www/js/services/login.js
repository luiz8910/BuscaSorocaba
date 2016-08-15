angular.module('starter.services')
    .factory('$login', ['OAuth', function (OAuth) {

        var oauth = OAuth.getAccessToken({
            username: "client@buscasorocaba.com.br",
            password: "rbts@2016"
        }).then(function (data) {

        });

        return oauth;

        
    }]);


//.factory("login", ["OAuth", "$http", function (a, ajax) {
//    this.entrar = function () {
//        a.getAccessToken({
//            username: "joao@bolsafamilia.com.br",
//            password: "dilma123"
//        });
//
//        ajax.get();
//    }
//}])