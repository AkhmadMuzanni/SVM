# -*- coding: utf-8 -*-
"""
Created on Sat Aug 11 21:48:34 2018

@author: MUZANNI
"""

import csv
import numpy as np


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

C_value = 2
cLR = 0.01
epsilon = 0.1

dataAll = read_csv("dataTraining.csv")
#for data in dataTraining:
#    print(data)

dataTraining, dataTesting = normalization(dataAll, 0.8)
#for data in data_normalisasi:
#    print(data)

jarak = get_dist(dataTraining)
#for data in jarak:
#    print(data)

kernel = get_kernel_rbf(jarak,0.7)
#for data in kernel:
#    print(data)

hessian_matrix = get_hessian(kernel,0.1)
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

# Step 2 : For each training point, compute :
#for x in range(10)
x = 0
while ((max(delta_alpha_star) < epsilon) and (max(delta_alpha) < epsilon) and (x < 30)):
    # 2.1 : Compute Ei
    #print("")
    #print("Iterasi " + str(x))
    y = np.transpose(dataTraining)[3]
    for i in range(len(jarak)):
        sum_prod = np.sum([a*(b-c) for a,b,c in zip(jarak[i], alpha_star, alpha)])
        E_value[i] = y[i] + sum_prod
    
    # 2.2 : Compute delta alpha and delta alpha star    
    delta_alpha_star = [min(max(gamma*(E - epsilon), -A), C_value - A) for E,A in zip(E_value, alpha_star)]
    delta_alpha = [min(max(gamma*(-E - epsilon), -A), C_value - A) for E,A in zip(E_value, alpha)]
    alpha_star = alpha_star + delta_alpha_star
    
    # 2.3 : Compute new alpha and alpha star
    alpha = [a + b for a,b in zip(alpha, delta_alpha)]
    alpha_star = [a + b for a,b in zip(alpha_star, delta_alpha_star)]
    #print(alpha_star)
    #print(alpha)
    #print(max(delta_alpha_star))
    #print(max(delta_alpha))
    x = x+1

# Find the result of prediction
print("Hasil Prediksi")
#print(np.sum(alpha_star))
y_prediksi = [0.0] * len(dataTraining)
for i in range(len(y_prediksi)):
    y_prediksi[i] = np.sum([H*(alp_s - alp) for H,alp_s,alp in zip(hessian_matrix[i],alpha_star,alpha)])
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
print(calc_MSE(y_prediksi, y))