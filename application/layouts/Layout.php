<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
    <title><?php echo $title ;?> - PHPNano Framework by www.katropine.com</title>
    <link href="<?php echo $Url->getBase();?>/css/nano.css" type="text/css" media="screen" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
    <img src="<?php echo $Url->getBase();?>/graphics/phpnano.gif" alt="PHPNano"/><br>
------------------------------------------------------------------------------------------------------------------------------------------------  <br>
<?php $View->render(); ?>
------------------------------------------------------------------------------------------------------------------------------------------------  <br>
<br>
    Info:<br>
    to build URL between pages:<br>
    href="/controller/action/id/22/user/1"<br><br>
    to obtain value in controller:<br>
    $this->_request->id;<br>
    $this->_request->user;<br><br>

    Pass variable to View:<br>
    $this->View->id = $this->_request->get->id;<br>
    GET: [$this->_request->get->varname]<br>
    POST: [$this->_request->post->varname]<br>
    --> in View file just call <br>
    echo $id;
</div>
</body>
</html>
