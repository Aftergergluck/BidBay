<?php
	require 'head_foot.php';
	headerHTML();
?>
<link href="javascriptv2/jquery-ui.css" rel="stylesheet">
<script src="javascriptv2/external/jquery/jquery.js"></script>
<script src="javascriptv2/jquery-ui.js"></script>
<?php
          


        function afficher(){
          $fro = "fromage";
          echo "fromage ";
          echo $fro;
        }

        function afficherdb(){
          $db = "Bidbay";
          $user = "postgres";
          $pass = "postgres";
          $connect = pg_connect("dbname=$db user=$user password=$pass")
          or die("Erreur de connexion");
  
          $query = "SELECT COUNT (*) FROM objet;" ;
          $result = pg_exec($connect, $query);
          $row=pg_fetch_array($result);
          echo $row[0];
        }


?>



<h1 class="Tpage">Bienvenu sur BidBay ! </h1>
	
<div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
  <div class="scroll-content">
    <div class="scroll-content-item">
        <?php 
          afficher();
          afficherdb();
         ?>



    </div>
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
    </div>
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
      
  </div>
  </div>
  </div>
  <div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
    <div class="scroll-bar"></div>
  </div>

<div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
  <div class="scroll-content">
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
      <p>Super ballon de foot !</p>
    </div>
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
    </div>
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
      
  </div>
  </div>
  </div>
  <div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
    <div class="scroll-bar"></div>
  </div>

<div class="scroll-pane ui-widget ui-widget-header ui-corner-all">
  <div class="scroll-content">
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
      <p>Super ballon de foot !</p>
    </div>
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
    </div>
    <div class="scroll-content-item">
      <h3 > Super ballon de 1998 </h3>
      <img src="soccer-ball.png">
      
  </div>
  </div>
  </div>
  <div class="scroll-bar-wrap ui-widget-content ui-corner-bottom">
    <div class="scroll-bar"></div>
  </div>









	<style>
  .scroll-pane { overflow: auto; width: 100%; float:left; }
  .scroll-content { width: 2400px; height: 300px; margin-left: 10px; float: left; }
  .scroll-content-item { width: 350px; height: 200px; float: left; margin: 5px; font-size: 1em; line-height: 30px; text-align: center; }
  .scroll-content-item img { position: relative; left: 0px; width: 150px}
  .scroll-bar-wrap { clear: left; padding: 0 4px 0 2px; margin: 0 -1px -1px -1px; }
  .scroll-bar-wrap .ui-slider { background: none; border:0; height: 1.5em; margin: 0 auto;  }
  .scroll-bar-wrap .ui-handle-helper-parent { position: relative; width: 100%; height: 100%; margin: 0 auto; }
  .scroll-bar-wrap .ui-slider-handle { top:.2em; height: 1em; }
  .scroll-bar-wrap .ui-slider-handle .ui-icon { margin: -8px auto 0; position: relative; top: 50%; }
  </style>

  <script>
  $(function() {
    //variables utilisés 
    var scrollPane = $( ".scroll-pane" ),
      scrollContent = $( ".scroll-content" );
 
    //Slider en lui-même
    var scrollbar = $( ".scroll-bar" ).slider({
      slide: function( event, ui ) {
        if ( scrollContent.width() > scrollPane.width() ) {
          scrollContent.css( "margin-left", Math.round(
            ui.value / 100 * ( scrollPane.width() - scrollContent.width() )
          ) + "px" );
        } else {
          scrollContent.css( "margin-left", 0 );
        }
      }
    });
 
    //Icône pour scroll
    var handleHelper = scrollbar.find( ".ui-slider-handle" )
    .mousedown(function() {
      scrollbar.width( handleHelper.width() );
    })
    .mouseup(function() {
      scrollbar.width( "100%" );
    })
    .append( "<span class='ui-icon ui-icon-grip-dotted-vertical'></span>" )
    .wrap( "<div class='ui-handle-helper-parent'></div>" ).parent();
 
    //overflow --> hidden 
    scrollPane.css( "overflow", "hidden" );
 
    //Taille de la barre en fonction de la taille totale
    function sizeScrollbar() {
      var remainder = scrollContent.width() - scrollPane.width();
      var proportion = remainder / scrollContent.width();
      var handleSize = scrollPane.width() - ( proportion * scrollPane.width() );
      scrollbar.find( ".ui-slider-handle" ).css({
        width: handleSize,
        "margin-left": -handleSize / 2
      });
      handleHelper.width( "" ).width( scrollbar.width() - handleSize );
    }

     
    //reset slider value based on scroll content position
    function resetValue() {
      var remainder = scrollPane.width() - scrollContent.width();
      var leftVal = scrollContent.css( "margin-left" ) === "auto" ? 0 :
        parseInt( scrollContent.css( "margin-left" ) );
      var percentage = Math.round( leftVal / remainder * 100 );
      scrollbar.slider( "value", percentage );
    }
 

    //fênetre s'aggrandi et la barre à 100% --> révèle la suite
    function reflowContent() {
        var showing = scrollContent.width() + parseInt( scrollContent.css( "margin-left" ), 10 );
        var gap = scrollPane.width() - showing;
        if ( gap > 0 ) {
          scrollContent.css( "margin-left", parseInt( scrollContent.css( "margin-left" ), 10 ) + gap );
        }
    }
 
    //modifis sur le changement de taille de fenêtre
    $( window ).resize(function() {
      resetValue();
      sizeScrollbar();
      reflowContent();
    });
    //init taille scrollbar
    setTimeout( sizeScrollbar, 10 );
  });
  </script>











<?php
	
	footerHTML();
?>