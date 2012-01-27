現在、meetplay API は開発中ステータスのため、完全な動作を保証するものではありません。


meetplay php-sdk
================

meetplay API は、OAuth2 認証が用いられます。
この SDK は、OAuth2 クライアントライブラリのデフォルト設定を `meetplay.net` 向けに変更したものです。


Usage
-----

    <?php

    require_once './path/to/autoload.php';

    use Meetplay\Client as MeetplayClient;

    $meetplay = new MeetplayClient(array(
        'client_id'     => CLIENT_ID,
        'client_secret' => CLIENT_SECRET,
    ));

    $session = $meetplay->getSession();

    if ($session) {
        $user = $meetplay->api('/me');
        echo 'ようこそ' . $user['name'] . 'さん';
    } else {
        $loginUrl = $meetplay->getLoginUrl();
        echo '<a href="' . $loginUrl . '">ログイン</a>';
    }


