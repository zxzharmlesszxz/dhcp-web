<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css">
    <title>%title%</title>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
</head>
<body>
<script type="text/javascript">
    $(document).ready(function () {
        alert("fack");
        $('#table').DataTable({
            "processing": true,
            "ajax": {
                "url": "/subnets",
                "dataSrc": function (json) {
                    var return_data = [];
                    for (var i = 0; i < json.length; i++) {
                        var item = json.[i];
                        return_data.push(item)
                    }
                    return return_data;
                }
            }
        });
    });
</script>
<header id="header">
    <div id="logo">
        <a href="/">%title%</a>
    </div>
    <nav id="menu">
        <menu>
            %menu%
        </menu>
        <br class="clearfix">
    </nav>
</header>
<div id="wrapper">
    <div id="page">
        <div id="content">
            <div class="box">
                <table id='table' class='display'>
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>dhcp_lease_time</th>
                        <th>dhcp_renewal</th>
                        <th>dhcp_rebind_time</th>
                        <th>mask</th>
                        <th>gateway</th>
                        <th>dns1</th>
                        <th>dns2</th>
                        <th>domain</th>
                        <th>vlan_id</th>
                        <th>type</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>dhcp_lease_time</th>
                        <th>dhcp_renewal</th>
                        <th>dhcp_rebind_time</th>
                        <th>mask</th>
                        <th>gateway</th>
                        <th>dns1</th>
                        <th>dns2</th>
                        <th>domain</th>
                        <th>vlan_id</th>
                        <th>type</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <br class="clearfix">
        </div>
        <br class="clearfix">
    </div>
</div>
<footer id="footer">
    <a href="https://github.com/zxzharmlesszxz/">zxzharmlesszxz</a>
    - %copyright% &copy; 2015-%date%
</footer>
</body>
</html>
