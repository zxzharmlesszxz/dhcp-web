<h1>Admins</h1>
<p class="form hide">
<input type="text" value="" placeholder="login" name="admin[login]"/>
<input type="password" value="" placeholder="password" name="admin[password]"/>
<input type="text" value="" placeholder="username" name="admin[username]"/>
<input type="text" value="" placeholder="email" name="admin[email]"/>
 <button class="create" title="Create" alt="Create" data-type="admin">Create</button>
</p>
<p><button alt="Add new Admin" title="Add new Admin" id="show">Add new Admin</button></p>
<p>
<table id='table' class='display'>
<thead>
 <tr>
  <th>Login</th>
  <th>Username</th>
  <th>Email</th>
  <th>Status</th>
 </tr>
</thead>
<tfoot>
 <tr>
  <th>Login</th>
  <th>Username</th>
  <th>Email</th>
  <th>Status</th>
 </tr>
</tfoot>
<tbody>
<?php

 foreach($data->keys() as $item){
  $row = $data->getItem($item);
  echo <<<EOT
  <tr>
   <td>$row->login
    <span class="actions">
     <button class="delete" alt="Delete" title="Delete" data-id="$row->adminid" data-type="admin"></button>
     <button class="edit" alt="Edit" title="Edit" onclick="location.href='/admins/edit/?adminid=$row->adminid'"></button>
    </span>
   </td>
   <td>$row->username</td>
   <td>$row->email</td>
   <td><input class="status" type="checkbox" data-id="$row->adminid" value="$row->status" data-type="admin" /></td>
  </tr>
EOT;
 }
 
?>
 </tbody>
</table>
</p>
