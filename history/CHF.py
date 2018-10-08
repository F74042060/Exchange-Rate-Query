#-*- coding:utf-8
#!/usr/bin/python

servername = "140.116.245.148"
username = "f74042060"
password = "NckuCsie108"
database = "f74042060"

import pandas
import pandas as pd
import pymysql
pymysql.install_as_MySQLdb()

##connect to website,get concurrency data
url = 'http://rate.bot.com.tw/xrt/quote/ltm/CHF'
table = pd.read_html(url)[0]
table = table.drop(table.columns[[4,5,6]],axis=1)
#print(table)

#connect to database
db = pymysql.connect(servername, username, password, database)
cursor = db.cursor()

#delete prior data
for i in range(0,60):
	cursor.execute("DELETE FROM `CHF` WHERE No = '%d'"% (i))

list1 = []
#update database
for i in range(0,60):
	date = table.ix[i,0]
	buy = table.ix[i,2]
	sell = table.ix[i,3]
	list1.append(sell)
	try:
		cursor.execute('INSERT INTO CHF(No,Date,Buy,Sell) VALUES({},"{}",{},{})'.format(i,date,buy,sell))
		db.commit()
	except:
		db.rollback()

#sort and decide range
sell = list1[0]
list1.sort()
if sell >= list1[0] and sell <= list1[14]:
	recommend = 1
elif sell > list1[14] and sell <= list1[29]:
	recommend = 2
elif sell > list1[29] and sell <= list1[44]:
	recommend = 3
else:
	recommend = 4

#delete prior data
cursor.execute("DELETE FROM `range_recommend` WHERE Currency = 'CHF'")

# update database
try:
	cursor.execute('INSERT INTO range_recommend(No,Currency,Recommend,Min,Max) VALUES({},"{}",{},{},{})'.format(6,'CHF',recommend,list1[0],list1[59]))
	db.commit()
except:
	print('error')
	db.rollback()

print(sell)
print(list1)
print(recommend)

#close database
db.close()


