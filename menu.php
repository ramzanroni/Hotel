<!------CSS Link--------------->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!--Google -Fonts-->
<link href='https://fonts.googleapis.com/css?family=Sintony:400,700&subset=latin-ext' rel='stylesheet' type='text/css'>

<!--Font-awsome-->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<div id="main " style="z-index: 999;">
  <div class="container">
    
    <nav>
      <div class="nav-fostrap">
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="javascript:void(0)">Web Design<span class="arrow-down"></span></a>
            <ul class="dropdown">
              <li><a href="">HTML</a></li>
              <li><a href="">CSS</a></li>
              <li><a href="">Javascript</a></li>
              <li><a href="">JQuery</a></li>
            </ul>
          </li>
          <li><a href="javascript:void(0)" >Blogger<span class="arrow-down"></span></a>
            <ul class="dropdown">
              <li><a href="">Widget</a></li>
              <li><a href="">Tips</a></li>
            </ul>
          </li>
          <li><a href="javascript:void(0)" >SEO<span class="arrow-down"></span></a>
            <ul class="dropdown">
              <li><a href="">Tools</a></li>
              <li><a href="">Backlink</a></li>
            </ul>
          </li>
          <li><a href="">Google Adsense</a></li>
          <li><a href="">Advertising</a></li>
          <li><a href="">Business</a></li>
        </ul>
      </div>
      <div class="nav-bg-fostrap">
        <div class="navbar-fostrap"> <span></span> <span></span> <span></span> </div>
        <a href="" class="title-mobile">Fostrap</a>
      </div>
    </nav>
    <div class='content'>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>

$(document).ready(function(){
    $('.navbar-fostrap').click(function(){
      $('.nav-fostrap').toggleClass('visible');
      $('body').toggleClass('cover-bg');
    });
  });
</script>