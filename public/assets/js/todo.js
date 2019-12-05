$(document).on('click','#createBtn',function(){
  var title = $('#task_title').val();
  $.ajax({
    url : '/add_task',
    data : {
      'title' : title,
    },
    success:function(data){
      console.log(data);
      $('#task_list').append('<tr><td>'+data.title+'</td><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-success btn-sm update_status" data-title="{{$todo->title}}" data-toggle="modal"  data-id="{{$todo->id}}" data-target="#edit" >Done</button></p></td><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-sm edit_task" data-title="'+data.title+'" data-toggle="modal"  data-id="'+data.id+'" data-target="#edit" >Edit</button></p></td><td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-secondary btn-sm delete_task"data-title="'+data.title+'" data-toggle="modal"  data-id="'+data.id+'">Delete</button></p></td></tr>');
      $("#newTodoModal").modal('toggle');
    }
  })
});

$('#add_task_form').submit(function(event) {
    $('#add_task_Model').modal('show') ;

  /* stop form from submitting normally */
  event.preventDefault();
  
  var title = $('#task_title').val();
  if(title){
    //ajax post the form
    $.get("/add_task", {title: title}).done(function(data) {

    });

  }
  else{
    alert("Please give a title to task");
    }
});

$(document).on('click','.edit_task',function(){
  $('#todoModal').modal('show') ;
  var title = $(this).attr('data-title');
  var id = $(this).attr('data-id');
  $('#edit_id').val(id);
  $('#edit-title').val(title);

});

$(document).on('click','#update',function(){
  var id = $('#edit_id').val();
  var title = $('#edit-title').val();
  $.ajax({
    url : '/edit_task',
    data : {
      'id' : id,
      'title' : title,
    },
    success:function(data){
      $("#row-"+data.id).html('<td>'+data.title+'</td><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-success btn-sm update_status" data-title="{{$todo->title}}" data-toggle="modal"  data-id="{{$todo->id}}" data-target="#edit" >Done</button></p></td><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-sm edit_task" data-title="'+data.title+'" data-toggle="modal"  data-id="'+data.id+'" data-target="#edit" >Edit</button></p></td><td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-secondary btn-sm delete_task"data-title="'+data.title+'" data-toggle="modal"  data-id="'+data.id+'">Delete</button></p></td>');
      $("#todoModal").modal('toggle');
    }
  })
});


$(document).on('click','.delete_task',function(){
  var id = $(this).attr('data-id');
   $.ajax({
    url : '/delete_task',
    data : {
      'id' : id,
    },
    success:function(data){
      $('#row-'+data).remove();
    }
  })
});


$(document).on('click','.update_status',function(){
  var id = $(this).attr('data-id');
   $.ajax({
    url : '/update_status',
    data : {
      'id' : id,
    },
    success:function(data){
      $("#row-"+data.id).html('<td>'+data.title+'</td><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button disabled class="btn btn-light btn-sm update_status" data-title="{{$todo->title}}" data-toggle="modal" data-id="{{$todo->id}}" data-target="#edit" >Done</button></p></td><td><p data-placement="top" data-toggle="tooltip" title="Edit"><button disabled class="btn btn-light btn-sm edit_task" data-title="'+data.title+'" data-toggle="modal" data-id="'+data.id+'" data-target="#edit" >Edit</button></p></td><td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-secondary btn-sm delete_task"data-title="'+data.title+'" data-toggle="modal"  data-id="'+data.id+'">Delete</button></p></td>');
      $("#row-"+data.id).css('background-color','#00ff00');
    }
  })
});
