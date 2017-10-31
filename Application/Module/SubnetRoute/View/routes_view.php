<h1>Subnets</h1>
<p class="form hide">
    <input type="text" value="" placeholder="gateway" name="subnet[gateway]"/>
    <input type="text" value="" placeholder="mask" name="subnet[mask]"/>
    <input type="text" value="" placeholder="domain" name="subnet[domain]"/>
    <input type="number" value="" placeholder="vlan_id" name="subnet[vlan_id]"/>
    <input type="text" value="" placeholder="type" name="subnet[type]"/>
    <input type="text" value="" placeholder="dns1" name="subnet[dns1]"/>
    <input type="text" value="" placeholder="dns2" name="subnet[dns2]"/>
    <input type="number" value="" placeholder="dhcp_lease_time" name="subnet[dhcp_lease_time]"/>
    <input type="number" value="" placeholder="dhcp_renewal" name="subnet[dhcp_renewal]"/>
    <input type="number" value="" placeholder="dhcp_rebind_time" name="subnet[dhcp_rebind_time]"/>
    <button class="create" title="Create" data-type="subnet">Create</button>
</p>
<p>
    <button title="Add new Subnet" id="show">Add new Subnet</button>
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
                            'subnet': '<a href="/subnet/get/?id=' + item.id + '">' + item.id + '</a>' +
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
                {"data": "gateway"},
                {"data": "mask"},
                {"data": "domain"},
                {"data": "vlan_id"},
                {"data": "type"},
                {"data": "dns1"},
                {"data": "dns2"},
                {"data": "dhcp_lease_time"},
                {"data": "dhcp_renewal"},
                {"data": "dhcp_rebind_time"}
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
