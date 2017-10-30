<h1>Users</h1>
<p class="form hide">
    <input type="text" value="" placeholder="login" name="user[login]"/>
    <input type="password" value="" placeholder="password" name="user[password]"/>
    <input type="text" value="" placeholder="username" name="user[username]"/>
    <input type="text" value="" placeholder="email" name="user[email]"/>
    <button class="create" title="Create" data-type="user">Create</button>
</p>
<p>
    <button title="Add new user" id="show">Add new user</button>
</p>

<script type="text/javascript">
    $(document).ready(function () {
        $('#table').DataTable({
            "processing": true,
            "ajax": {
                "url": "/user/get/?ajax=true",
                "dataSrc": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.data.length; i++) {
                        var item = json.data[i];
                        return_data.push({
                            'user': '<a href="/user/show/?login=' + item.login + '">' + item.login + '</a>' +
                            '<span class="actions">' +
                            '<button class="delete" title="Delete" data-id="' + item.id + '" data-type="user"></button>' +
                            '<button class="edit" title="Edit" onclick="location.href=\'/user/edit/?id=' + item.id + '\'"></button>' +
                            '</span>',
                            'username': item.username,
                            'email': item.email,
                            'status': '<input class="status" type="checkbox" data-id="' + item.id + '" value="' + item.status + '" data-type="user" />'
                        })
                    }
                    return return_data;
                }
            },
            "columns": [
                {"data": "user"},
                {"data": "username"},
                {"data": "email"},
                {"data": "status"}
            ]
        });
    });
</script>
<p>
<table id='table' class='display'>
    <thead>
    <tr>
        <th>Login</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Login</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
    </tr>
    </tfoot>
    <tbody>
    %content%
    </tbody>
</table>
</p>