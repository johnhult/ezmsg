var phonecatApp = angular.module('ezmsg', []);

phonecatApp.controller('personController', function($scope) {
	$scope.persons = [ {
		'id' : '1001',
		'name' : 'Anna Nilsson',
		'picture' : 'p/01.jpg'
	}, {
		'id' : '1002',
		'name' : 'Petra Jonsson',
		'picture' : 'p/02.jpg'
	}, {
		'id' : '1003',
		'name' : 'Lina Dagsson',
		'picture' : 'p/03.jpg'
	}, {
		'id' : '1004',
		'name' : 'Ulla Håkansson',
		'picture' : 'p/04.jpg'
	}, {
		'id' : '1005',
		'name' : 'Siv Malmkvist',
		'picture' : 'p/05.jpg'
	}, {
		'id' : '1006',
		'name' : 'Nina Tyrsvik',
		'picture' : 'p/06.jpg'
	} ];
});
