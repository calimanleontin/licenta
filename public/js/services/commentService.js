angular.module('commentService', [])

    .factory('Comment', function ($http){
        return {

            get : function(product_slug){
                return $http.get('/api/comments/' + product_slug    );
            },

            save : function(commentData, product_slug){
                return $http({
                    method      : 'POST',
                    url         : '/api/comments/save/' + product_slug,
                    data        : $.param(commentData),
                    headers : {'Content-Type' : 'application/x-www-form-urlencoded'}
                });
            },

            destroy : function(commentId){
                return $http.get('/api/comments/delete/' + commentId);
            },
            user : function(){
                return $http.get('/api/getUser');
            }
        };
    });