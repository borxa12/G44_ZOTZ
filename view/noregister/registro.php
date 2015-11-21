<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>

<h1>Registro</h1>
<form id="registroestablecimiento" method="post">
    <div id=templatemo_form>
        <div>
            <label for="loginjuradoprofesional">Login</label>
            <input type="text" id="loginjuradoprofesional" />
            <br></br>
        </div>
        <div>
            <label for="emailjuradoprofesional">Email</label>
            <input type="text" id="emailjuradoprofesional" />
            <br></br>
        </div>
        <div>
            <label for="passwordjuradoprofesional">Password</label>
            <input type="password" id="passwordjuradoprofesional" />
            <br></br>
        </div>
    </div>
    <button type="submit" class="btn btn-default button">Darse de alta</button>
</form>

<div class="cleaner"></div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>
