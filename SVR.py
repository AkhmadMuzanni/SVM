# -*- coding: utf-8 -*-
"""
Created on Sat Aug 11 21:48:34 2018

@author: MUZANNI
"""

import csv
def read_csv(file_name):
    array_2D = []
    with open(file_name, 'rb') as csvfile:
        read = csv.reader(csvfile, delimiter=';')
        for row in read:
            array_2D.append(row)
    return array_2D

dataTraining = read_csv("dataTraining.csv")
for data in dataTraining:
    print(data)