var app = angular.module('angularjs-app', ['ngRoute']);

app.config(function($routeProvider) {
	$routeProvider
		.when('/',{
		    templateUrl: '../../views/page-home.html',
		    controller: homeCtrl
		})
		.when('/about/',{
		    templateUrl: '../../views/page-about.html',
		    controller: aboutCtrl
		})
		.when('/portfolio/',{
		    templateUrl: '../../views/page-portfolio.html',
		    controller: portfolioCtrl
		})
		.when('/contact/',{
		    templateUrl: '../../views/page-contact.html',
		    controller: contactCtrl
		});
		// .otherwise({
		// 	redirectTo:'/'
		// });
});

app.factory('Page', function(){
	var title = 'Bruno Veiga | Developer';
	var loadHeader = false;

	return {
		title: function() { return title; },
		setTitle: function(newTitle) { title = newTitle; },
		getLH: function(value) { return loadHeader; },
		setLH: function(value) { loadHeader = value; },
	};
});

// Main Controller
app.controller('mainController', function($scope, Page) {
	$scope.Page = Page;
});

// Specific Controllers
function homeCtrl($scope, Page) {
	Page.setTitle('Bruno Veiga | Developer');
	Page.setLH(false);
}
function aboutCtrl($scope, Page) {
	Page.setTitle('Bruno Veiga | About Me');
	Page.setLH(true);
}
function portfolioCtrl($scope, Page) {
	Page.setTitle('Bruno Veiga | Portfolio');
	Page.setLH(true);
}
function contactCtrl($scope, Page) {
	Page.setTitle('Bruno Veiga | Contact Me');
	Page.setLH(true);
}














