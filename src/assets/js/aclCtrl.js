//Main Controller
angular.module('app')
    .controller('aclCtrl', ['$scope', '$state', '$http', function ($scope, $state, $http) {
        $scope.edit = function (id) {
            var url = niRouteUrl(
                php(/*URL::route('Netinteractive\Acl\Http\Controllers\AclController@edit',array('id'=>'id'))*/),
                {
                    id:id
                }
            );

            $http({
                method: 'GET',
                headers: { 'X-Requested-With' :'XMLHttpRequest' },
                url: url,
            }).success(function(data){
                // With the data succesfully returned, we can resolve promise and we can access it in controller
                $scope.editData = data;
                console.log(data);
            }).error(function(){
                alert("error");
                //let the function caller know the error
                deferred.reject(error);
            });

        };
    }
    ]);


angular.module('app')
    .controller('aclEdit', ['$scope', '$state', 'roleService', function ($scope, $state, roleService) {

    }
    ]);


angular.module('app').config(
    ['$stateProvider', '$urlRouterProvider', 'JQ_CONFIG', 'MODULE_CONFIG',
        function ($stateProvider,   $urlRouterProvider, JQ_CONFIG, MODULE_CONFIG) {
            $stateProvider.state('app.acl', { // state for showing all records
                    url: '/acl',
                    templateUrl: php(/*URL::route('Netinteractive\Acl\Http\Controllers\AclController@index')*/),
                    controller: 'aclCtrl'
                })
                .state('app.editacl', { //state for updating
                    url: '/acl/:id/edit',
                    templateUrl:function ($stateParams) {
                        return niRouteUrl(
                            php(/*URL::route('Netinteractive\Acl\Http\Controllers\AclController@edit',array('id'=>'id'))*/),
                            {
                                id:$stateParams.id
                            }
                        );
                    },
                    controller: 'aclEdit'
                });

        }]
);