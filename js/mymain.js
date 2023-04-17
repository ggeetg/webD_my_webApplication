setInterval(function(){
	var d = new Date().toLocaleString();
	document.getElementById("tdate").innerHTML = d;
},1000);

$(document).ready(function(){
  $("#profile-tail").hide();
  $("#profile-icon").click(function(){
    $("#profile-tail").toggle();
  });
});

//ajax completed status , activity table
function callcomp(id){
      var url ="completedajax.php";
      var x = "true";
      var data = {q:x};
      $.post(url,data,function(data, status){
        $("#comp_status"+id).html(data);
      });
};

//add activity replicate, activity table
var i=1;
$(document).ready(function(){
	$('#add_act').click(function(){  
	   i++;  
	   $('#activity_table').append('<tr id="row'+i+'" ><td></td><td><input class="form-control" type="text" name="activity_name[]" required><input type="hidden" name="new_activity[]" value="true"></td><td><input class="form-control" type="date" name="comp_date[]" required></td><td><select class="form-control" id="comp_status'+i+'" name="comp_status[]" required><option value="">Select</option></select></td><td><input class="form-control" type="text" name="obst[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn_remove">X</button></td></tr>');
	   callcomp(i);
	});
	$(document).on('click', '.btn_remove', function(){  
	   var button_id = $(this).attr("id");   
	   $('#row'+button_id+'').remove();
	}); 
});

//remove monthly report activity by click on cross
function removeact(id){
      var url = "remove_act_ajax.php";
      var x = id;
      var data = {q:x};
      //console.log(data);
      if(confirm("Are you want to delete this achievement.It will be permanently deleted.")){
        $.post(url,data,function(data, status){
          console.log(data);
        });
        return true;
      }
      return false;
}


// set autocomplete off
$(document).ready(function(){  
  $("input").attr("autocomplete", "off");
});


