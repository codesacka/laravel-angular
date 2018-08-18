<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
            <div class="content">



<div  ng-app="TaskCrudApp">
                                     <div class="container-fluid" ng-controller="TaskController">
                                                <div class="row">
                                                    <div class="panel panel-default users-content">
                                                        <div class="panel-heading">Add Task <a href="javascript:void(0);" class="glyphicon glyphicon-plus" onclick="$('.formData').slideToggle();"></a></div>
                                            
                                                        <div class="col-md-6">
                                                        <div class="panel-body none formData">
                                                            <form class="form" name="userForm">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" name="name" ng-model="formdata.name"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea class="form-control" rows="5" id="description" ng-model="formdata.description"></textarea>
                                                                
                                                                </div>
                                                               
                                                                <a href="javascript:void(0);" class="btn btn-warning" onclick="$('.formData').slideUp();">Cancel</a>
                                                                <a href="javascript:void(0);" class="btn btn-success" ng-hide="formdata.id" ng-click="save(modalstate, id)">Add </a>
                                                                <a href="javascript:void(0);" class="btn btn-success" ng-hide="!formdata.id" ng-click="update(modalstate, id)">Update</a>
                                                            </form>
                                                        </div>
                                                        </div>
                                                         
                                                     
                                                         <table class="table table-striped">
                                                            <tr>
                                                                <th width="5%">#</th>
                                                                <th width="20%">Name</th>
                                                                <th width="30%">Description</th>
                                                               
                                                                <th width="10%"></th>
                                                            </tr>
                                                            <tr ng-repeat="task in tasks">
                                                                <td>@{{$index + 1}}</td>
                                                                <td>@{{ task.name }}</td>
                                                                <td>@{{ task.description}}</td>
                                                               
                                                                <td>
                                                                    <a href="javascript:void(0);" class="fa fa-edit" ng-click="toggle('edit', task.id)"></a>
                                                                    <a href="javascript:void(0);" class="fa fa-trash" ng-click="confirmDelete(task.id)"></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                          
                                    </div>



            </div>
       

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
                <script src="<?= asset('https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.2/angular.min.js') ?>"></script> 
                @include('scripts')

    </body>
</html>
