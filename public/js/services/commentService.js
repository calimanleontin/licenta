angular.module('commentService', [])

    .factory('Comment', function ($http){
        return {

            get : function(product_id){
                return $http.get('/api/comments/' + product_id    );
            },

            save : function(commentData, product_id){
                return $http({
                    method      : 'POST',
                    url         : '/api/comments/save/' + product_id,
                    data        : $.param(commentData),
                    headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
                });
            },

            destroy : function(commentId){
                return $http.get('/api/comments/delete/' + commentId);
            }
        };
    });