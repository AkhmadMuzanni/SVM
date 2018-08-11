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
def normalization(data):
    res = np.zeros((len(data),len(data[0])),dtype=float)
    max_value = float(get_max(data))
    min_value = float(get_min(data))
    for i in range(len(res)):
        for j in range(len(res[i])):
            res[i][j] = (data[i][j] - min_value) / (max_value - min_value)    
    return res

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
    for i in range(len(array1)):
        res += np.power((array1[i] - array2[i]),2)
    return res

# method get_kernel_rbf to calculate the value of kernel RBF from data training
def get_kernel_rbf(data_dist,theta):
    kernel = np.zeros_like(data_dist)
    for i in range(len(data_dist)):
        for j in range(len(data_dist[i])):
            kernel[i][j] = np.exp(-(data_dist[i][j]/(2*np.power(theta,2))))
    return kernel

# MAIN

dataTraining = read_csv("dataTraining.csv")
for data in dataTraining:
    print(data)

data_normalisasi = normalization(dataTraining)
for data in data_normalisasi:
    print(data)

jarak = get_dist(data_normalisasi)
for data in jarak:
    print(data)

kernel = get_kernel_rbf(jarak,0.1)
for data in kernel:
    print(data)
