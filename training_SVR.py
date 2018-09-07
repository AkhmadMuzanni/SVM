# -*- coding: utf-8 -*-
"""
Created on Sat Aug 11 21:48:34 2018

@author: MUZANNI
"""

import csv
import numpy as np
import json
#import mysql.connector as msql

#db = msql.connect(host="localhost",user="root",passwd="",database="estimasi")

# method read_csv for read csv file and save it to array
def read_csv(file_name):
    array_2D = []
    with open(file_name, 'rb') as csvfile:
        read = csv.reader(csvfile, delimiter=';')
        for row in read:
            array_2D.append(map(int,row))
    return array_2D

def split_data(data, proportion):
    dataTraining = data[0:int(np.floor(proportion*len(data)))]    
    dataTesting = data[int(np.floor(proportion*len(data))):len(data)]
    return dataTraining, dataTesting

# method get_max to find the maximum value of data
def get_max(data):
    max_value = -999
    for i in data:        
        for j in i:            
            if (j > max_value):
                max_value = j
    return max_value

# method get_min to find the minimum value of data
def get_min(data):
    min_value = 9999999999
    for i in data:
        for j in i:
            if (j < min_value):
                min_value = j
    return min_value

# method normalization to convert data to normalized value
def normalization(data, proportion):    
    res = np.zeros((len(data),len(data[0])),dtype=float)
    max_value = float(get_max(data))
    min_value = float(get_min(data))
    for i in range(len(res)):
        for j in range(len(res[i])):
            res[i][j] = (data[i][j] - min_value) / (max_value - min_value)    
    dataTraining = res[0:int(np.floor(proportion*len(data)))]    
    dataTesting = res[int(np.floor(proportion*len(data))):len(data)]
    return dataTraining, dataTesting

# method dist to search the distance between all elements
def get_dist(data):
    distance = np.zeros((len(data),len(data)),dtype=float)
    for i in range(len(distance)):
        for j in range(len(distance)):
            distance[i][j] = calc_dist(data[i],data[j])
    return distance

# method calc_dist to calculate the distance between two array
def calc_dist(array1, array2):
    res = 0.0
    for i in range(len(array1) - 1):
        res += np.power((array1[i] - array2[i]),2)
    return res

# method get_kernel_rbf to calculate the value of kernel RBF from data training
def get_kernel_rbf(data_dist,theta):
    kernel = np.zeros_like(data_dist)
    for i in range(len(data_dist)):
        for j in range(len(data_dist[i])):
            kernel[i][j] = np.exp(-(data_dist[i][j]/(2*np.power(theta,2))))
    return kernel

def get_hessian(kernel_data,lamda):
    hessian = np.zeros_like(kernel_data)
    for i in range(len(kernel_data)):
        for j in range(len(kernel_data[i])):
            hessian[i][j] = kernel_data[i][j] + np.power(lamda,2)
    return hessian

def calc_MSE(prediction, actual):
    res = np.zeros_like(prediction)
    for i in range(len(prediction)):
        res[i] = np.power((actual[i] - prediction[i]),2)
    return np.average(res)



# MAIN

C_value = 1000
cLR = 0.1
epsilon = 0.0001
sigma = 0.3
lamda = 0.1
iter_max =50000

dataAll = read_csv("dataTraining.csv")



#for data in dataTraining:
#    print(data)

#cursor = db.cursor()
#sql = "INSERT INTO dataAll VALUES (%d %d %d %d %d)"
#val = (1, 2, 3, 4, 5)
#cursor.exceute(sql, val)
#db.commit


dataTraining, dataTesting = normalization(dataAll, 0.8)
x_training = ((np.array(dataTraining))[:,:3]).tolist()
x_testing = ((np.array(dataTesting))[:,:3]).tolist()
y_training = ((np.array(dataTraining))[:,-1]).tolist()
y_testing = ((np.array(dataTesting))[:,-1]).tolist()
#print(x_training)
#print(x_testing)

#for data in data_normalisasi:
#    print(data)

