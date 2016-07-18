@extends('master')

@section('title') Add a Task @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Add Task</h3>
            <p>Use the following form to add a new task to the system.</p>

            <hr>

            <form action="{{ url('add') }}" method="post">
                {{ csrf_field() }}

                <p><input autofocus type="text" placeholder="Name..." name="name" class="form-control" /></p>
                <p><input type="text" placeholder="Description..." name="description" class="form-control" /></p>

                <hr>

                <p><button class="form-control btn btn-success">Add Task</button></p>
            </form>
        </div>
    </div>
@endsection