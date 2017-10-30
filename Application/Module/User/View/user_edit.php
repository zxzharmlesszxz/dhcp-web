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
   <td>
    <label for="login">Login</label>
   </td>
   <td>
    <input type="text" readonly="true" value="$data->login" name="user[login]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="username">User Name</label>
   </td>
   <td>
    <input type="text" value="$data->username" name="user[username]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="email">Email</label>
   </td>
   <td>
    <input type="email" value="$data->email" name="user[email]"/>
   </td>
  </tr>
  <tr>
   <td colspan="2">
    Please input password if you want to change it only!
   </td>
  </tr>
  <tr>
   <td>
    <label for="password">Password</label>
   </td>
   <td>
    <input type="password" value="" name="user[password]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="repassword">Repite password</label>
   </td>
   <td>
    <input type="password" value="" name="user[repassword]"/>
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>
    <button class="save" data-id="$data->userid" data-type="user">Save</button>
   </td>
  </tr>
 </tbody>
</table>
EOT;
