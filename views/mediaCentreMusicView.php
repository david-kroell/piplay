<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <title>PiPlay Music</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/specific.css">
    <!-- TODO: add vol up/down and next/prev buttons-->
    <!-- TODO: shuffle button-->
</head>
    <body>
    <header>
        <ul id="dropdown_user" class="dropdown-content">
            <li><a href="/controllers/login_logout.php?logout=true"><i class="material-icons left">exit_to_app</i>Logout</a></li>
        </ul>
        <ul id="dropdown_settings" class="dropdown-content">
            <li><a href="/MediaCentre/settings/users"><i class="material-icons left">group</i>Users</a></li>
            <li><a href="/MediaCentre/settings/media"><i class="material-icons left">music_video</i>Media</a></li>
        </ul>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons black-text">menu</i></a>

                <a class="brand-logo" href="/MediaCentre">PiPlay</a>
                <ul class="right hide-on-med-and-down">
                    <li class="active"><a href="/MediaCentre/music"><i class="material-icons left">music_note</i>Music</a></li>
                    <li><a href="/MediaCentre/video"><i class="material-icons left">videocam</i>Video</a></li>
                    <li>
                        <a class="dropdown-button" data-activates="dropdown_settings">
                            <i class="material-icons right">arrow_drop_down</i>
                            <i class="material-icons left">settings</i>Settings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-button" data-activates="dropdown_user"><?php echo $_SESSION["user"]?>
                            <i class="material-icons right">arrow_drop_down</i>
                            <i class="material-icons left">person</i>
                        </a>
                    </li>
                </ul>
            </div>

            <ul id="nav-mobile" class="side-nav">
                <li>
                    <div class="userView">
                        <div class="background">
                            <img width="100%" src="../images/bg_sidenav_userview.jpg">
                        </div>
                        <!-- TODO: add userinfo to mobile view-->
                        <a href="#!user"><img width="64" height="64" src="../images/person.png"></a>
                        <a href="#!name"><span class="white-text name"><?php echo $_SESSION["user"]?></span></a>
                        <a href="#!email"><span class="white-text email"><?//php echo $_SESSION["userType"] ?></span></a>
                    </div>
                </li>
                <li><a href="/controllers/login_logout.php?logout=true"><i class="material-icons left">exit_to_app</i>Logout</a></li>
                <li class="active"><a href="/MediaCentre/music"><i class="material-icons left">music_note</i>Music</a></li>
                <li><a href="/MediaCentre/video"><i class="material-icons left">videocam</i>Video</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect waves-light">
                                <span class="bold">Settings</span>
                                <i class="material-icons left">settings</i>
                            </a>
                            <div class="collapsible-body" style="display: block;">
                                <ul>
                                    <li><a href="/MediaCentre/settings/users"><i class="material-icons left">group</i>Users</a></li>
                                    <li><a href="/MediaCentre/settings/media"><i class="material-icons left">music_video</i>Media</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <nav class="container color white">
            <div class="nav-wrapper">
                <form>
                    <div class="input-field" id="top-search">
                        <input id="search" type="search" required onkeyup="filter_table(this.value)">
                        <label for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons" onclick="document.getElementById('search').value = ''">close</i>
                    </div>
                </form>
            </div>
        </nav>
    </header>

<!-- this.childNodes[3].innerHTML -->
    <main>
        <div id="myMusic" class="fake-table">
            <div class="row container fake-table-head">
                <div class="col s2">Track Number</div>
                <div class="col s10">Name</div>
            </div>

            <?php
            //build table
            $counter = 1;
            //$media[0]: paths of directories
            //$media[1]: paths of files
            foreach ($media[1] as $name => $path):?>
                <div class="row container waves-effect waves-block" onclick="play_song(this.childNodes[3].innerHTML)">
                    <div class="col s2"><?php echo $counter; $counter++?></div>
                    <div class="col s10"><?php echo $name?></div>
                </div>
            <?php endforeach;?>
        </div>
        <!-- Control bar-->
        <div class="stick-to-bottom" id="controlBar">
            <div class="horizontal">
                <a class="btn-floating btn-large btn-flat grey lighten-2"><i class="material-icons black-text">skip_previous</i></a>
                <a class="btn-floating btn-large btn-flat grey lighten-2"><i class="material-icons black-text">stop</i></a>
                <a class="btn-floating btn-large btn-flat grey lighten-2"><i class="material-icons black-text">skip_next</i></a>
                <a class="btn-floating btn-large btn-flat grey lighten-2"><i class="material-icons black-text">shuffle</i></a>
            </div>
        </div>
    </main>


    <footer class="page-footer light-blue darken-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Pi Play,</h5>
                    <p class="grey-text text-lighten-3">a simple and easy to install website to play songs via your RapsberryPI.</p>
                    <p class="grey-text text-lighten-3">And any other device which runs Linux and has OMXplayer installed.</p>
                </div>
                <div class="col l6 s12">
                    <h5 class="white-text">Links</h5>
                    <ul class="white-text">
                        <li>View this project on <a class="grey-text text-lighten-1" href="https://github.com/david-kroell/piplay">GitHub</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made with &#x2661;, PHP and JavaScript
                <span class="right">Designed with <a class="grey-text text-lighten-1" href="http://materializecss.com">Materialize</a></span>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.js"></script>
    <script src="../js/script.js"></script>
    </body>
</html>