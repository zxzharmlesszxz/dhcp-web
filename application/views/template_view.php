<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <title>ProAUT - ProFTP Administrate Users Tool</title>
  <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.min.css" />
  <link rel="stylesheet/less" type="text/css" href="/less/style.less">
  <script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/js/html5shiv.js"></script>
  <script type="text/javascript" src="/js/less.js"></script>
  <script type="text/javascript" src="/js/proaut.js"></script>
 </head>
 <body>
  <header id="header">
   <div id="logo">
    <a href="/">ProFTP Administrate Users Tool</a>
   </div>
   <nav id="menu">
    <menu>
     <li><a href="/">Main</a></li>
     <li><a href="/admins">Admins</a></li>
     <li><a href="/groups">Groups</a></li>
     <li><a href="/users">Users</a></li>
     <li><a href="/quotalimits">Quota Limits</a></li>
     <li><a href="/quotatallies">Quota tallies</a></li>
     <li><a href="/contacts">Contacts</a></li>
    </menu>
    <br class="clearfix" />
   </nav>
  </header>
  <div id="wrapper">
   <div id="page">
    <div id="content">
     <div class="box">
      <?php if(!empty($content_view)) include 'application/views/'.$content_view; ?>
     </div>
     <br class="clearfix" />
    </div>
    <br class="clearfix" />
   </div>
   <div id="page-bottom">
    <div id="page-bottom-sidebar">
     <h3>Contacts</h3>
     <ul class="list">
      <li class="last">email: zxzharmlesszxz@gmail.com</li>
     </ul>
    </div>
    <div id="page-bottom-content">
     <h3>About</h3>
     <p>
     ProAUT - tool for managment proftp users stored in MySQL database.
     </p>
    </div>
    <br class="clearfix" />
   </div>
  </div>
  <footer id="footer">
   <a href="https://github.com/zxzharmlesszxz/ProAUT">ProAUT</a> &copy; 2015-<?php echo date("Y"); ?>
  </footer>
 </body>
</html>
