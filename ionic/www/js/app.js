// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module("starter.controllers", []);
angular.module("starter.services", []);
angular.module("ui-bootstrap", []);

angular.module('starter',
    ['ionic', 'starter.controllers', 'starter.services','angular-oauth2',
        'ngResource', 'ngMaterial', 'ngAria', 'ion-autocomplete', 'ui-bootstrap', 'jett.ionic.filter.bar'
    ]
)

    .constant("appConfig", {
        baseUrl: 'http://buscasorocaba.com.br'
        //baseUrl: 'http://192.168.0.4:8000'
        //baseUrl: 'http://localhost:8000'
    })

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig, $provide){
    OAuthProvider.configure({
        baseUrl: appConfig.baseUrl,
        clientId: 'appid01',
        clientSecret: 'secret', //optional
        grantPath: '/oauth/access_token'
    });

    OAuthTokenProvider.configure({
        name: 'token',
        options: {
            secure: false
        }
    });

  $stateProvider
      .state('home', {
          url: '/home/:nome',
          templateUrl: 'templates/home.html',
          controller: 'HomeCtrl'
      })

      .state('main', {
        url: '/',
        templateUrl: 'templates/main.html'
      })

      .state('login', {
          url: '/login',
          templateUrl: 'templates/login.html',
          controller: 'LoginCtrl'
      })

      .state('dashboard', {
          url: '/dashboard',
          templateUrl: 'templates/dashboard/index.html',
          controller: 'LoginCtrl'
      })

      .state('dash_pesquisa',{
          url: '/dash_pesquisa',
          templateUrl: 'templates/dashboard/pesquisa.html',
          controller: 'AutoCompleteCtrl'
      })

      .state('alimentacao',{
          url: '/alimentacao',
          templateUrl: 'templates/alimentacao/index.html',
          controller: 'AlimentacaoCtrl'
      })

      .state('estabelecimentos',{
          cache: false,
          url: '/estabelecimentos',
          templateUrl: 'templates/estabelecimentos/index.html',
          controller: 'EstabelecimentosCtrl'
      })

      .state('list_pesq',{
          cache: false,
          url: '/list_pesq',
          templateUrl: 'templates/estabelecimentos/listar_pesq.html',
          controller: 'list_pesq_Ctrl'
      })

      .state('perfil',{
          cache: false,
          url: '/perfil',
          templateUrl: 'templates/estabelecimentos/perfil.html',
          controller: 'PerfilCtrl'
      })

      .state('24h',{
          url: '/24h',
          templateUrl: 'templates/24h/index.html',
          controller: '_24hCtrl'
      })

      .state('emergencia',{
          url: '/emergencia',
          templateUrl: 'templates/emergencia/index.html',
          controller: 'EmergenciaCtrl'
      })

      .state('estab24',{
          cache: false,
          url: '/estab24',
          templateUrl: 'templates/24h/estabelecimentos.html',
          controller: 'Estab24Ctrl'
      })

      .state('estabEmergencia',{
          cache: false,
          url: '/estabEmergencia',
          templateUrl: 'templates/emergencia/estabelecimentos.html',
          controller: 'EstabEmergenciaCtrl'
      })

      .state('perfil24h',{
          cache: false,
          url: '/perfil24h',
          templateUrl: 'templates/estabelecimentos/perfil.html',
          controller: 'PerfilCtrl'
      })

      .state('perfilEmergencia',{
          cache: false,
          url: '/perfilEmergencia',
          templateUrl: 'templates/estabelecimentos/perfil.html',
          controller: 'PerfilCtrl'
      })

      .state('listFilmes', {
          url:'/listFilmes',
          templateUrl: 'templates/cinema/cine.html',
          controller: 'FilmeCtrl'
      })

      .state('perfil-filme',{
          url: '/perfil-filme',
          templateUrl: 'templates/cinema/perfil-filme.html',
          controller:'FilmeCtrl'
      })
  ;
    $provide.decorator('OAuthToken', ['$localStorage', '$delegate', function ($localStorage, $delegate) {
            Object.defineProperties($delegate,{
                setToken:{
                    value: function(data){
                        return $localStorage.setObject('token', data);
                    },

                    enumerable: true,
                    configurable: true,
                    writable: true
                },

                getToken:{
                    value: function(){
                        return $localStorage.getObject('token');
                    },

                    enumerable: true,
                    configurable: true,
                    writable: true
                },

                removeToken:{
                    value: function(){
                        $localStorage.setObject('token', null);
                    },

                    enumerable: true,
                    configurable: true,
                    writable: true
                }
            });

            return $delegate;

    }]);

    $urlRouterProvider.otherwise('/dashboard');
});
