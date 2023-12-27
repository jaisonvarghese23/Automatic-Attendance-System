

import cv2
import face_recognition as fc
import cv2
import numpy as np
import csv
import os
import glob
from datetime import datetime
import mysql.connector
from functools import reduce
import operator

import subprocess
from flask import Flask, render_template
app=Flask(__name__)
@app.route('/')
def home():
    return render_template('index.html')


@app.route('/execute')
def execute():
    
 my=[]
 mu=[]
 idl=[]
 idll=[]
 deplist=[]
 datelist=[]
 perlist=[]
 stafflist=[]

 mydb=mysql.connector.connect(host="localhost" , user="root", password="", database="attendance")
 mycr=mydb.cursor()
 kk=mydb.cursor()
 sem=mydb.cursor()
 sub=mydb.cursor()
 iddw=mydb.cursor()
 dep1=mydb.cursor()
 date1=mydb.cursor()
 per1=mydb.cursor()
 staff1=mydb.cursor()
 trun=mydb.cursor()

# str='athul'
# mycr.execute("select Role from teachers where T_Name=%s ",(str,))

 dep1.execute("select Department from idtable ") 
 for i in dep1:
   
    c=list(i)
 depp=c[0]   

 date1.execute("select date2 from idtable ") 
 for i in date1:
   
    c=list(i)
 dat=c[0]  

 per1.execute("select period1 from idtable ") 
 for i in per1:
   
    c=list(i)
 period1=c[0] 

 staff1.execute("select staff from idtable ") 
 for i in staff1:
   
    c=list(i)
 staf=c[0]        











 sem.execute("select subid from idtable ") 

 for i in sem:
   
    c=list(i)
    
 p=pi=c[0]
 sub.execute("select semester from subject where Subject_id=%s",(p,))
 for i in sub:
   
    lis=list(i)
 u=lis[0]
 print(u)

 mycr.execute("select fname from student where current_Semester=%s order by fname",(u,)) 

 for i in mycr:
 

   c=list(i)
   mu.append(c)
 
 iddw.execute("select ktu_id from student where current_Semester=%s order by fname",(u,)) 


 for i in iddw:
 

   c=list(i)
   idl.append(c)
   print(i)   
 
 my=reduce(operator.concat,mu)
 print(my) 

 idll=reduce(operator.concat,idl)
 print(idll) 


 dictionary=dict(zip(my,idll))
 print(dictionary)






 


 known_face_encodings = []
 known_face_name =my
 face_image=[]
 face_encoding = []
 
 face_locations = []
 face_encodings = []
 face_names =[]
 s=True
 for imag in os.listdir('C:\\xampp\\htdocs\\AMP\Staff_Adviser\\known'):
      face_image=fc.load_image_file(f'C:\\xampp\\htdocs\\AMP\Staff_Adviser\\known/{imag}')
      face_encoding=fc.face_encodings(face_image)[0]
      known_face_encodings.append(face_encoding)
    #   known_face_name.append(imag)
 print(known_face_name)
 
 for img in os.listdir('C:\\xampp\\htdocs\\AMP\Staff_Adviser\\images'):
     image=fc.load_image_file(f'C:\\xampp\\htdocs\\AMP\Staff_Adviser\\images/{img}')
#  image=fc.load_image_file("C:/xampp/htdocs/AMP/Staff_Adviser/pic/grp1.jpg")
     image=cv2.cvtColor(image,cv2.COLOR_BGR2RGB)
     os.remove('C:\\xampp\\htdocs\\AMP\Staff_Adviser\\images'+'/'+img)   
 students= known_face_name.copy()

 face_locations=fc.face_locations(image)
 print(face_locations)
   
 small_frame=cv2.resize(image,(0,0),fx=0.25,fy=0.25)    
                    
 rgb_small_frame1=small_frame[:,:,::-1]
# cv2.imshow("eaea",rgb_small_frame1) 

 face_names=[]
 face_locations=fc.face_locations(rgb_small_frame1)


 face_encodings=fc.face_encodings(rgb_small_frame1,face_locations)
 for face_encodings in face_encodings:
           
            matches=fc.compare_faces(known_face_encodings,face_encodings)
            name=""
            face_distance=fc.face_distance(known_face_encodings,face_encodings)
            best_match_index=np.argmin(face_distance)
            if matches[best_match_index]:
                name=known_face_name[best_match_index]
            face_names.append(name)
            print(name)
            if name in known_face_name:
                if name in students:
                    students.remove(name)
                    print(students)
 j=0                 
 for key,value in dictionary.items():
     p=idll[j]
     if key not in students:
         
         
          kk.execute("insert into attendance(Subject_id,date2,period,ktu_id,present1,Department,staff) values(%s,%s,%s,%s,%s,%s,%s)",(pi,dat,period1,value,1,depp,staf)) 
          mydb.commit()
     else:
           kk.execute("insert into attendance(Subject_id,date2,period,ktu_id,present1,Department,staff) values(%s,%s,%s,%s,%s,%s,%s)",(pi,dat,period1,value,0,depp,staf)) 
           mydb.commit()
     j=j+1  

 trun.execute("Truncate idtable")
 
# cv2.imshow("eaea",image)
 cv2.waitKey(0)
 return render_template("index.html")




if __name__=='__main__':
    app.run(debug=True) 
