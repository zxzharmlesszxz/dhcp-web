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
  <td>
   <label for="login">Login</label></td><td><input type="text" readonly="true" value="$data->login" name="user[login]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="username">User Name</label></td><td><input type="text" value="$data->username" name="user[username]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="email">Email</label></td><td><input type="email" value="$data->email" name="user[email]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="homedir">Homedir</label></td><td><input type="text" value="$data->homedir" name="user[homedir]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="uid">Uid</label></td><td><input type="number" value="$data->uid" name="user[uid]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="gid">Gid</label></td><td><input type="number" value="$data->gid" name="user[gid]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="shell">Shell</label></td><td><input type="text" value="$data->shell" name="user[shell]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="status">Status</label></td><td><input class="status" type="checkbox" value="$data->status" name="user[status]" />
  </td>
 </tr>
 <tr>
  <td colspan="2">
   Please input password if you want to change it only!
  </td>
 </tr>
 <tr>
  <td>
   <label for="password">Password</label></td><td><input type="password" value="" name="user[password]"/>
  </td>
 </tr>
 <tr>
  <td>
   <label for="repassword">Repite password</label></td><td><input type="password" value="" name="user[repassword]"/>
  </td>
 </tr>
 <tr>
  <td>
   </td><td><button class="save" data-id="$data->userid" data-type="user">Save</button>
  </td>
 </tr>
 </tbody>
</table>
EOT;
