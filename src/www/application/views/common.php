<?php
function menu(){
 ?>
<div id="menu">
  <div class="menu">
    <a href="#">Data</a> |&nbsp; 
    <div class="submenu">
      <a href="/index.php/cw">Añadir</a><br/>
      <a href="/index.php/stats">Stats</a><br/>
      <a href="/index.php/wiki">Vista wiki</a><br/>
      <a href="/index.php/view">Vista tabla</a>
    </div>
  </div>
  <div class="menu">
    <a href="#">Dev</a>
    <div class="submenu">
      <a href="http://www.reprap.org/wiki/Clone_Wars:_El_imperio_de_los_clones/es" target="_blank">Raw</a><br/>
      <a href="https://github.com/algspd/CWData" target="_blank">GitHub</a><br/>
      <a href="malto://info@maytheclonebewithyou.com">Mail</a>
    </div>
  </div>
</div>

<?php
}
?>

<?php
function head(){
?>
<div id="cabecera">
<a href="/"><img src="/logo.png" alt="logo" style="width:200px;margin-left:28px;"/></a><br/>
<a style="font-size:17px;text-decoration:none;" href="malto://info@maytheclonebewithyou.com">info@mayTheCloneBeWithYou.com</a>
<?php menu(); ?>
</div>
<?php
}
?>


