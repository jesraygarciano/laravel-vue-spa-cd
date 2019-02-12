<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">

    <title>Calculator</title>
</head>
<body>
        <style>
                .fade-enter-active, .fade-leave-active {
                  transition: opacity .5s
                }
                .fade-enter, .fade-leave-active {
                  opacity: 0
                }
        </style>

        <div class="container">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      {{-- <router-link to="/" class="nav-link">Home</router-link> --}}
                      <a href="/" class="nav-link">Home</a>
                      
                    </li>
                    <li class="nav-item">
                      {{-- <router-link to="/create" class="nav-link">Create Post</router-link> --}}
                      <a href="/create" class="nav-link">Create Post</a>

                    </li>
                    <li class="nav-item">
                      {{-- <router-link to="/posts" class="nav-link">Posts</router-link> --}}
                      <a href="/posts" class="nav-link">Posts</a>

                    </li>
                    <li class="nav-item">
                      <!-- <router-link to="/calc" class="nav-link">Calculator</router-link> -->
                      <a href="/calc" class="nav-link">Calculator</a>
                    </li>
                  </ul>
                </nav><br />

                
    <form action="/calc" method="post" >
        {{ csrf_field() }}
        <input placeholder="A" value="{{ $a }}" name="a" />
        <select name="action">
            <option @if ($action == '+') selected="selected" @endif>+</option>
            <option @if ($action == '-') selected="selected" @endif>-</option>
            <option @if ($action == '*') selected="selected" @endif>*</option>
            <option @if ($action == '/') selected="selected" @endif>/</option>
        </select>
        <input placeholder="B" value="{{ $b }}" name="b" />
        @if (isset($result))
            <strong>= {{ $result }}</strong>
        @endif
        <button>Execute</button>
    </form>

    </div>

    
</body>
</html>