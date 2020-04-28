$(document).ready(function(){
    $("#department_id").change(function () {
        var department_id = $('#department_id').val();
        $("#book_id").html("");
        var option ="<option value=''>Select Book</option>";
        if(department_id != ""){
            $.post('crud/getbook.php',
                {department_id:department_id},
                function(data){
                    if(data){
                        $("#book_id").html(data);
                    }else{
                        $("#book_id").html(option);
                    }

                }
            );
        }else{
            $("#book_id").html(option);
        }
    });

});


    function availableStudent(){
        var student_id = $('#sinput_id').val();
        var result     = "<span id='status'>"+student_id+" is <strong>Available...</strong></span>";
        var error      = "<span id='error'>"+student_id+" is not <strong>Authorized!!</strong></span>";
        if(student_id != ""){
            $.post('crud/availablestudent.php',
                {student_id:student_id},
                function(data){
                    if(data){
                       $("#msg").html(result);
                       $("#issuesubmit").attr("disabled",false);
                       $('#student_id').val(data);
                    }else{
                        $("#msg").html(error);
                       $("#issuesubmit").attr("disabled",true);
                    }

                }
            );
        }else{
            $("#msg").html(error);
        }
    }