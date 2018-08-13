# -*- coding: utf-8 -*-
"""
Created on Tue Aug 14 00:11:21 2018

@author: USER
"""
import training_SVR
import numpy as np
from sklearn.svm import SVR
from sklearn.preprocessing import RobustScaler

#import numpy as np
import matplotlib.pyplot as plt
'''
def read_csv(file_name):
    array_2D = []
    with open(file_name, 'rb') as csvfile:
        read = csv.reader(csvfile, delimiter=';')
        for row in read:
            array_2D.append(map(int,row))
    return array_2D
'''

dataTraining = training_SVR.read_csv("dataTraining.csv")
for data in dataTraining:
    print(data)
    
dataNormal = training_SVR.normalization(dataTraining)

test = np.sort(5 * np.random.rand(40, 1), axis=0)
test_y = np.sin(test).ravel()

dataTranspose = [list(i) for i in zip(*dataNormal)]
#for data in dataTranspose:
#    print(data)

x1 = np.transpose(np.array(dataTranspose[0:1]))
x2 = np.transpose(np.array(dataTranspose[1:2]))
x3 = np.transpose(np.array(dataTranspose[2:3]))
y = np.array(dataTranspose[3:4][0])

#std_x1 = RobustScaler().fit_transform(x1)
#std_y = RobustScaler().fit_transform(y)

svr_rbf = SVR(kernel='rbf', C=1e2, gamma=0.7, epsilon=0.001)
svr_lin = SVR(kernel='linear', C=1e2)
svr_poly = SVR(kernel='poly', C=1e2, degree=2)
#svr_rbf.fit(std_x1,y)
#y_rbf = svr_rbf.predict(RobustScaler().transform(std_x1))

y_rbf = svr_rbf.fit(std_x1,y).predict(std_x1)
y_lin = svr_lin.fit(std_x1,y).predict(std_x1)
y_poly = svr_poly.fit(std_x1,y).predict(std_x1)

'''
y_rbf = svr_rbf.fit(x1,y).predict(x1)
y_lin = svr_lin.fit(x1,y).predict(x1)
y_poly = svr_poly.fit(x1,y).predict(x1)
'''


lw = 2

plt.scatter(std_x1,y,color='navy',label='data')
plt.plot(std_x1,y_rbf, color='red', label='RBF model')
plt.plot(std_x1,y_lin, color='c',label='Linear model')
plt.plot(std_x1,y_lin, color='m', label='Polynomial model')

'''
plt.scatter(x1,y,color='navy',label='data')
plt.plot(x1,y_rbf, color='red', label='RBF model')
plt.plot(x1,y_lin, color='c',label='Linear model')
plt.plot(x1,y_lin, color='m', label='Polynomial model')
'''

plt.title('SVR')
plt.legend()
plt.show()


