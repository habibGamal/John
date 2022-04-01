let app = angular.module('calculator',[]);
let options = {
    1:['Goal : Lose body fat and overall body weight | Preference : Balanced','Goal : Improve health and maintain body weight | Preference : Higher - carb'],
    2:['Goal : Lose body fat and overall body weight | Preference : Lower-carb','Goal : Improve health and maintain body weight | Preference : Balanced', 'Goal : Gain muscle and overall body weight | Preference : Balanced'],
    3:['Goal : Improve health and maintain body weight | Preference : Lower-carb','Goal : Gain muscle and overall body weight | Preference : Higher - carb']
}
app.controller('form', ($scope)=>{
    $scope.planNumber = [0,0];
    $scope.iterableOptions;
    $scope.activity = function(){
        $scope.iterableOptions = options[$scope.actValue];
        $scope.planNumber[0] = $scope.actValue;
    }
    $scope.mode = function(){
        $scope.planNumber[1] = $scope.modeValue;
    }
    $scope.download = function(){
        let number = $scope.planNumber[0]+$scope.planNumber[1];
        let anchor = document.createElement('a');
        let href   = `../Template/pdf/${number}.pdf`;
        anchor.href = href;
        anchor.download = 'download';
        anchor.click();
        console.log('test');
    }
})

function getValue(name){
    return document.forms['calculator'][name].value
}

function setValue(id,value){
    document.getElementById(id).textContent = value;
}
