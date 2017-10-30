<?php

echo <<<EOT
<h1>User</h1>
<table id='1table' class='display'>
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
  <td>Login</td><td>$data->login</td>
 </tr>
 <tr>
  <td>User Name</td><td>$data->username</td>
 </tr>
 <tr>
  <td>Email</td><td>$data->email</td>
 </tr>
 <tr>
  <td>Homedir</td><td>$data->homedir</td>
 </tr>
 <tr>
  <td>Uid</td><td>$data->uid</td>
 </tr>
 <tr>
  <td>Gid</td><td>$data->gid</td>
 </tr>
 <tr>
  <td>Shell</td><td>$data->shell</td>
 </tr>
 <tr>
  <td>Status</td><td>$data->status</td>
 </tr>
 <tr>
  <td>Quota</td><td>$data->quotalimit</td>
 </tr>
 </tbody>
</table>
<p><button alt="Edit" title="Edit" onclick="location.href='/users/edit/?userid=$data->userid'">Edit this user</button></p>
EOT;
