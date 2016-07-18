@extends('master')

@section('title') Edit Task @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Edit Task</h3>
            <p>Use the following form to edit che chosen task.</p>

            <hr>

            <form action="{{ url('edit/'. $task->getId()) }}" method="post">
                {{ csrf_field() }}

                <p><input autofocus type="text" placeholder="Name..." name="name" class="form-control" value="{{ $task->getName() }}" /></p>
                <p><input type="text" placeholder="Description..." name="description" class="form-control" value="{{ $task->getDescription() }}" /></p>

                <hr>

                <p><button class="form-control btn btn-success">Save Task</button></p>
            </form>
        </div>
    </div>
@endsection