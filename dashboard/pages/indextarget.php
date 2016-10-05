 <style>
  .container {
    width: 600px;
    margin: 100px auto;
    text-align: center;
  }

  .gauge {
    width: 250px;
    height: 250px;
    display: inline-block;
  }

  </style>
  
  <div id="gg1" class="gauge"></div>
  <script src="../js/raphael-2.1.4.min.js"></script>
  <script src="../js/justgage.js"></script>
  <script>
  document.addEventListener("DOMContentLoaded", function(event) {

    var dflt = {
      min: 0,
      max: <?php echo $trest["target_money"] ;?>,
      donut: true,
      gaugeWidthScale: 0.6,
      counter: true,
      hideInnerShadow: true
    }

    var gg1 = new JustGage({
      id: 'gg1',
      value: <?php echo $tresult["sumcost"] ;?>,
      //title: 'Money spent on budget target',
      defaults: dflt
    });
    

  });
  </script>
  <br/>
  <b>Your budget limit is : $ <?php echo $trest["target_money"];?>, spent $ <?php echo $tresult["sumcost"] ;?>.</b><a href="targets.php">(details)</a>
  