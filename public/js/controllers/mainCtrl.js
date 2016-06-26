angular.module('mainCtrl', [])

    .controller('mainController', function($http, $scope, Tag, Comment){

        $scope.tagData = {};
        $scope.commentData = {};

        var href = window.location.href;
        href = href.split('/');
        var number = href.length;
        var product_route = (href[number-2]);
        var product_slug = (href[number-1]);

        $scope.loading = true;

        if(product_route == 'view')
        {
            
            Comment.get(product_slug)
                .success(function(data){
                    $scope.comments = data;
                    $scope.loading = false;
                });
            
            Comment.user()
                .success(function (data) {
                    $scope.user = data;
                    $scope.loading = false;
                });
        }



        $scope.submitComment = function(product_slug){
            $scope.loading = true;

            Comment.save($scope.commentData, product_slug)
                .success(function(data){
                    Comment.get(product_slug)
                        .success(function(getData){
                            $scope.comments = getData;
                            $scope.loading = false;
                        });
                });
        };

        $scope.deleteComment = function(commentId){
            $scope.loading = true;

            Comment.destroy(commentId)
                .success(function(data){
                    Comment.get(company_slug)
                        .success(function(getData){
                            $scope.comments = getData;
                            $scope.loading = false;
                        });
                });
        };

        $scope.rateCompany = function(companyId, value){
            $scope.loading = true;

            $http.get('/api/grades/' + companyId + '/' + value)
                .success(function(data){
                    $scope.average = data['value'];
                    $scope.myGrade = data['myValue'];
                });
            $scope.loading = false;
        };
    });