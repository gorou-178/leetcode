# leetcode
- leetcodeのProblemsコードの実行環境およびテスト環境
- `src/app` 配下にleetcodeにsubmitするコードを追加
- `src/tests` 配下に各クラスのテストを追加

# コマンド
- `make install` でphpunit実行環境の構築（php 7.4）
- `make test` でphpunit実行
- `make analyze` で `phpmd` `phpstan` `psalm` を実行
- 個別で実行する場合は以下
  - `docker-compose run --rm php composer phpstan` でphpstan実行
  - `docker-compose run --rm php composer phpmd` でphpmd実行
  - `docker-compose run --rm php composer psalm` でpsalm実行
