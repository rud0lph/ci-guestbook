<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?=$title?></title>
</head>

<body>

<h1><?=$heading?></h1>

<?=form_open('guestbook/comment_insert');?>
<p>
    Name:<br>
    <input type="text" name="name"/>
</p>
<p>
    URL:<br>
    <input type="text" name="url"/>
</p>
<p>
	Comment: <br>
	<textarea name="comment" rows="10"></textarea>
</p>
<p>
    <input type="submit"/>
</p>

</form>
<hr>

<?php foreach($query->result() as $row): ?>    
    <h3><?=$row->name?></h3>
    <p><?=$row->url?></p>
    <p><?=$row->comment?></p>
    <hr>
<?php endforeach; ?>
</body>
</html>