<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <title>PiPlay Media Centre</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link rel="stylesheet" href="/css/specific.css">
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
            <nav class="light-blue lighten-1" role="navigation">
                <div class="nav-wrapper container">
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons black-text">menu</i></a>

                    <a class="brand-logo" href="/MediaCentre">PiPlay</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="/MediaCentre/music"><i class="material-icons left">music_note</i>Music</a></li>
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
                    <li class="active"><a href="/MediaCentre/music"><i class="material-icons left">music_note</i>Music</a></li>
                    <li><a href="/MediaCentre/video"><i class="material-icons left">videocam</i>Video</a></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li><a class="collapsible-header waves-effect waves-orange">
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
        </header>

        <main>
            <!-- TODO: content of landing page-->
        </main>

        <?php require_once "components/footer.php" ?>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../js/materialize.js"></script>
        <script src="../js/script.js"></script>
    </body>
</html>