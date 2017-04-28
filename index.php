<?php
require_once("/inc/header.php");
?>
    <div id="site_content">

        <div id="content">
            <h1 class='center'>Bun venit!</h1>
            <br/>
             <div>

                <div style="width:200px;margin:2px;float:left;">
                    <div method="post" style="width:300px;margin:0 auto;" enctype="multipart/form-data">
                        <label for="members">Membri : 30</label>
                        <br/>
                        <label for="members">Intrebari : 20</label>
                        <br/>
                        <label for="members">Raspunsuri : 14</label>
                        <br/>
                    </div>
                </div>

                <div>

                    <div style="width:500px;margin:2px;float:left;">
                        <div method="post" style="width:300px;margin:0 auto;" enctype="multipart/form-data">
                            <label for="members">Ultimul membru inregistrat : florinel21</label>
                            <br/>
                            <label for="members">Ultima intrebare : #215b</label>
                            <br/>
                            <label for="members">Ultimul raspuns : #438c</label>
                            <br/>
                            <br/>
                            <a href="login.php"><input type="submit" value="Login" style="width:150px"></a>
                        </div>
                    </div>

                </div>

            </div>

         </div>
      </div>
<?
require_once("footer.php");
?>
