

import cv2
import face_recognition as fc
import cv2
import numpy as np
import csv
import os
import glob
from datetime import datetime
import mysql.connector

import subprocess
from flask import Flask, render_template
app=Flask(__name__)
@app.route('/')
def home():
    return render_template('index.html')


@app.route('/execute')
def execute():
    
 mydb=mysql.connector.connect(host="localhost" , user="root", password="", database="attendance")
 mycr=mydb.cursor()
 mycr.execute("select * from teachers")
 for i in mycr:
      print(i)




 athu=fc.load_image_file("C:/xampp/htdocs/AMP/Teacher/pic/athul.jpg")
 athul_encoding=fc.face_encodings(athu)[0]

 musu=fc.load_image_file("C:/xampp/htdocs/AMP/Teacher/pic/musu.jpg")
 musu_encoding=fc.face_encodings(musu)[0]


 soja=fc.load_image_file("C:/xampp/htdocs/AMP/Teacher/pic/soja.jpeg")
 soja_encoding=fc.face_encodings(soja)[0]

 known_face_encodings=[
    athul_encoding,
    musu_encoding,
    soja_encoding
 ]  

 known_face_name=[
    "athul",
    "musu",
    "soja"


 ]

 face_locations = []
 face_encodings = []
 face_names =[]
 s=True


 image=fc.load_image_file("C:/xampp/htdocs/AMP/Teacher/pic/first1.jpg")
 image=cv2.cvtColor(image,cv2.COLOR_BGR2RGB)
 
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
 # cv2.imshow("eaea",image)
 cv2.waitKey(0)

#  for i in known_face_name:
#      if i not in students:
          
#           kk.execute("update attendance set present1=%s where fname=%s",(1,i,)) 
#           mydb.commit()
#      else:
#           kk.execute("update attendance set present1=%s where fname=%s",(0,i,)) 
#           mydb.commit()


if __name__=='__main__':
    app.run(debug=True) 
