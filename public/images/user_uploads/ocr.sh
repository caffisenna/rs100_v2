#!/bin/sh

cd `dirname $0`

# path to image file
# path="activityList.png"
path=$1

# 加工
# convert -monochrome a.png bw.png
# convert bw.png -negate wb.png
convert -fill '#ffffff' +opaque '#333333' $1 $1_activityListWhite.png

# tmpfile
# tmp_file=$(mktemp)
tmp_file=$1_tmp.txt

# result
result_file="$1_result.txt"

# command
command="/usr/bin/tesseract $1_activityListWhite.png stdout -l eng --psm 6"

# コマンド実行して一時ファイル生成
$command > $tmp_file
# 空行削除
sed -e '/^$/d' -i $tmp_file

# 必要な行だけピックアップ
sed -n 3p $tmp_file > $result_file

# アルファベットとスペースを除去
# sed -e 's/[A-Z]//ig' -e 's/ //g' -i $result_file
sed -e 's/[A-Z]//ig' -i $result_file

# 掃除
rm $tmp_file
rm $1_activityListWhite.png
