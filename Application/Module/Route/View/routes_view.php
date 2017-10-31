<h1>Routes</h1>
<p class="form hide">
    <input type="text" value="" placeholder="gateway" name="route[gateway]"/>
    <input type="text" value="" placeholder="mask" name="route[mask]"/>
    <input type="text" value="" placeholder="destination" name="route[destination]"/>
    <input type="number" value="" placeholder="subnet_id" name="route[subnet_id]"/>
    <button class="create" title="Create" data-type="route">Create</button>
</p>
<p>
    <button title="Add new Route" id="show">Add new Route</button>
</p>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').DataTable({
            "processing": true,
            "ajax": {
                "url": "/route/get/?ajax=true",
                "dataSrc": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.data.length; i++) {
                        var item = json.data[i];
                        return_data.push({
                            'route': '<a href="/route/get/?id=' + item.id + '">' + item.id + '</a>' +
                            '<span class="actions">' +
                            '<button class="delete" title="Delete" data-id="' + item.id + '" data-type="route"></button>' +
                            '<button class="edit" title="Edit" onclick="location.href=\'/route/edit/?id=' + item.id + '\'"></button>' +
                            '</span>',
                            'subnet_id': item.subnet_id,
                            'gateway': item.gateway,
                            'mask': item.mask,
                            'destination': item.destination
                        })
                    }
                    return return_data;
                }
            },
            "columns": [
                {"data": "route"},
                {"data": "subnet_id"},
                {"data": "gateway"},
                {"data": "mask"},
                {"data": "destination"}
            ]
        });
    });
</script>
<table id='table' class='display'>
    <thead>
    <tr>
        <th>Route</th>
        <th>SubnetID</th>
        <th>Gateway</th>
        <th>Mask</th>
        <th>Destination</th>
    </tr>
    </thead>
    <tbody>
    %content%
    </tbody>
    <tfoot>
    <tr>
        <th>Route</th>
        <th>SubnetID</th>
        <th>Gateway</th>
        <th>Mask</th>
        <th>Destination</th>
    </tr>
    </tfoot>
</table>
