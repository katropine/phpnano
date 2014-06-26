
<script>
    $(document).ready(function(){
        $("#ajaxevent").click(function(){
            $.ajax({
                url: "<?php echo $Url->get(array('controller'=>'nano', 'action'=>'testajax'));?>",
                success: function(data){
                    $("#ajaxtest").html(data.data);
                }
            });
        });
    });
</script>
<h1><?php echo $message; ?></h1>
<h2><?php echo $model; ?></h2>
Test GET:<br>
<a href="<?php echo $Url->get(array('controller'=>'nano', 'action'=>'index','var1'=>'100','var2'=>'200'));?>">Nano URL Relative</a><br>
<a href="<?php echo $Url->getAbsolute(array('controller'=>'nano', 'action'=>'index','var1'=>'100','var2'=>'200'));?>">Nano URL Absolute</a><br>
<br>
Ajax<br>
<a id="ajaxevent" href="#">Nano Test Ajax</a><div id="ajaxtest"></div><br>
<br>
Test POST:<br>
<table cellpadding="10">
    <tr>
        <td>

            <form action="<?php echo $Url->get(array('controller'=>'nano', 'action'=>'index'));?>" method="POST">
                var3: <input type="text" name="var3"><br>
                var4: <input type="text" name="var4">
                <input type="submit" value="Submit">
            </form>


        </td>
        <td><?php echo $partialexample;?></td>
    </tr>
</table>

<h4><?php echo $description;?></h4>