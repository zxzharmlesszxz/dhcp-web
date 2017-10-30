<h1>Subnets</h1>
<p class="form hide">
    <input type="text" value="" placeholder="login" name="admin[login]"/>
    <input type="password" value="" placeholder="password" name="admin[password]"/>
    <input type="text" value="" placeholder="username" name="admin[username]"/>
    <input type="text" value="" placeholder="email" name="admin[email]"/>
    <button class="create" title="Create" alt="Create" data-type="admin">Create</button>
</p>
<p>
    <button alt="Add new Subnet" title="Add new Subnet" id="show">Add new Subnet</button>
</p>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').DataTable({
            "processing": true,
            "ajax": {
                "url": "/subnet/get/?ajax=true",
                "dataSrc": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.data.length; i++) {
                        var item = json.data[i];
                        return_data.push({
                            'subnet': '<a href="/subnet/show/?id=' + item.id + '">' + item.id + '</a>' +
                            '<span class="actions">' +
                            '<button class="delete" title="Delete" data-id="' + item.id + '" data-type="subnet"></button>' +
                            '<button class="edit" title="Edit" onclick="location.href=\'/subnet/edit/?id=' + item.id + '\'"></button>' +
                            '</span>',
                            'domain': item.domain,
                            'gateway': item.gateway,
                            'vlan_id': item.vlan_id,
                            'dns1': item.dns1,
                            'dns2': item.dns2,
                            'type': item.type,
                            'mask': item.mask,
                            'dhcp_lease_time': item.dhcp_lease_time,
                            'dhcp_renewal': item.dhcp_renewal,
                            'dhcp_rebind_time': item.dhcp_rebind_time
                        })
                    }
                    return return_data;
                }
            },
            "columns": [
                {"data": "subnet"},
                {"data": "domain"},
                {"data": "gateway"},
                {"data": "vlan_id"}
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
    <tbody>
    %content%
    </tbody>
    <tfoot>
    <tr>
        <th>Login</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
    </tr>
    </tfoot>
</table>
</p>
