#!/bin/sh

# データ詳細画面からOCRかけるスクリプト

# $0 でスクリプトの現在ディレクトリを指定
cd $(dirname $0)

# path to image file
image=$1

# 加工
# convert -monochrome a.png bw.png
convert $image -fuzz 10% -blur 1x1 -negate $1_nega.png
convert -fill '#ffffff' +opaque '#111111' $1_nega.png $1_result.png

# tmpfile
# tmp_file=$(mktemp)
tmp_file=$1_tmp.txt

# result
result_file="$1_result.txt"

# command
command="/usr/bin/tesseract $1_result.png stdout -l eng --psm 6"

# コマンド実行して一時ファイル生成
$command >$tmp_file
#空行削除
sed -e '/^$/d' -i $tmp_file

# 2行目だけ削除して resultファイルへ
sed -e 2d $tmp_file >$result_file

# アルファベットとスペースを除去
# sed -e 's/[A-Z]//ig' -e 's/ //g' -i $result_file
# sed -e 's/[A-Z]//ig' -i $result_file
# sed -e 's/[A-Z]//ig' -i $tmp_file

# 掃除
rm $tmp_file
rm $1_nega.png $1_result.png

# usage
# ./ocr.sh { 読込ファイル名}
# tmp.txtに結果が吐き出される
