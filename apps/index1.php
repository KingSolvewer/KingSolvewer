<?php


var_dump($_POST);
var_dump($_REQUEST);
$username = 'wsw';
$email = '1001@qq.com';
$url = 'index.php?"usern\'ame"=' . $username . '&email=' . $email;
$url_entity = htmlspecialchars($url);
var_dump($url_entity);
echo $url_entity, '<br/>';
print $url_entity;
echo '<br/>';
echo htmlspecialchars_decode($url_entity), '<br/>';
echo $username, 'wsw';
?>

<!--<form action="index1.php" method="post">-->
<!--    Name:&nbsp;&nbsp;<input type="text" name="username"/><br/>-->
<!--    Email:&nbsp;&nbsp;<input type="text" name="email"/><br/>-->
<!--    <input type="submit" value="Submit Me!"/>-->
<!--</form>-->

<form action="index1.php" method="post">
    Name:&nbsp;&nbsp;<input type="text" name="username"/><br/>
    Email:&nbsp;&nbsp;<input type="text" name="email"/><br/>
    Beer: <br />
    <select multiple name="beer[]">
        <option value="warthog">Warthog</option>
        <option value="guinness">Guinness</option>
        <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
    </select><br />
<!--    <input type="submit" value="Submit Me!"/>-->
    <input type="image" src="image.gif" name="sub" />
</form>





















