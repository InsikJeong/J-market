<div class="search-div">
    <form action='/search' method="post" class="search-Form">
        {!! csrf_field() !!}
        <input class="search-bar" type="text" placeholder="Search" name="search">
        <button><img class="search-img" src="/main/search.jpg" alt="search"></button>
    </form>
</div>