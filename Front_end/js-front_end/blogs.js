var posts = angular.module('posts',[]);
posts.controller('post', function($scope, $http) {
  $scope.posts = [];
  function setData(data){
    data.forEach((post)=>{
      $scope.posts[$scope.posts.length] = {
              id:post.post_id,
              title:post.title,
              paragraph:post.paragraph,
              thump:post.thump,
              date:post.date,
              description:post.description
            }
    });
    $scope.lastId = $scope.posts[$scope.posts.length - 1].id;
  }
  $http.post('./handle_blogs.php','init=true',{headers:{'Content-type':'application/x-www-form-urlencoded'}})
  .then(res=>setData(res.data));
  
  $scope.next = (lastId)=>{
    $http.post('./handle_blogs.php',`next=true&lastId=${lastId}`,{headers:{'Content-type':'application/x-www-form-urlencoded'}})
    .then(res=>setData(res.data));
  }
  
});

var paragraph = $('.post-paragragh');
if(paragraph.text().length > 23){
  var text = paragraph.text().replace(paragraph.text().substring(23, paragraph.text().length), "...");
  paragraph.text(text);
}


