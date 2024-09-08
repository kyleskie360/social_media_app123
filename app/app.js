var app = angular.module('socialMediaApp', ['ngRoute']);

app.config(function($routeProvider) {
  $routeProvider
    .when('/login', {
      templateUrl: 'app/views/login.html',
      controller: 'AuthController'
    })
    .when('/profile/:id', {
      templateUrl: 'app/views/profile.html',
      controller: 'ProfileController'
    })
    .otherwise({
      redirectTo: '/login'
    });
});
