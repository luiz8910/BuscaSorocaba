angular.module('starter.services')
    .factory('$localStorage', ['$window', function ($window) {
        return {
            set: function (key, value) {
                return $window.localStorage[key] = value;
            },
            get: function(key, defaultValue){
                return $window.localStorage[key] || defaultValue;
            },

            setObject: function (key, value) {
                $window.localStorage[key] = JSON.stringify(value);
                return this.getObject(key);
            },

            getObject:function(key){
                return JSON.parse($window.localStorage[key] || null);
            }
        }
    }]);