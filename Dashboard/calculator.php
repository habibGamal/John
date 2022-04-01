<?php
    $css = ['style'=>'css-dashboard']; // to include css file that in css-dashboard 
    $js = ['calculator'=>'js-dashboard'];
    $use_angular = true;
    include '../functions.php';
    
    include TEMPLATE.'header.php';
    
    include TEMPLATE.'nav.php';

    if( ! isset( $_SESSION['name'] ) || ! isset( $_SESSION['email'] ) ){
        header('Location:../Login/index.php');
        exit;
    }
    if( $_SESSION['admin'] == 1){
        header('Location:../Admin/index.php');
        exit;
    }
    

?>  
<section class="calculator" ng-app="calculator">
    <div class="section-title">
        <div class="container">
            <div class="title">
                <h2>Calculator</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <form id="calculator" name="calculator" ng-controller="form">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Activity</label>
                <div class="col-sm-10">
                    <select class="form-control" ng-model="actValue" ng-change="activity()">
                        <option value="1">Minimal Activity : No purposeful exercise , < 6,000 steps / day</option>
                        <option value="2">Moderate Activity : 3-4 workouts / week , 6,000 - 10,000 steps / day</option>
                        <option value="3">High Activity : 6-7 workouts / week , 10,000 - 15,000 steps / day</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Mode</label>
                <div class="col-sm-10">
                    <select class="form-control"  ng-model="modeValue" ng-change="mode()">
                        <option ng-repeat="option in iterableOptions" value={{$index}}>{{option}}</option>
                    </select>
                </div>
            </div>
            <button type="button" class="btn btn-custom d-block mx-auto mt-3" ng-click="download()">Download plan</button>
        </form>
    </div>
</section>
<?php include TEMPLATE . 'footer.php'?>