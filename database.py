# -*- coding: utf-8 -*-
"""
Created on Sun Sep 09 15:24:49 2018

@author: USER
"""

import mysql.connector as ms



try:
    conn = ms.connect(user='root', password='', host='localhost', database='estimasi')
    cursor = conn.cursor()
    queryDelete = """Delete from `alpha_beras`"""
    cursor.execute(queryDelete)
    add_alpha = """INSERT INTO `alpha_beras` VALUES (%s)"""
    print(add_alpha)
    
    
   
    #query = ("SELECT * FROM padi")

    #cursor.execute(query)
    
    #for(thn, luas_tanam, jml_penduduk, luas_lahan, produksi) in cursor:
        #print("{}, {}, {}, {}, {} ".format(thn, luas_tanam, jml_penduduk, luas_lahan, produksi))
    
    
    #print(query2)
    alpha = [2, -2.000338880028326, -1.7484869882343739, -3.743523156579997, 1.7120601398098891, 7.1781298102175075, 4.256270656989639, 0.9214269066068619, -9.542214992186763, 0.2558967213865766, -1.6131547996969597, 0.10469222399301072, 3.514537248721711, -0.15861476503715854]
    for alpha_i in alpha:
        print(alpha_i)
        cursor.execute(add_alpha,(alpha_i,))
    conn.commit()
    
    
    #cursor.execute(query)

except ms.Error as error :
    print("Failed to delete record from database: {}".format(error))
finally:
    #closing database connection.
    if(conn.is_connected()):
        conn.close()
        print("\n MySQL connection is closed")


#cursor.execute(query)

#cursor.close()




#conn.close()