<html lang="en"><head>
    <meta charset="utf-8">
    <title>Backbone.js Todos</title>
    <link rel="stylesheet" href="todos.css">
    <style type="text/css">object,embed{                -webkit-animation-duration:.001s;-webkit-animation-name:playerInserted;                -ms-animation-duration:.001s;-ms-animation-name:playerInserted;                -o-animation-duration:.001s;-o-animation-name:playerInserted;                animation-duration:.001s;animation-name:playerInserted;}                @-webkit-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @-ms-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @-o-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}</style></head>

<body>

<div id="todoapp">

    <header>
        <h1>Todos</h1>
        <input id="new-todo" type="text" placeholder="What needs to be done?">
    </header>

    <section id="main" style="display: none;">
        <input id="toggle-all" type="checkbox">
        <label for="toggle-all">Mark all as complete</label>
        <ul id="todo-list"></ul>
    </section>

    <footer style="display: none;">

        <a id="clear-completed">Clear 1 completed item</a>

        <div class="todo-count"><b>0</b> items left</div>
    </footer>

</div>

<div id="instructions">
    Double-click to edit a todo.
</div>

<div id="credits">
    Created by
    <br>
    <a href="http://jgn.me/">Jérôme Gravel-Niquet</a>.
    <br>Rewritten by: <a href="http://addyosmani.github.com/todomvc">TodoMVC</a>.
</div>

<script src="json2.js"></script>
<script src="jquery.js"></script>
<script src="underscore.js"></script>
<script src="backbone.js"></script>
<script src="backbone.localStorage.js"></script>
<script src="todos.js"></script>

<!-- Templates -->

<script type="text/template" id="item-template">
    <div class="view">
        <input class="toggle" type="checkbox" <%= done ? 'checked="checked"' : '' %> />
        <label><%- title %></label>
        <a class="destroy"></a>
    </div>
    <input class="edit" type="text" value="<%- title %>" />
</script>

<script type="text/template" id="stats-template">
    <% if (done) { %>
    <a id="clear-completed">Clear <%= done %> completed <%= done == 1 ? 'item' : 'items' %></a>
    <% } %>
    <div class="todo-count"><b><%= remaining %></b> <%= remaining == 1 ? 'item' : 'items' %> left</div>
</script>



</body></html>