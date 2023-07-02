<div class="container bg-light col-md-5"><br>
<h3><?=$title?></h3><hr>
<form action="<?=base_url()?>admin/save" method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?=$admin['username']?>" class="form-control" id="username" placeholder="Enter username">
    <input type="hidden" name="id_admin" value="<?=$admin['id_admin']?>">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" value="<?=$admin['password']?>" class="form-control" id="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-outline-success btn-block">Submit</button><br>
</form>
</div>