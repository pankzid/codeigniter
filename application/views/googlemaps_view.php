<!DOCTYPE html">
<meta http-equiv="Content-type"
content="text/html; charset=utf-8" />
<html>
<head>
  <!--Render all the map JS provided by rendering controller-->
  <script src = http://code.jquery.com/jquery-latest.js ></script>
  <?php echo $map['js']; ?>
</head>
<body>
  <H3>CodeIgniter Powered CI Google Maps Library : <H3>
    <HR/><ul>
    <li><?php echo anchor("index.php/gmaps", '<B>See All Locations</B>' ); ?>
  </li>
  <?php
  $i=0;
  foreach ($locations as $location ) {
  // Show to the user all the possible Zoom Ins defined places by
  //the controller, so that user may zoom in by issuing the
  // anchor.
    $action = $actions[$i];
    $i++; ?>
    <li>
      <?php echo anchor("gmaps/$action", "Zoom-In to ".$location ) ?>
    </li>
  <?php } ?>
</ul>
<HR></HR>
<?php echo $map['html']; ?>
</body>
</html>