jarak = get_dist(dataTraining)
#for data in jarak:
#    print(data)

kernel = get_kernel_rbf(jarak,sigma)
#for data in kernel:
#    print(data)

hessian_matrix = get_hessian(kernel,lamda)
#for data in hessian_matrix:
#    print(data)

# SEQUENTIAL LEARNING

# Step 1 : Initialize alpha and alpha_star with 0
alpha = [0] * len(dataTraining)
alpha_star = [0] * len(dataTraining)
E_value = [0] * len(dataTraining)
delta_alpha = [0.0] * len(dataTraining)
delta_alpha_star = [0.0] * len(dataTraining)
gamma = cLR / get_max(hessian_matrix)

y_prediksi = [0.0] * len(dataTraining)
# Step 2 : For each training point, compute :
#for x in range(10)
x = 0
min_mse = 999999
iterate = True
#while ((max(delta_alpha_star) < epsilon) and (max(delta_alpha) < epsilon) and (x < 2)):
while(iterate):
    #print(x)
#while ((max(delta_alpha_star) < epsilon) and (max(delta_alpha) < epsilon) and (x < 1000) and (iterate)):
    # 2.1 : Compute Ei
    #print("")
    #print("Iterasi " + str(x))
    y = np.transpose(dataTraining)[3]
    #print(y)
    for i in range(len(jarak)):
        sum_prod = np.sum([a*(b-c) for a,b,c in zip(hessian_matrix[i], alpha_star, alpha)])
        E_value[i] = y[i] - sum_prod
    #print("E Value")
    #print(E_value)
    
    # 2.2 : Compute delta alpha and delta alpha star    
    delta_alpha_star = [min(max(gamma*(E - epsilon), -A), C_value - A) for E,A in zip(E_value, alpha_star)]
    delta_alpha = [min(max(gamma*(-E - epsilon), -A), C_value - A) for E,A in zip(E_value, alpha)]
    #print("Delta Alpha Star")
    #print(delta_alpha_star)
    
    alpha_star = alpha_star + delta_alpha_star
    
    # 2.3 : Compute new alpha and alpha star
    alpha = [a + b for a,b in zip(alpha, delta_alpha)]
    alpha_star = [a + b for a,b in zip(alpha_star, delta_alpha_star)]
    #print(alpha_star)
    #print(alpha)
    #print(max(delta_alpha_star))
    #print(max(delta_alpha))
    for i in range(len(y_prediksi)):
        y_prediksi[i] = np.sum([H*(alp_s - alp) for H,alp_s,alp in zip(hessian_matrix[i],alpha_star,alpha)])
        
    if(((max(delta_alpha_star) < epsilon) and (max(delta_alpha) < epsilon)) or (x > iter_max)):
        print(delta_alpha_star)
        print(delta_alpha)
        print([a-b for a,b in zip(alpha_star, alpha)])
        iterate = False
        
    #if (min_mse > calc_MSE(y_prediksi, y)):
        #min_mse = calc_MSE(y_prediksi, y)
    #else:
        #iterate = False
        #print("Iterasi ke-" + str(x-1))
    #print(min_mse)
    x = x+1
print("ITERASI = "+str(x))
# Find the result of prediction
#print("Hasil Prediksi")
#print(np.sum(alpha_star))

max_data = float(get_max(dataAll))
min_data = float(get_min(dataAll))
y_denorm = np.zeros_like(y_prediksi)
for i in range(len(y_prediksi)):
    y_denorm[i] = y_prediksi[i] * (max_data-min_data) + min_data

#print(delta_alpha_star)
#print(delta_alpha)
#print(alpha_star)
#print(alpha)
#print(y_prediksi)
#print(y_denorm)
#print(min_mse)
    
def get_prediksi(temp):
    return temp
def get_input_data():
    return json.dumps(dataAll)
def get_distance():
    return jarak

#print(y)
#print(hessian_matrix)


#def get_hessian():
#    return hessian_matrix
    