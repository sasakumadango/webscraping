#!/bin/bash

fileName="インターネット入門"

cd ./test
for ((i=2; i<=2; i++)) 
do
	no=$(printf "%02d\n" "${i}")
	pdftk A="第"${no}"回_"${fileName}"_a.pdf" B="第"${no}"回_"${fileName}"_b.pdf" shuffle A B output "../output/第"${no}"回_"${fileName}".pdf"
done
