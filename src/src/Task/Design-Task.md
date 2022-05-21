# タスクの設計について

タスクには以下のような情報を持つ
GetAllTaskで取得したいのはこんな感じ。

表示される項目
- int ID
- string 名前
- string ラベル
- int コスト
- Date 納期
- string 詳細
- object ToDo

表示されない項目
- 所属するカラム名