<h1>Subnet</h1>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table1').DataTable({
            "processing": true,
            "ajax": {
                "url": "/subnetRoute/get/?ajax=true",
                "dataSrc": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.data.length; i++) {
                        var item = json.data[i];
                        return_data.push({
                            'route': '<a href="/subnetRoute/get/?id=' + item.id + '">' + item.id + '</a>' +
                            '<span class="actions">' +
                            '<button class="delete" title="Delete" data-id="' + item.id + '" data-type="subnetRoute"></button>' +
                            '<button class="edit" title="Edit" onclick="location.href=\'/subnetRoute/edit/?id=' + item.id + '\'"></button>' +
                            '</span>',
                            'subnet_id': item.subnet_id,
                            'gateway': item.gateway,
                            'destination': item.destination,
                            'mask': item.mask
                        })
                    }
                    return return_data;
                }
            },
            "columns": [
                {"data": "route"},
                {"data": "subnet_id"},
                {"data": "gateway"},
                {"data": "destination"},
                {"data": "mask"}
            ]
        });
    });
</script>
<table id='table' class='display'>
    <thead>
    <tr>
        <th>Subnet</th>
        <th>Gateway</th>
        <th>Mask</th>
        <th>Domain</th>
        <th>VlanID</th>
        <th>Type</th>
        <th>DNS 1</th>
        <th>DNS 2</th>
        <th>DHCP lease time</th>
        <th>DHCP renewal</th>
        <th>DHCP rebind time</th>
    </tr>
    </thead>
    <tbody>
    %content%
    </tbody>
    <tfoot>
    <tr>
        <th>Subnet</th>
        <th>Gateway</th>
        <th>Mask</th>
        <th>Domain</th>
        <th>VlanID</th>
        <th>Type</th>
        <th>DNS 1</th>
        <th>DNS 2</th>
        <th>DHCP lease time</th>
        <th>DHCP renewal</th>
        <th>DHCP rebind time</th>
    </tr>
    </tfoot>
</table>
<table id='table1' class='display'>
    <thead>
    <tr>
        <th>Route</th>
        <th>VlanID</th>
        <th>Gateway</th>
        <th>Destination</th>
        <th>Mask</th>
    </tr>
    </thead>
    <tbody>
    %routes%
    </tbody>
    <tfoot>
    <tr>
        <th>Route</th>
        <th>VlanID</th>
        <th>Gateway</th>
        <th>Destination</th>
        <th>Mask</th>
    </tr>
    </tfoot>
</table>