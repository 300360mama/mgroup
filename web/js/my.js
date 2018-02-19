

function addClick(attribute){
    $(attribute).click(function() {
    $('.addTask').toggleClass('addTask_visible');

    });
}



addClick('#addTask_form');

function count(){
    var quantity = $('.quantityTasks span');
    var listTask = $('.taskInfo').length;
    //alert(listTask);
    quantity.html(listTask);
}



function sendForm(){

    $('#add_form').click(function (e) {

        var data = $('#add_form').serializeArray();
        $.ajax({
            type: "POST",
            url: '/tasks/add',
            data: data,
            success: function(data){
                if(data != -1){
                    $('.listTasks').html(data);

                }

                count();

            },
            
            error:  function(xhr, str){
                alert('Возникла ошибка при соединени с сервером' );
            }
        });
        e.preventDefault();

    });


}

sendForm();


function changeTask(){
    $('input:checkbox').change(function(event){

       var self = this;
        var idTask = this.id.split('_')[1];
        var data = {'id':idTask};
        $.ajax({
            type: "POST",
            url: '/tasks/remove',
            data: data,
            success: function(data){

                self.disabled = true;
                console.log(self.id);

            },

            error:  function(xhr, str){
                alert('Возникла ошибка при соединени с сервером' );
            }
        });






    });
}

changeTask();


