@include('templates.header', ['title' => 'Home Pages'])

<?php 

?>

<div class="main-content login-panel">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo mt-3 ">
                    <h3>EARTH TO DO LIST</h3>
                </div>
                <a href="/add"><i class="fa-duotone fa-plus"></i></a>
            </div>
            <div class="bottom">
                @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <h3 class="panel-title">To Do List</h3>
                <ul>
                    @foreach($data as $id)
                        <li class="d-flex justify-content-between my-2">
                            <span>{{ $id -> activity_name}}</span>
                            <div class="d-flex justify-content-evenly">
                                <a href="/update/{{ $id->id }}" class="btn">
                                    <i class="fa-solid fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('delete', ['id' => $id->id]) }}">
                                    @method('DELETE')
                                    @csrf                                   
                                    <button type="submit" class="btn">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>


@include('templates.footer')
