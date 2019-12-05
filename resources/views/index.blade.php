<html>
  <head>
    <title>To-do List Task</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <section id="data_section" class="todo">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTodoModal">
        Add New Task
      </button>
        <div class="modal fade" id="newTodoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input id="task_title" type="text" name="title"placeholder="Enter a task name" value=""/>
              </div>
              <div class="modal-footer">
                <button type="button" id="createBtn" class="btn btn-primary">Create Task</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="row"> 
        @if($todos->isEmpty())
        <p> No Data Available </p>

        @else 
        <table id="task_list" class="table table-bordred todo-list">
          <thead>
            <th>Task</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach($todos  as $todo)

              @if ($todo->status == '1')
              <tr id="row-{{$todo->id}}" style= "background-color: #00ff00">
              @else
              <tr id="row-{{$todo->id}}">
              @endif
                <td id="{{$todo->id}}" class="done"><a href="#" class="toggle"></a><span id="span_{{$todo->id}}">{{$todo->title}}</span> 
                </td>
                  <td>
                    <p data-placement="top" data-toggle="tooltip" title="Make Done">
                      @if ($todo->status == '1')

                        <button disabled class="btn btn-light btn-sm update_status" data-title="{{$todo->title}}" data-toggle="modal"  data-id="{{$todo->id}}" data-target="#edit">Done</button>
                      @else

                        <button class="btn btn-success btn-sm update_status" data-title="{{$todo->title}}" data-toggle="modal"  data-id="{{$todo->id}}" data-target="#edit">Done</button>

                      @endif

                    </p>
                  </td>

                  <td>
                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                    
                    @if ($todo->status == '1')
                      <button disabled class="btn btn-light btn-sm edit_task" data-title="{{$todo->title}}" data-toggle="modal"  data-id="{{$todo->id}}" data-target="#edit" >Edit</button>
                    @else
                      <button class="btn btn-primary btn-sm edit_task" data-title="{{$todo->title}}" data-toggle="modal"  data-id="{{$todo->id}}" data-target="#edit" >Edit</button>
                    @endif
                    </p>
                  </td>

                <td>
                  <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <button class="btn btn-secondary btn-sm delete_task"data-title="{{$todo->title}}" data-toggle="modal"  data-id="{{$todo->id}}" >
                    Delete  </button>
                  </p>
                </td>
              </tr>
            @endforeach
           </tbody>
          @endif
        </table>
      </div>    
    <!--Edit Todo Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="todoModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">Update Task
           <input type="text" id="edit-title">
           <input type="hidden" name="" id="edit_id">
          </div>
          <div class="modal-footer">
            <button type="button" id="update" class="btn btn-primary">Update Task</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="http://code.jquery.com/jquery-latest.min.js"type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/todo.js')}}" type="text/javascript"></script>
  </body>
</html>