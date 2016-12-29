@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="list-group">
                    <div class="list-group-item">
                <h2>Welcome to MemoryChest</h2>
                    </div>
                    <div class="list-group-item">
                        <p class="">Hi! Welcome to MemoryChest. Here you can store your memories on the cloud, instead of in a jar. You can keep track of all your kept memories throughout the year.</p>
                        <p>This is based off a popular idea to store memories on bits of paper inside a jar, to be opened and read through at the end of the year. This is just an easier way of doing it.</p>
                        <p>All of your memories are your own, and not visible to anyone but yourself.</p>
                        <p>I hope you find this fun and interesting!</p>

                        <hr>

                        <h3>Getting started</h3>
                        <hr>
                        <p>First, sign up using the button below and use the drop-down on the right to add a new memory to your chest!</p>

                        <a href="{{ url('register') }}">
                            <button value="Sign Up" class="btn btn-primary">Sign Up!</button>
                        </a>

                        <hr>
                        <p>Already signed up? Log in below to see your memories or add new ones!</p>
                        <a href="{{ url('login') }}">
                            <button value="Log In" class="btn btn-primary">Log In!</button>
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
