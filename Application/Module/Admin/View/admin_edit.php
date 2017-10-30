<?php

echo <<<EOT
<h1>Admin</h1>
<p>
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
    <input type="text" readonly="true" value="$data->login" name="admins[login]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="username">User Name</label>
   </td>
   <td>
    <input type="text" value="$data->username" name="admins[username]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="email">Email</label>
   </td>
   <td>
    <input type="email" value="$data->email" name="admins[email]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="password">Password(Please input password if you want to change it.)</label>
   </td>
   <td>
    <input type="password" value="" name="admins[password]"/>
   </td>
  </tr>
  <tr>
   <td>
    <label for="repassword">Repite password</label>
   </td>
   <td>
    <input type="password" value="" name="admins[repassword]"/>
   </td>
  </tr>
  <tr>
   <td>
   </td>
   <td>
    <button class="save" data-id="$data->adminid" data-type="admins">Save</button>
   </td>
  </tr>
 </tbody>
</table>
</p>
EOT;
