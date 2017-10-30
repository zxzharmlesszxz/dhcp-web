<?php

echo <<<EOT
<h1>User</h1>
<table id='table' class='display'>
 <thead>
  <tr>
   <th>Param</th>
   <th>Value</th>
  </tr>
 </thead>
 <tfoot>
  <tr>
   <th>Param</th>
   <th>Value</th>
  </tr>
 </tfoot>
 <tbody>
  <tr>
   <td>Login</td>
   <td>$data->login</td>
  </tr>
  <tr>
   <td>User Name</td>
   <td>$data->username</td>
  </tr>
  <tr>
   <td>Email</td>
   <td>$data->email</td>
  </tr>
 </tbody>
</table>
<p>
 <button alt="Edit" title="Edit" onclick="location.href='/users/edit/?userid=$data->userid'">Edit this user</button>
</p>
EOT;
