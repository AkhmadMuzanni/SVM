# -*- coding: utf-8 -*-
"""
Created on Sun Aug 05 21:40:15 2018

@author: USER
"""

y = [-1, -1, 1, 1]
alpha = [1]
count = 0;
alpha = 0.0;
while count < 10:
    sum = 0
    alpha += 0.01
    for yi in y:
        sum += alpha*yi
    if (sum == 0):
        print (alpha)
        count += 1