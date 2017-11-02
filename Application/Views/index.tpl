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
</head>
<body>
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
                    </thead>
                    <tfoot>
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
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $("#search_results").slideUp();
        $("#search_button").click(function(e){
            e.preventDefault();
            ajax_search();
        });
        $("#search_term").keyup(function(e){
            e.preventDefault();
            ajax_search();
        });

    });
    function ajax_search(){
        $("#search_results").show();
        var search_val=$("#search_term").val();
        $.post("./find.php", {search_term : search_val}, function(data){
            if (data.length>0){
                $("#search_results").html(data);
            }
        })
    }
</script>
</body>
</html>
