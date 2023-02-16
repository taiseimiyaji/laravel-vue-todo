# 設計

## 画面イメージ

### taskテーブル
   - id(ulid形式でアプリケーションコード内で生成する)
   - name(string型のタスク名)
   - detail(string型のタスク詳細情報)
   - deadline(Date型のタスク期日)
   - costs(intもしくはfloatの予定工数)
   - status(stringタスクのステータス,statusテーブルと外部キー制約する)

表示順を追加する。  
表示順の管理はタスク情報の更新とは切り離して考える。
カラムごとにタスクを管理するかどうか?
ソートはソートとしてドメインを分けるが、DBとしてはtaskとして管理する

### statusテーブル
- id
- ステータス(string,重複は許可しない)

### treeテーブル
閉包テーブル形式の子孫関係管理テーブル
- ancestor(先祖)
- descendant(子孫)

PRIMARY KEYは(ancestor, descendant)に複合で貼る
ancestor, descendantともにtaskテーブルのidに対して外部キー制約を貼る

### TODO
タスクカードの編集機能
新規追加と
更新を分ける

タスクカードを内包するカラムの作成
一旦PRを作る手間がもったいないのである程度の機能実装まではmaster直commitする

### やりたいこと

ユーザー管理の追加、ログイン画面の実装。(Googleログインを使用)
タスクカードで工数を計測
ポモドーロタイマーみたいにする

## 参考
https://zenn.dev/tasuya/articles/7d7c90f6ba2f1e
Dockerの設定あたりだけ。
