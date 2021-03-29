$('input[name=MyRadio]').change(function() {
    if($(this).val() == "option1") {
    $('#form1').attr("action","http://IMS/registeration/studentregister.php/");
    } else if($(this).val() == "option2") {
    $('#form1').attr("action","http://IMS/registeration/studentregister.php/");
    } else if($(this).val() == "option3") {
    $('#form1').attr("action","http://IMS/registeration/studentregister.php/");
    }
 else if($(this).val() == "option4") {
    $('#form1').attr("action","http://IMS/registeration/itregister.php/");
    }
    });