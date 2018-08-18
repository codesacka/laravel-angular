<script type="text/javascript">
var app = angular.module('TaskCrudApp', [])
    .constant('API_URL',  {!! json_encode(url('/')) !!} );

app.controller('TaskController', function($scope,$http,API_URL) {
    //retrieve classes listing from API
      $scope.formdata = {};

    getData();
    function getData(){
     
      $http({
        method: 'GET',
        url: API_URL + "/Task/index"
        }).then(function successCallback(response) {
            console.log(response);
             $scope.tasks = response.data;
            // this callback will be called asynchronously
            // when the response is available
        }, function errorCallback(response) {
            console.log(response);
            // called asynchronously if an error occurs
            // or server returns response with an error status.
        });

    }

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;
        
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Task";
                break;
            case 'edit':
          
                $scope.form_title = "Task Detail";
                $scope.id = id;

                 $http({
                    method: 'GET',
                    url: API_URL + '/Task/'+id+"/show"
                    }).then(function successCallback(response) {
                        console.log(response);
                        $scope.formdata = response.data;
                    }, function errorCallback(response) {
                        console.log(response);
                     
                    });


        
                break;
            default:
                break;
        }
        console.log(id);
       // $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "/Task/store";

        var data = $.param($scope.formdata);
        var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }    
            };

        $http.post(url, data, config).then(function (response) {
            $scope.formdata={};
            getData();
            // This function handles success

            }, function (response) {

            // this function handles error

        })

       
    }

      //save new record / update existing record
      $scope.update = function(modalstate, id) {
        var url = API_URL +"/Task";
       //append employee id to the URL if the form is in edit mode
       if (modalstate === 'edit'){
           url += "/" + id;
       }

        var data = $.param($scope.formdata);
        var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }    
            };

       $http.put(url, data, config).then(function (response) {
            $scope.formdata={};
            // This function handles success
            getData();

            }, function (response) {

            // this function handles error

            });

      
   }


    

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
         
            
            var url = API_URL + '/Task/' + id, data = {};

            $http.delete(url, data).then(function (response) {

            // This function handles success
               getData();

            }, function (response) {

            // this function handles error

            });


        } else {
            return false;
        }
    }




});

</script>