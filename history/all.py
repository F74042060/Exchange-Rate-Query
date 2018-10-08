#-*- coding:utf-8
#!/usr/bin/python

import pandas
import pymysql
pymysql.install_as_MySQLdb()

##connect to website,get concurrency data
dfs = pandas.read_html('http://rate.bot.com.tw/xrt?Lang=zh-TW')
currency = dfs[0]
currency = currency.ix[0:19,0:3]
currency.columns = [u'Currency',u'Buy',u'Sell']
currency[u'Currency'] = currency[u'Currency'].str.extract('\((\w+)\)')

#connect to database
db = pymysql.connect('140.116.245.148','f74042060','NckuCsie108','f74042060')
cursor = db.cursor()

#delete prior data
for i in range(0,19):
	cursor.execute("DELETE FROM `exchange_rate` WHERE No = '%d'"% (i))
#update database
for i in range(0,19):
	curr = currency.ix[i,0]
	buy = currency.ix[i,1]
	sell = currency.ix[i,2]
	try:
		cursor.execute('INSERT INTO exchange_rate(No,Currency,Buy,Sell) VALUES({},"{}",{},{})'.format (i,curr,buy,sell))
		db.commit()
	except:
		db.rollback()

#close database
db.close()
