<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Blog</h3>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('admin.home') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('categories.index') }}">Categories</a>
        </li>
        <li>
            <a href="{{ route('articles.index') }}">Articles</a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">Users</a>
        </li>
    </ul>
</nav>