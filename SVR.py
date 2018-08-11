# -*- coding: utf-8 -*-
"""
Created on Sat Aug 11 21:48:34 2018

@author: MUZANNI
"""

import csv
import numpy as np

def read_csv(file_name):
    array_2D = []
    with open(file_name, 'rb') as csvfile:
        read = csv.reader(csvfile, delimiter=';')
        for row in read:
            array_2D.append(map(int,row))
    return array_2D

def get_max(data):
    max_value = -999
    for i in data:        
        for j in i:            
            if (j > max_value):                
                max_value = j
    return max_value

def get_min(data):
    min_value = 9999999999
    for i in data:
        for j in i:
            if (j < min_value):
                min_value = j
    return min_value            

def normalization(data):
    res = np.zeros((len(data),len(data[0])),dtype=float)
    max_value = float(get_max(data))
    min_value = float(get_min(data))
    for i in range(len(res)):
        for j in range(len(res[i])):
            res[i][j] = (data[i][j] - min_value) / (max_value - min_value)    
    return res

dataTraining = read_csv("dataTraining.csv")
for data in dataTraining:
    print(data)


data_normalisasi = normalization(dataTraining)
for data in data_normalisasi:
    print(data)

