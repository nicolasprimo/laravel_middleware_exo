<!-- <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
    <a href="" class="text-sm text-gray-700 underline mr-2">Accueil</a>
    <a href="" class="text-sm text-gray-700 underline mr-2"></a>
</div>
@if (Route::has('login'))
<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Administration</a>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
    @endauth
</div>
@endif -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('accueil') }}">Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('posts.members') }}">Articles</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('mails.index') }}">Contact</a>
      </li>
      @auth      
       <li class="nav-item ">  
            <a href="{{ route('admin')  }}" class="nav-link">Administration</a>
        </li>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <li class="nav-item">  
            <button class="nav-link border-0" type="submit">
              Logout
            </button>
          </li>
          </form>
          
        @else   
        <li class="nav-item ">    
            <a href="{{ route('login') }}" class="nav-link">Login</a>   
        </li>
        @if (Route::has('register'))    
        <li class="nav-item ">   
            <a href="{{ route('register') }}" class="nav-link">Register</a>    
        </li> 
        @endif
     @endauth
      <!-- <li class="nav-item dropdown">       
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('posts.index') }}">Articles</a>     
       </div>
      </li>  -->
    </ul>
    
  </div>
</nav>