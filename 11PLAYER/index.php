<!DOCTYPE html>
<html>
    <head>
        <title>Sky4K_Player_(ORIGINAL)</title>
        <meta charset="UTF-8" />
        <!--<script src="https://unpkg.com/artplayer/dist/artplayer.js"></script>-->
        <script src="https://cdn.jsdelivr.net/gh/a07119063/blck12qedwwwwad@main/artplayer.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/hls.js@1.1.1/dist/hls.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/dashjs@4.1.0/dist/dash.all.debug.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/shaka-player@3.2.1/dist/shaka-player.compiled.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flv.js@1.6.2/dist/flv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/webtorrent@1.5.8/webtorrent.min.js"></script>
        <meta name='viewport' content='width=device-width, initial-scale=1.0' /> 
        <meta name="referrer" content="no-referrer" />
        <style type="text/css">
        html,body{width:100%;height:100%; padding:0; margin:0;}
          .artplayer-app {
              width:100%;
              height:100%;
              
          }
          
        </style>
        <?php
    if (strpos($_GET['url'])) {
    }
    ?>
    </head>
    <body bgcolor='black' style='margin:0' oncontextmenu='return false' onkeydown='return false' onmousedown='return false' style='position:absolute;z-index: -1;top: 0;left: 0;width: 100%; height: 100%;object-fit: cover;'>
    <body>
        <div class="artplayer-app"></div>
        <script src="https://cdn.jsdelivr.net/gh/a07119063/blck12qedwwwwad@main/artplayer.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/hls.js@1.1.1/dist/hls.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/dashjs@4.1.0/dist/dash.all.debug.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/shaka-player@3.2.1/dist/shaka-player.compiled.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flv.js@1.6.2/dist/flv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/webtorrent@1.5.8/webtorrent.min.js"></script>
        <script>
        var img = 'https://img.sky4k.top/D/logo.jpg';
            var art = new Artplayer({
    container: '.artplayer-app',
    autoplay: true,
    url: "<?php echo ($_GET['url']); ?>",
    volume: 0.5,
    isLive: false,
    muted: false,
    autoplay: false,
    pip: true,
    autoSize: true,
    autoMini: true,
    screenshot: false,
    setting: true,
    loop: true,
    flip: true,
    playbackRate: true,
    aspectRatio: true,
    fullscreen: true,
    fullscreenWeb: false,
    subtitleOffset: true,
    miniProgressBar: true,
    mutex: true,
    backdrop: true,
    playsInline: true,
    theme: '#23ade5',
    lang: navigator.language.toLowerCase(),
    whitelist: ['*'],
    settings: [
        {
            width: 200,
            html: 'Custom Setting',
            tooltip: 'Click This',
            icon: '<img width="22" heigth="22" src="https://player.sky4k.top/p/state.svg">',
            selector: [
                {
                    default: true,
                    html: 'Setting 01',
                },
                {
                    html: 'Setting 02',
                },
            ],
            onSelect: function (item) {
                console.info('You clicked on the custom setting', item.html);
                return item.html;
            },
        },
    ],
    layers: [
        {
            index: 1,
            name: 'potser',
            disable: false,
            html: `<img style="height：140px;width: 150px" src="${img}">`,
            style: {
                position: 'absolute',
                top: '18px',
                right: '25px',
                opacity: '.9',
            },
            
        },
    ],
    quality: [
        {
            default: true,
            html: 'AUTO-1',
            url: "<?php echo ($_GET['url']); ?>",
        },
        {
            html: 'AUTO-2',
            url: "<?php echo ($_GET['url']); ?>",
        },
    ],
    subtitle: {
        url: 'https://player.sky4k.top/p/subtitle.srt',
        type: 'srt',
        type: 'vtt',
        type: 'ass',
        encoding: 'utf-8',
        style: {
            color: '#03A9F4',
            'font-size': '30px',
        },
    },
    highlight: [
        {
            time: 15,
            text: 'Sky4K | 天空4K',
        },
        {
            time: 30,
            text: 'Sky4K | 天空4K',
        },
        {
            time: 45,
            text: 'Sky4K | 天空4K',
        },
        {
            time: 60,
            text: 'Sky4K | 天空4K',
        },
        {
            time: 75,
            text: 'Sky4K | 天空4K',
        },
    ],
    controls: [
        {
            position: 'right',
            html: 'Control',
            click: function () {
                console.info('You clicked on the custom control');
            },
        },
    ],
    icons: {
        loading: '<img src="https://img.sky4k.top/BLOG/806320_ico.png">',
        state: '<img width="150" heigth="150" src="https://player.sky4k.top/p/state.svg">',
        indicator: '<img width="16" heigth="16" src="https://img.sky4k.top/BLOG/806320_ico.png">',
    },
    customType: {
        torrent: function (video, url, art) {
            var client = new WebTorrent();
            art.loading.show = true;
            client.add(url, function (torrent) {
                var file = torrent.files[0];
                file.renderTo(video, {
                    autoplay: true,
                });
            });
        },
        flv: function (video, url) {
            const flvPlayer = flvjs.createPlayer({
                type: 'flv',
                url: url,
            });
            flvPlayer.attachMediaElement(video);
            flvPlayer.load();
        },
        m3u8: function (video, url) {
            var hls = new Hls();
            hls.loadSource(url);
            hls.attachMedia(video);
        },
        mpd: function (video, url) {
            var player = dashjs.MediaPlayer().create();
            player.initialize(video, url, true);
        },
        mpd: function (video, url) {
            shaka.polyfill.installAll();
            var player = new shaka.Player(video);
            player.load(url);
        },
    },
});
        </script>
    </body>
</html>
