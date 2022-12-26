## 目標

- 設計考えながら作ってみる。


以下makeコマンドはsrcフォルダ直下で実行してください。

## dockerコンテナの起動
```shell
make up
```

## dockerコンテナの停止
```shell
make down
```


## nuxtコンテナ
OpenSSL3のバージョン互換性の問題で下記環境変数を設定しておく必要がある。
```shell
export NODE_OPTIONS=--openssl-legacy-provider
```

## テスト実行
```shell
docker compose exec app ./vendor/bin/phpunit --filter=実行クラス名
```