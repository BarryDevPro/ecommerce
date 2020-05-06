<!DOCTYPE html>
<html lang="en" ng-app="app">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap/bootstrap.min.css')}}">
</head>
<body ng-controller="appCtlr">
    <p>@{{2 + 1}}</p>
    <p>
        <div class="card col-md-8 offset-2">
            
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="txa" ng-model="tva">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Prix" ng-model="prix" ng-change="click()">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Prix ttc" ng-model="prixttc">
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </p>
    <script type="text/javascript" src="{{asset('angular/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('angular/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('angular/appCtlr.js')}}"></script>
</body>
</html>