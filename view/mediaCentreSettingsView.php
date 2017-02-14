<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <title>PiPlay Media Settings</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/specific.css">
    <link rel="stylesheet" href="/css/specific_settings.css">
</head>
    <body>
        <header>
            <ul id="dropdown_user" class="dropdown-content">
                <li><a href="/controller/login_logout.php?logout=true"><i class="material-icons left">exit_to_app</i>Logout</a></li>
            </ul>
            <ul id="dropdown_settings" class="dropdown-content">
                <li><a href="/MediaCentre/settings/users"><i class="material-icons left">group</i>Users</a></li>
                <li><a href="/MediaCentre/settings/media"><i class="material-icons left">music_video</i>Media</a></li>
            </ul>
            <nav class="indigo" role="navigation">
                <div class="nav-wrapper container">
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons black-text">menu</i></a>

                    <a class="brand-logo" href="/MediaCentre">PiPlay</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="/MediaCentre/music"><i class="material-icons left">music_note</i>Music</a></li>
                        <li><a href="/MediaCentre/video"><i class="material-icons left">videocam</i>Video</a></li>
                        <li class="active">
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
                <!--Mobile Nav-->
                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <div class="userView">
                            <div class="background">
                                <img width="100%" src="/images/bg_sidenav_userview.jpg">
                            </div>
                            <!-- TODO: add userinfo to mobile view-->
                            <a href="#!user"><img width="64" height="64" src="/images/person.png"></a>
                            <a href="#!name"><span class="white-text name"><?php echo $_SESSION["user"]?></span></a>
                            <a href="#!email"><span class="white-text email"><?//php echo $_SESSION["userType"] ?></span></a>
                        </div>
                    </li>
                    <li><a href="/controller/login_logout.php?logout=true"><i class="material-icons left">exit_to_app</i>Logout</a></li>
                    <li><a href="/MediaCentre/music"><i class="material-icons left">music_note</i>Music</a></li>
                    <li><a href="/MediaCentre/video"><i class="material-icons left">videocam</i>Video</a></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li><a class="collapsible-header waves-effect waves-block active">
                                    <span>Settings</span>
                                    <i class="material-icons left bold">settings</i>
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
            <!--Add path-->
            <div class="container top-space">
                    <form action="/MediaCentre/control/control_paths.php" method="post">

                        <div class="input-field">
                            <input id="icon_telephone" type="text" class="validate" name="addpath">
                            <label for="icon_telephone">Absolute Path to media</label>
                        </div>

                        <input type="checkbox" name="recursive" id="recursive"/>
                        <label for="recursive">Include subdirectories</label>

                        <i class="btn waves-effect waves-light waves-input-wrapper amber accent-3 right" style="padding: 0;">
                            <input style="width: inherit; height: inherit; padding: 0 30px;" class="waves-button-input black-text" type="submit" value="Add">
                        </i>
                    </form>
            </div>
        </header>

        <main>
            <div class="fake-table">
                <div class="row container fake-table-head">
                    <div class="col s1"></div>
                    <div class="col s11">Path</div>
                </div>

                <?php
                foreach ($media_paths as $i => $name):?>
                    <div class="row container">
                        <a href="/MediaCentre/control/control_paths.php?removepath=<?php echo $i?>"><i class="col s1 material-icons center remove small grey-text">delete</i></a>
                        <div class="col s11 line30px"><?php echo $name?></div>
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

        <?php require_once "components/footer.php" ?>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/js/materialize.js"></script>
        <script src="/js/script.js"></script>
    </body>
</html>