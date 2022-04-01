let app = angular.module('single-post',[]);
let post_id = document.querySelector('input[name=post_id]').value;
let paragraph = new Quill('#paragraph');
paragraph.enable(false);
app.controller('single-post-controller',($scope,$http)=>{
    $scope.post = {};
    function setData(data){
        $scope.post.title = data.title;
        $scope.post.date = data.date;
        $scope.post.thump = data.thump;
        paragraph.setContents(JSON.parse(data.paragraph));
    }
    $http.post('./handle_single_post.php', `post_id=${post_id}` ,{
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
      }).then(res=>setData(res.data));
});
