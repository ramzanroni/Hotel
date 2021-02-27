<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Custom Navbar Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Custom Navbar <small>A template, demonstrating a customized navbar element</small></h1>
</div>

<!-- Custom Navbar - START -->
<div class="container mix">
    <nav class="navbar navbar-custom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">customized navbar</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i>Notifications <span class="badge">0</span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="fa fa-fw fa-tag"></i><span class="badge">label text</span> Item </a></li>
                            <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i><span class="badge"> label text</span> Item </a></li>
                            <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i><span class="badge"> label text</span> Item </a></li>
                            <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i><span class="badge"> label text</span> Item </a></li>
                        </ul>
                    </li>
                    <li class="active"><a href="#">Navigation Item <span class="sr-only"></span></a></li>
                    <li class="active"><a href="#">Navigation Item <span class="sr-only"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="fa fa-adjust"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-info-circle"></i> Personal Information</a></li>
                            <li><a href="#"><i class="fa fa-inbox"></i> Inbox</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-key"></i> Log Out</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<style>
.mix {
    min-height:370px;
}

nav.navbar-custom { 
 background: #488cf6; 
 border-color: #488cf6; 
 box-shadow: 0 0 12px 0 #ccc; 
}
nav.navbar-custom a { 
    color: #dfe0ed; 
}
nav.navbar-custom ul.navbar-nav a { 
    color: #dfe0ed; 
    border-style: solid; 
    border-width: 0 0 2px 0; 
    border-color: #fff; 
}
    
nav.navbar-custom ul.navbar-nav a:hover,
nav.navbar-custom ul.navbar-nav a:visited,
nav.navbar-custom ul.navbar-nav a:focus,
nav.navbar-custom ul.navbar-nav a:active { 
    background: #5CB85C; 
}
nav.navbar-custom ul.navbar-nav a:hover { 
    border-color: #5CB85C; 
}
nav.navbar-custom li.divider { 
    background: #5CB85C; 
}
nav.navbar-custom button.navbar-toggle { 
    background: #5CB85C; 
    border-radius: 2px; 
}
nav.navbar-custom button.navbar-toggle:hover { 
    background: #999; 
}
nav.navbar-custom button.navbar-toggle > span.icon-bar { 
    background: #fff; 
}
nav.navbar-custom ul.dropdown-menu { 
    border: 0; 
    background: #fff; 
    border-radius: 4px; 
    margin: 4px 0; 
    border: 2px solid #5CB85C;
    box-shadow: 0 0 4px 0 #ccc; 
}
nav.navbar-custom ul.dropdown-menu > li > a { 
    color: black; 
}
nav.navbar-custom ul.dropdown-menu > li > a:hover { 
    background: #5CB85C; color: #fff; 
}
nav.navbar-custom span.badge { 
    background: #5CB85C; 
    font-weight: normal; 
    font-size: 11px;
     margin: 0 4px; 
}
nav.navbar-custom span.badge.new { 
    background: rgba(255, 0, 0, 0.8); color: #fff; 
}

</style>

<!-- Custom Navbar - END -->

</div>

</body>
</html>