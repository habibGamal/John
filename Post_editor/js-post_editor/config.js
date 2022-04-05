let app = angular.module('editor',[]);
var toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];
var options = {
  modules: {
      toolbar:  toolbarOptions
  },
  placeholder: 'Compose an epic...',
  readOnly: false,
  theme: 'snow'
};
var editor = new Quill('#editor', options);

function newPost(){
  let data = new FormData(document.getElementById('post-form'));
  let thump = document.getElementById('post_thump');
  // append the paragraph
  data.append('post_paragraph',JSON.stringify(editor.getContents()));
  // append execute
  data.append('execute',true);
  // append the operation
  data.append('op','new');
  // append thump
  // data.append('post_thump',thump.files[0]);
  fetch('./handle.php',{method: 'POST',body: data}).then(res => res.text()).then(res=>console.log(res));
}

function editPost(){
  let data = new FormData(document.getElementById('post-form'));
  let thump = document.getElementById('post_thump');
  // append the paragraph
  data.append('post_paragraph',JSON.stringify(editor.getContents()));
  // append execute
  data.append('execute',true);
  // append thump
  // data.append('post_thump',thump.files[0]);
  fetch('./handle.php',{method: 'POST',body: data}).then(res => res.text()).then(res=>console.log(res));
}

app.controller('editor-controller',($scope,$http) =>{
    let operation = document.querySelector('input[name=op]').value;
    if(operation === 'edit'){
      let post_id = document.querySelector('input[name=post_id]').value;
      function setData(data){
        $scope.post_title = data[0].title;
        $scope.post_date = new Date(data[0].date);
        $scope.post_description = data[0].description;
        $scope.post_thump_old = data[0].thump;
      }
      $http.post('./handle.php', `get_old_data=true&post_id=${post_id}` ,{
              headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
      .then(res=>{
        setData(res.data);
        editor.setContents(JSON.parse(res.data[0].paragraph));
        document.getElementById('submit').onclick = ()=>editPost();
      });
    }else{
      document.getElementById('submit').onclick = ()=>newPost();
    }

})
